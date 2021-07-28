<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class PaymentDetailController extends Controller
{
    public function getHistoriques(Request $request , $id){

        $payment = Payment::findOrFail($id);
        return view('payments.payments_details',[
            'payment' => $payment
        ]);
    }

    public function edit(Request $request , $id){

        $payment = Payment::findOrFail($id);
        return view('payments.edit',[
            'payment' => $payment,
        ]);
    }

    public function regularisation(Request $request){
        
        $request->validate([
            'amount_regul' => 'required|numeric',
            'payment_id'   => 'numeric',
        ]);
        
        //modifier Payment table
        $payment = Payment::findOrFail($request->payment_id);
        //verifier si le montant de regul est plus grand que le reste
        if($request->amount_regul > $payment->rest){
            Toastr::error('Le montant de regularisation est plus grand que le reste à payer !');
            return redirect()->back();
        }
        
        $total = $payment->paid + $request->amount_regul;

        if($payment->full_price == $total){
            //verifier si le paiement est deja effectué ... verificar se o pagamento foi efetuado
            if($payment->status == 'paid'){
                Toastr::error('Le paiement est dèja effectué !');
                return redirect()->back();
            }
            //le momtant de regul est exacte
            //changer le status a payé
            $payment->status = 'paid';
            $payment->rest = 0;
            $payment->paid = $total;
            $payment->save();

            //créer un nouveau historique de paiement
            $paymentDetail = new PaymentDetail();
            $paymentDetail->paid = $total;
            $paymentDetail->status = 'paid';
            $paymentDetail->payment_id = $payment->id;

            
            //generer le pdf de paiement ainsi que la facture
            view()->share('payment_i',$payment);
            
            $pdf = PDF::loadview('invoices.modelFacture',$payment)
                    ->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
                    
            //placer le pdf facture dans le chemain 
            Storage::put('public/factures/facture_'.$payment->id.'_'.$payment->created_at.'.pdf',$pdf->output()); 
            
            //enregistrer le chemain de pdf facture
            $paymentDetail->proof = 'public/factures/facture_'.$payment->id.'_'.$payment->created_at.'.pdf';
            $paymentDetail->save();
            
            Toastr::success("L'historique de paiement est modifié avec succée !");
            return redirect()->back();
        }
        
        if($payment->full_price - $total > 0){
            //verifier si le paiement est deja effectué ... verificar se o pagamento foi efetuado
            if($payment->status == 'paid'){
                Toastr::error('Le paiement est dèja effectué !');
                return redirect()->back();
                }
                
                //le momtant de regul est partiel
                //changer le status a payé
                $payment->status = 'partie';
                $payment->rest = $payment->full_price - $total;
                $payment->paid = $total;
                $payment->save();

                //créer un nouveau historique de paiement
                $paymentDetail = new PaymentDetail();
                $paymentDetail->paid = $total;
                $paymentDetail->status = 'partie';
                $paymentDetail->payment_id = $payment->id;

                //créer le reçu pdf et ajouter au detail de paiements
                view()->share('payment_a',$payment);
            
                $pdf = PDF::loadview('invoices.modelePartie',$payment)
                ->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
                

                Storage::put('public/partiels/recus_'.$payment->id.'_'.$payment->created_at.'.pdf',$pdf->output());        
                
                $paymentDetail->proof = 'public/partiels/recus_'.$payment->id.'_'.$payment->created_at.'.pdf';
                $paymentDetail->save();
                
                Toastr::success("L'historique de paiement est modifié avec succée !");
                
                return redirect()->back();
        }
    }
}
