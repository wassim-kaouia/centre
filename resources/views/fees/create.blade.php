@extends('layouts.master')

@section('title')
Gestion des Frais
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Gestion de frais</h4>
                    <p class="card-title-desc">
                        Cette section est dédié à la gestion des frais des formations 
                    </p>

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                     @endif
                    <div class="mb-3 row">
                        <form action="{{ route('fees.update') }}" method="POST">
                            @csrf
                            @method('put')

                            <label for="example-text-input" class="col-md-2 col-form-label">Frais d'inscription</label>
                            <div class="col-md-10">
                            <input class="form-control" type="text" name="subscribing_fees" value="{{ $fees[0]->inscription }}" id="example-text-input">
                            </div>

                            <label for="example-text-input" class="col-md-2 col-form-label">Frais de dossier</label>
                            <div class="col-md-10">
                            <input class="form-control" type="text" name="dossier_fees" value="{{ $fees[0]->dossier }}" id="example-text-input">
                            </div>

                            <button class="btn btn-primary mt-4" type="submit">Modifier</button>
                            <button class="btn btn-danger mt-4" type="reset">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Gestion de frais</h4>
                    <p class="card-title-desc">
                        Cette section est dédié à la gestion des frais des formations 
                    </p>

                    <div class="mb-3 row">
                       
                            <label for="example-text-input" class="col-md-2 col-form-label">Frais d'inscription :<br>{{ $fees[0]->inscription }} MAD</label>
                           

                            <label for="example-text-input" class="col-md-2 col-form-label">Frais de dossier : <br> {{ $fees[0]->dossier }} MAD</label>
                           

                        
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection

@section('js')
    
@endsection

