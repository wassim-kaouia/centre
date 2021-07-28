<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    
    public function index()
    {
        $payments = Payment::paginate(9);

        return view('payments.index',[
            'payments' => $payments
        ]);
    }

    public function paid()
    {
        $payments = Payment::where('status','=','paid')->paginate(9);

        return view('payments.paid',[
            'payments' => $payments
        ]);
    }

    public function withavance()
    {
        $payments = Payment::where('status','=','avance')->paginate(9);

        return view('payments.non_paid',[
            'payments' => $payments
        ]);
    }

 

    public function create(){
        return view('payments.create');
    }
    
    public function store(Request $request){
        
        $request->validate([
            'student' => 'required',
            'course'  => 'required',
            'amount'  => 'required|numeric'  
        ]);
        
        $student = Student::findOrFail($request->student);
        $course  = Course::findOrFail($request->course);

        //calculate ttc price 
        $totalprice = $request->amount; 
        //apres modification je peux mettre une tva fixe (fach nhder m3a abdelhamid)
        
        $payment = new Payment();
        
        if($course->price - $request->amount == 0){

            $payment->full_price = $course->price;
            $payment->paid = $request->amount;
            $payment->rest = 0;
            $payment->status = 'paid';
            $payment->student_id = $student->id;
            $payment->course_id  = $course->id;
            $payment->save();
        
            //attach the course
            $student->courses()->syncWithoutDetaching([$course->id]);

            //il faut enregistrer la table payment detail + telecharger un pdf de facture comme preuve
            $paymentdetail = new PaymentDetail();
            $paymentdetail->paid = $payment->paid;
            $paymentdetail->status = $payment->status;
            $paymentdetail->payment_id = $payment->id;
        
            view()->share('payment_i',$payment);
            $pdf = PDF::loadview('invoices.modelFacture',$payment)->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        
             Storage::put('public/factures/facture_'.$payment->id.'_'.$payment->created_at.'.pdf',$pdf->output());        

            // dd('file path : '.Storage::exists('public/factures/facture_12_2021-07-20 11:26:50.pdf'));
            $paymentdetail->proof = 'public/factures/facture_'.$payment->id.'_'.$payment->created_at.'.pdf';
        
            $paymentdetail->save();
            Toastr::success("L'operation est bien effectuée ..");
            return redirect()->route('etudiants.edit',['id' => $student]);

        }else if($course->price - $request->amount < 0){
            Toastr::error('Vous pouvez pas payer plus que le montant de formation !');
            return redirect()->route('etudiants.edit',['id' => $student]);
        }else if($course->price - $request->amount > 0){

            $payment->full_price = $course->price;
            $payment->paid = $request->amount;
            $payment->rest = $course->price - $request->amount;
            $payment->status = 'avance';
            $payment->student_id = $student->id;
            $payment->course_id  = $course->id;
            $payment->save();

            //attach the course
            $student->courses()->syncWithoutDetaching([$course->id]);

            //creer payment detail
            $paymentdetail = new PaymentDetail();
            $paymentdetail->paid = $payment->paid;
            $paymentdetail->status = $payment->status;
            $paymentdetail->payment_id = $payment->id;
            
            //créer le reçu pdf et ajouter au detail de paiements
            view()->share('payment_a',$payment);
            
            $pdf = PDF::loadview('invoices.modeleAvance',$payment)->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            
            Storage::put('public/avances/recus_'.$payment->id.'_'.$payment->created_at.'.pdf',$pdf->output());        
        
            $paymentdetail->proof = 'public/avances/recus_'.$payment->id.'_'.$payment->created_at.'.pdf';

            $paymentdetail->save();
            Toastr::success("L'operation est bien effectuée ..");
            return redirect()->route('etudiants.edit',['id' => $student]);

        }
        
    }

    public function show(Request $request,$id){
        
    }


    public function destroy(Request $request,$id){
        
    }
}
