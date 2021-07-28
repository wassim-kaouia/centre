<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function index(){
        $payments = Payment::where('status','=','paid')->paginate(9);
        return view('invoices.index',[
            'payments' => $payments
        ]);
    }

    public function show_invoice(Request $request,$id){

        $payment = Payment::findOrFail($id);
        
        return view('invoices.show',[
            'payment' => $payment,
        ]);

    }

    public function show_paid(Request $request,$id){

        $payment = Payment::findOrFail($id);
        
        return view('invoices.receipt_paiement',[
            'payment' => $payment,
        ]);

    }

    public function show_receipt_avance(Request $request,$id){
        $payment = Payment::findOrFail($id);
        
        return view('invoices.receipt_avance',[
            'payment' => $payment,
        ]);

    }

    public function getPaidReceipts(){
        $payments = Payment::where('status','=','paid')->paginate(9);

        return view('invoices.receipts',[
            'payments' => $payments,
        ]);
    }

    public function getAvanceReceipts(){
        $payments = Payment::where('status','=','avance')->where('rest','>',0)->paginate(9);

        return view('invoices.avances',[
            'payments' => $payments,
        ]);
    }

    public function destroy_invoice(Request $request){
        // dd($request->all());
        $invoice = Payment::findOrFail($request->invoice_id);

        $payments = PaymentDetail::where('payment_id','=',$invoice->id)->get();

        for($i =0;$i<$payments->count(); $i++){
            //check if file exists
            if(Storage::exists($payments[$i]->proof)){
                //if so delete it
                Storage::delete($payments[$i]->proof);
            }
        }
               
        PaymentDetail::where('payment_id','=',$invoice->id)->delete();
        $invoice->delete();

        Toastr::success('Reçu supprimée avec succée !');

        return redirect()->back();
    }

    public function destroy_recu(Request $request){
        // dd($request->all());
        $invoice = Payment::findOrFail($request->invoice_id);

        $payments = PaymentDetail::where('payment_id','=',$invoice->id)->get();

        for($i =0;$i<$payments->count(); $i++){
            //check if file exists
            if(Storage::exists($payments[$i]->proof)){
                //if so delete it
                Storage::delete($payments[$i]->proof);
            }
        }
               
        PaymentDetail::where('payment_id','=',$invoice->id)->delete();
        $invoice->delete();

        Toastr::success('Reçu supprimée avec succée !');

        return redirect()->back();
    }

    public function destroy(Request $request){
        // dd($request->all());
        $invoice = Payment::findOrFail($request->invoice_id);

        $payments = PaymentDetail::where('payment_id','=',$invoice->id)->get();

        for($i =0;$i<$payments->count(); $i++){
            //check if file exists
            if(Storage::exists($payments[$i]->proof)){
                //if so delete it
                Storage::delete($payments[$i]->proof);
            }
        }
               
        PaymentDetail::where('payment_id','=',$invoice->id)->delete();
        $invoice->delete();

        Toastr::success('Reçu supprimée avec succée !');

        return redirect()->back();
    }
}
