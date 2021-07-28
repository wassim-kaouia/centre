@extends('layouts.master')
@section('css')
    <style>
      .corner{
          position: absolute;
          top: 10px;
          right: 10px;
          font-size: 20px;
      
      }  
      
    </style>
@endsection
@section('title')
Les reçus de paiements complets
@endsection

@section('content')
<div class="row">
   @forelse ($payments as $payment)
   <div class="col-xl-4 col-sm-6">
    <div class="card">
        <div class="corner">
            <span class="span-delete" data-invoice-id="{{ $payment->id }}">
                <i class="bx bx-trash-alt"></i>
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-lg-center">
                        <div class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none">
                            <img class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16" src="{{ $payment->student->user->avatar }}" alt="">
                        </div>
                        <h5 class="mb-1 font-size-15 text-truncate">{{ $payment->student->first_name }}</h5>
                        <a href="{{ route('paiements.show',['id' => $payment->id]) }}" class="text-muted">{{ $payment->student->last_name }}</a>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div>
                        <a href="{{ route('paiements.show',['id' => $payment->id]) }}" class="d-block text-primary text-decoration-underline mb-2">Facture #14251</a>
                        <h5 class="text-truncate mb-4 mb-lg-5">{{ $payment->course->title }}</h5>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-3">
                                <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount"><i class="bx bx-money me-1 text-muted"></i>{{ $payment->full_price }} MAD</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> {{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y') }}</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
   @empty
       
   @endforelse
</div>
<div class="row">
    <div class="col-lg-12">
        {{ $payments->links('vendor.pagination.custom') }}
    </div>
</div>
<!-- end row -->


  <!-- Static Backdrop Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Suppression de facture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="{{ route('invoices.destroy') }}" method="POST" autocomplete="off">
            @csrf
            @method('DELETE')
            
            <div class="modal-body">
                <p>Vous êtes sûr de vouloir Supprimer cette facture ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                <input type="hidden"  name="invoice_id" id="invoice_id" value="" />
                <button type="submit" class="btn btn-danger">Je suis Sûr !</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function(){
    
    var $deleteButton = $('.span-delete');

    var $deleteModal = $('#staticBackdrop');
    var $invoiceId  = $('#invoice_id');

    $deleteButton.on('click',function(e){
        e.preventDefault();
        console.log('clicked');
        var invoiceid = $(this).data('invoice-id'); 
        $invoiceId.val(invoiceid);
        $deleteModal.modal('show');
    });
});
</script>


@endsection