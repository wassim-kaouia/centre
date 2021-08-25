@extends('layouts.master')

@section('title')
Modifier les parametres générales
@endsection

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Modifier Les Paramètres</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de Board</a></li>
                    <li class="breadcrumb-item active">Paramètres Generales</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Modifier Les Paramètres</h4>
                <form class="outer-repeater"  method="POST" action="{{ route('settings.update') }}" >
                    @csrf
                    @method('PUT')
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">
                            <div class="form-group row mb-4">
                                <label for="title" class="col-form-label col-lg-2">Grand Titre</label>
                                <div class="col-lg-10">
                                    <input id="title" name="title" type="text" class="form-control" value="{{ $setting->first()->title }}">
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label for="subtitle" class="col-form-label col-lg-2">Sous Titre</label>
                                <div class="col-lg-10">
                                    <input id="subtitle" name="subtitle" type="text" class="form-control" value="{{ $setting->first()->subtitle }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="leftbloc" class="col-form-label col-lg-2">Titre Bloc-Gauche</label>
                                <div class="col-lg-10">
                                    <input id="leftbloc" name="leftbloc" type="text" class="form-control" value="{{ json_decode($settings->bloc1,true)['title'] }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="desleftbloc" class="col-form-label col-lg-2">Description Bloc-Gauche</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="desleftbloc" id="desleftbloc" cols="20" rows="4">
                                        {{ json_decode($settings->bloc1,true)['description'] }} 
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="centrebloc" class="col-form-label col-lg-2">Titre Bloc-Centre</label>
                                <div class="col-lg-10">
                                    <input id="centrebloc" name="centrebloc" type="text" class="form-control" value="{{ json_decode($settings->bloc2,true)['title'] }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="descentrebloc" class="col-form-label col-lg-2">Description Bloc-Centre</label>
                                <div class="col-lg-10">
                                    <textarea name="descentrebloc" id="descentrebloc" style="width:100%" rows="4">
                                        {{ json_decode($settings->bloc2,true)['description'] }} 
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="rightbloc" class="col-form-label col-lg-2">Titre Bloc-Droite</label>
                                <div class="col-lg-10">
                                    <input id="rightbloc" name="rightbloc" type="text" class="form-control" value="{{ json_decode($settings->bloc3,true)['title'] }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="desrightbloc" class="col-form-label col-lg-2">Description Bloc-Droite</label>
                                <div class="col-lg-10">
                                    <textarea name="desrightbloc" id="desrightbloc" style="width:100%" rows="4">
                                        {{ json_decode($settings->bloc3,true)['description'] }} 
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="phone" class="col-form-label col-lg-2">Telephone</label>
                                <div class="col-lg-10">
                                    <input id="phone" name="phone" type="text" class="form-control" value="{{ $setting->first()->phone }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="address" class="col-form-label col-lg-2">Adresse</label>
                                <div class="col-lg-10">
                                    <input id="address" name="address" type="text" class="form-control" value="{{ $setting->first()->address }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="email" class="col-form-label col-lg-2">Email</label>
                                <div class="col-lg-10">
                                    <input id="email" name="email" type="text" class="form-control" value="{{ $setting->first()->email }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="about" class="col-form-label col-lg-2">Section À propos </label>
                                <div class="col-lg-10">
                                    <textarea name="about" id="about" style="width:100%" rows="4">
                                        
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="facebook" class="col-form-label col-lg-2">Facebook</label>
                                <div class="col-lg-10">
                                    <input id="facebook" name="facebook" type="text" class="form-control" value="{{ $setting->first()->facebook }}">
                                </div>
                            </div>

                           

                            <div class="form-group row mb-4">
                                <label for="instagram" class="col-form-label col-lg-2">Instagram</label>
                                <div class="col-lg-10">
                                    <input id="instagram" name="instagram" type="text" class="form-control" value="{{ $setting->first()->instagram }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="pinterest" class="col-form-label col-lg-2">Pinterest</label>
                                <div class="col-lg-10">
                                    <input id="pinterest" name="pinterest" type="text" class="form-control" value="{{ $setting->first()->pinterest }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="linkedin" class="col-form-label col-lg-2">LinkedIn</label>
                                <div class="col-lg-10">
                                    <input id="linkedin" name="linkedin" type="text" class="form-control" value="{{ $setting->first()->linkedin }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="youtube" class="col-form-label col-lg-2">Youtube</label>
                                <div class="col-lg-10">
                                    <input id="youtube" name="youtube" type="text" class="form-control" value="{{ $setting->first()->youtube }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="twitter" class="col-form-label col-lg-2">Twitter</label>
                                <div class="col-lg-10">
                                    <input id="twitter" name="twitter" type="text" class="form-control" value="{{ $setting->first()->twitter }}">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Sauvegarder les parametres</button>
                            <button type="reset" class="btn btn-danger">Annuler</button>
                        </div>
                    </div>
                </form>
               

            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection

@section('script')

@endsection
