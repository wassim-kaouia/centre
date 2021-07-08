@extends('layouts.master')

@section('title')
Création d'un Utilisateur 
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
                <h4 class="card-title mb-4">Création d'un Utilisateur</h4>
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="formrow-email-input" class="form-label">Email <span class="text-danger">(*)</span></label>
                                <input type="email" name="email" placeholder="Entrer l'email" class="form-control" id="formrow-email-input">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nom Complet <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="full_name" placeholder="Entrer le nom complet" id="formrow-firstname-input">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nom d'Utilisateur <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Entrer le nom d'utilisateurt" id="formrow-firstname-input">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formrow-password-input" class="form-label">Password <span class="text-danger">(*)</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Entrer Le Mot De Passe" id="formrow-password-input">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formrow-password-input" class="form-label">Password Confirmation <span class="text-danger">(*)</span></label>
                                <input type="password" name="password_confirmation" placeholder="Confirmer Le Mot De Passe" class="form-control" id="formrow-password-input">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-inputGroupFile01" class="form-label">Photo De Profil</label>
                                <input type="file" name="avatar" class="form-control" id="inputGroupFile01">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">Role <span class="text-danger">(*)</span></label>
                                <select name="role" id="formrow-inputState" class="form-select">
                                    <option value="1">Admin</option>
                                    <option value="2">Secretariat</option>
                                </select>
                            </div>
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Date de Naissance <span class="text-danger">(*)</span></label>
                                    <div class="input-group" id="datepicker2">
                                            <input autocomplete="off" type="text" class="form-control" placeholder="dd-M-yyyy" name="birth"
                                                    data-date-format="dd-mm-yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                                                    data-date-autoclose="true">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">Sexe <span class="text-danger">(*)</span></label>
                                <select class="form-select mb-4" name="sexe">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                 </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Création d'un Utilisateur</button>
                        <button type="reset" class="btn btn-success w-md">Annuler</button>
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

@endsection
