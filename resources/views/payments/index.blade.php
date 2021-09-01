@extends('layouts.master')

@section('title') 
Paiements
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Derniers Transactions</h4>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle">Transaction ID</th>
                                <th class="align-middle">Nom Complet</th>
                                <th class="align-middle">Date</th>
                                <th class="align-middle">Totale</th>
                                <th class="align-middle">Status de paiement</th>
                                <th class="align-middle">Methode de paiement</th>
                                <th class="align-middle">Voir details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                            <tr>
                                <td><a href="javascript: void(0);" class="text-body fw-bold">#{{ $payment->id }}</a> </td>
                                <td>{{ $payment->student->user->full_name }}</td>
                                <td>
                                    {{ $payment->created_at }}
                                </td>
                                <td>
                                    {{ $payment->full_price }} MAD
                                </td>
                                <td>
                               @if ($payment->status === 'paid')
                                    <span class="badge badge-pill badge-soft-success font-size-11">Payé</span>
                               @endif
                               @if ($payment->status === 'avance')
                                   <span class="badge badge-pill badge-soft-danger font-size-11">Avec Avance</span>
                               @endif
                               @if ($payment->status === 'partie')
                                   <span class="badge badge-pill badge-soft-danger font-size-11">Paiement Partiel</span>
                               @endif
                               @if ($payment->status === 'withoutavance')
                               <span class="badge badge-pill badge-soft-danger font-size-11">Sans Avance</span>
                               @endif
                               @if ($payment->status === 'canceled')
                                   <span class="badge badge-pill badge-soft-danger font-size-11">Annulé</span>
                               @endif
                                </td>
                                <td>
                                    <i class="bx bx-money me-1"></i> Espèces
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="{{ route('historique.payments',['id' => $payment->id]) }}" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">Voir Historique</a>
                                </td>
                            </tr> 
                            
                            @empty
                                
                            @endforelse                         
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {{ $payments->links('vendor.pagination.custom') }}
                    </div>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('script')

@endsection
