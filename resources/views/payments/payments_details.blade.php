@extends('layouts.master')
@section('css')
    <style>
        .corner-update{
            position: absolute;
            right: 20px;
        }
    </style>
@endsection
@section('title') 
Historique de paiements 
@endsection
@section('content')
<div class="row">
   
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Historique</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Attachments</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="corner-update">
                            <a href="{{ route('historique.edit',['id' => $payment->id]) }}" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">Mise à jour le paiement</a>
                        </div>
                        <h4 class="card-title mb-4">Historique de paiements </h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle">Prix Total</th>
                                        <th class="align-middle">Payé</th>
                                        <th class="align-middle">Reste</th>
                                        <th class="align-middle">Date</th>
                                        <th class="align-middle">Status de paiement</th>
                                        <th class="align-middle">Methode de paiement</th>
                                        <th class="align-middle">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payment->detailsPayment as $detailPayment)
                                    <tr>
                                        <td>{{ $payment->full_price}} MAD</td>
                                        <td>
                                            {{ $detailPayment->paid }} MAD
                                        </td>
                                        <td>
                                            {{ $payment->full_price - $detailPayment->paid }} MAD
                                        </td>
                                        <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $detailPayment->created_at }}</a> </td>
                                        <td>
                                            @if ($detailPayment->status === 'paid')
                                                 <span class="badge badge-pill badge-soft-success font-size-11">Payé</span>
                                            @endif
                                            @if ($detailPayment->status === 'avance')
                                                <span class="badge badge-pill badge-soft-danger font-size-11">Avec Avance</span>
                                            @endif
                                            @if ($detailPayment->status === 'partie')
                                                <span class="badge badge-pill badge-soft-danger font-size-11">Paiement Partiel</span>
                                            @endif
                                            @if ($detailPayment->status === 'canceled')
                                                <span class="badge badge-pill badge-soft-danger font-size-11">Annulé</span>
                                            @endif
                                        </td>
                                        <td>
                                            <i class="bx bx-money me-1"></i> Espèces
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="{{ route('historique.edit',['id' => $payment->id]) }}" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light">Annuler</a>
        
                                        </td>
                                    </tr> 
                                    
                                    @empty
                                        
                                    @endforelse                         
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            {{-- <div class="col-lg-12">
                                {{ $payment->detailsPayment->links('vendor.pagination.custom') }}
                            </div> --}}
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <h2>Attachment will be set here</h2>
        </div>
      </div>
</div>
<!-- end row -->
@endsection

@section('script')

@endsection
