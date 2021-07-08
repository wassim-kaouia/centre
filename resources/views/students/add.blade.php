@extends('layouts.master')

@section('title')
Ajouter un Etudiant
@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Création d'un Etudiant</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                    <li class="breadcrumb-item active">Nouveau Etudiant</li>
                </ol>
            </div>
             
        </div>
    </div>
</div>
<!-- end page title -->



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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Nouveau Etudiant</h4>
                <form action="{{ route('etudiants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <label for="nom" class="col-form-label col-lg-2">Nom <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input  id="nom" name="first_name" type="text" class="form-control" placeholder="Entrer le prénom...">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="last_name" class="col-form-label col-lg-2">Prénom <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input autocomplete="off" id="last_name" name="last_name" type="text" class="form-control" placeholder="Entrer le nom...">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="natioanlity" class="col-form-label col-lg-2">Nationalité <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <select class="form-select mb-4" name="nationality">
                               <option value="Maroc">Marocaine</option>
                               <option value="Maroc">Algèrienne</option>
                               <option value="Maroc">Tunisienne</option>
                               <option value="Maroc">Egyptienne</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label for="sexe" class="col-form-label col-lg-2">Sexe <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <select class="form-select mb-4" name="sexe">
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="age" class="col-form-label col-lg-2">L'age <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input id="age" autocomplete="off" name="age" type="text" class="form-control" placeholder="Entrer l'age...">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">Date de Naissance <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                        <div class="input-group" id="datepicker2">
                                <input autocomplete="off" type="text" class="form-control" placeholder="dd-M-yyyy" name="birth"
                                        data-date-format="dd-mm-yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                                        data-date-autoclose="true">
                                       <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div><!-- input-group -->              
                    </div>
                   

                    <div class="row mb-4">
                        <label for="cin" class="col-form-label col-lg-2">CIN <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input autocomplete="off" id="cin" name="cin" type="text" class="form-control" placeholder="Entrer le numero d'identité national...">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="email" class="col-form-label col-lg-2">Email <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input autocomplete="off" id="email" name="email" type="text" class="form-control" placeholder="Entrer l'email...">
                        </div>
                    </div>

                    
                    <div class="row mb-4">
                        <label for="address" class="col-form-label col-lg-2">Adresse <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <textarea autocomplete="off"  class="form-control" name="address" id="projectdesc" rows="3" placeholder="Entrer l'adresse..."></textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="gsm" class="col-form-label col-lg-2">Téléphone - GSM <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input autocomplete="off" id="gsm" name="gsm" type="text" class="form-control" placeholder="Entrer le numero de telephone...">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="natioanlity" class="col-form-label col-lg-2">Niveau d'etudes <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <select class="form-select mb-4" name="study_level">
                               <option value="without_bac">Sans Bac</option>
                               <option value="level_bac">Niveau Bac</option>
                               <option value="bac">Bac</option>
                               <option value="superior">Etudes Superieurs</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                    <label class="col-form-label col-lg-2">Photo de Profile</label>
                    <div class="col-lg-10">
                        <input type="file" name="avatar" class="form-control" id="inputGroupFile01">
                    </div>
                    </div>

                
               
                <div class="row justify-content-end">
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-primary">Création de l'Etudiant</button>
                        <button type="reset" class="btn btn-success">Annuler</button>

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
<script>
    function submiting() {
        var form = document.getElementById("deletingForm");
        form.submit();
    }
</script>

<script>
    $('#staticBackdrop').on('show.bs.modal',function(event){
         var button = $(event.relatedTarget);
         var userId = button.data('user_id');

         $('#user_id').val(userId);
         console.log('done');
    });
</script>
@endsection
