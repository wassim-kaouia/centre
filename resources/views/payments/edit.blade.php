@extends('layouts.master')

@section('title')
Mise à jour de l'historique
@endsection

@section('content')

<div class="row">
    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Mise à jour de l'historique</h4>
                <form action="{{ route('historique.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">Formation</label>
                                <input class="form-control" type="text" name="formation" id="formation" value="{{ $payment->course->title }}" disabled>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">Montant Total</label>
                                <input class="form-control" type="text" name="total" id="total" value="{{ $payment->full_price }} MAD" disabled>
                            </div>
                        </div>
                    </div>   
                    
                    <div class="row">
                      
                        <div class="col-lg-6 mb-3">
                            <label name="montant" for="formrow-inputState" class="form-label">Montant payé  ({{ $payment->paid }} MAD)</label> 
                            <input class="form-control" id="amount_paid" type="text" value="{{ $payment->paid }} MAD" disabled name="amount_paid" />
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label name="montant" for="formrow-inputState" class="form-label">Montant restant</label> 
                            <input class="form-control" id="amount_rest" type="text" value="{{ $payment->rest }} MAD" disabled name="amount_rest" />
                        </div>
                    </div>

                    <div class="row">
                      
                        <div class="col-lg-6 mb-3">
                            <label name="montant" for="formrow-inputState" class="form-label">Montant de régularisation (MAD)</label> 
                            <input class="form-control" id="amount_regul" type="text" value="{{ $payment->rest }}"  name="amount_regul" />
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label name="montant" for="formrow-inputState" class="form-label">Montant restant</label> 
                            <input class="form-control" id="amount_rest" type="text" value="{{ $payment->rest }} MAD" disabled name="amount_rest" />
                        </div>
                    </div>

                    <div>
                        <input type="hidden" name="payment_id" id="payment" value="{{ $payment->id }}">
                        <button type="submit" class="btn btn-primary w-md">Modifier le paiement</button>
                        <button type="reset" class="btn btn-success w-md"><a class="text-white" href="{{ route('root') }}">Annuler</a></button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>    
@endsection

@section('script')

<script>
 
</script>

@endsection
