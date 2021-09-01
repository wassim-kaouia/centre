@extends('layouts.master')

@section('css')
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box-borders {
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .invoice-box.rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
        text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
    }

    .button-print{
		position: absolute;
		bottom: 5px;
		padding-bottom: 10px;
	}

	@media print {
 	 #printPageButton {
   		 display: none;
  }
}
</style>
@endsection

@section('title')
Reçu de paiement 
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">  
              <div id="border-class" class="invoice-box invoice-box-borders">
                <div class="button-print">
                    <button id="printPageButton"  class="btn btn-success" onClick="printPDF()">Imprimer</button>
                </div>
                    <table cellpadding="0" cellspacing="0">
                        <tr class="top">
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td class="title">
                                            <img src="{{ URL::asset('logo-light.png') }}" style="width: 100%; max-width: 300px" />
                                        </td>
                                        <td>
                                            Facture #: R0-{{ $payment->id }}<br />
                                            Crée: {{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y') }}<br />
                                            Editeur: {{ Auth::user()->full_name }}              
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="information">
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td>
                                            Green City Centre<br />
                                            Centre green lotissement<br />
                                            Benguerire, MA 12345
                                        </td>
        
                                        <td>
                                            {{ $payment->student->first_name }}<br />
                                            {{ $payment->student->last_name }}<br />
                                            {{ $payment->student->user->email }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
        
                        <tr class="heading">
                            <td>Methode de paiement</td>
                            <td></td>
                        </tr>
                        
                        <tr class="details">
                            <td>Espèces</td>
                            <td></td>
                        </tr>
        
                        <tr class="heading">
                            <td>Paiement Complet</td>
                            <td>Montant</td>
                        </tr>
        
                        <tr class="item last">
                            <td>{{ $payment->course->title }}</td>
                            <td>{{ $payment->full_price }} MAD</td>
                        </tr>
    
                        <tr class="total">
                            <td></td>
                            <td>Total : {{ $payment->full_price }} MAD </td>
                        </tr>
        
                    </table>
                </div>
    </div>

</div>
<!-- end row -->
@endsection

@section('js')
<script>
    function printPDF() {
        var element = document.getElementById("border-class");
        element.classList.remove("invoice-box-borders");
        window.print();
        element.classList.add("invoice-box-borders");
    }
</script>
@endsection

