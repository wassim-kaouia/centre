<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use Brian2694\Toastr\Facades\Toastr;

class InvoiceController extends Controller
{
    public function index(){
        $payments = Payment::where('status','=','paid')->paginate(9);
        return view('invoices.index',[
            'payments' => $payments
        ]);
    }

    public function show(Request $request,$id){

        $payment = Payment::findOrFail($id);
        
        return view('invoices.show',[
            'payment' => $payment,
        ]);
    }

    public function destroy(Request $request){
        // dd($request->all());
        $invoice = Payment::findOrFail($request->invoice_id);
        // dd($invoice->student->courses()->detach($invoice->course->id));
        // $invoice->student->courses()->detach([$invoice->course->id]);
        // dd($invoice->detailsPayment);
        PaymentDetail::where('payment_id','=',$invoice->id)->delete();
        $invoice->delete();

        Toastr::success('Facture supprimée avec succée !');

        return redirect()->back();
    }
}
