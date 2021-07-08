@extends('layouts.master')

@section('title')
 Ajouter Une Formation   
@endsection

@section('content')

  <!-- start page title -->
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

    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Ajouter une Formation</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Formations</a></li>
                    <li class="breadcrumb-item active">Ajouter Une Formation</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ajout Formation</h4>
                <form action="{{ route('formations.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-4">
                        <label for="title" class="col-form-label col-lg-2">Title <span class="text-danger">(*)</span></span></label>
                        <div class="col-lg-10">
                            <input id="title" name="title" type="text" class="form-control" placeholder="Entrer le titre...">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="sub" class="col-form-label col-lg-2">Sous-titre</label>
                        <div class="col-lg-10">
                            <input id="sub" name="subtitle" type="text" class="form-control" placeholder="Entrer le sous-titre...">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="desc" class="col-form-label col-lg-2">Description <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="desc" name="description" rows="3" placeholder="Entrer La Description..."></textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">Dates <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <div class="input-daterange input-group" id="project-date-inputgroup" data-provide="datepicker" data-date-format="dd M, yyyy"  data-date-container='#project-date-inputgroup' data-date-autoclose="true">
                                <input autocomplete="off" type="text" class="form-control" placeholder="Début" name="start" />
                                <input autocomplete="off" type="text" class="form-control" placeholder="Fin" name="end" />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Prix <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input id="prix" name="price" type="text" placeholder="Entrer le prix..." class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Nombre Limit <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input id="limit" name="limit" type="text" placeholder="Entrer le nombre maximal des etudiants..." class="form-control">
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label class="col-form-check-label col-lg-2" for="active_discount">Activer La Remise</label>
                        <div class="form-check form-switch form-switch-lg mb-3 col-lg-10" dir="ltr">
                            <input class="form-check-input" type="checkbox" id="active_discount" name="discountable">
                        </div>
                    </div>

                    <div class="row mb-4" id="remise">
                        <label for="discountabl" class="col-form-label col-lg-2">Remise %</label>
                        <div class="col-lg-10">
                            <input id="discountabl" name="discount" type="text" placeholder="Entrer la remise..." class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-check-label col-lg-2" for="isCertified">Formation Certifiée</label>
                        <div class="form-check form-switch form-switch-lg mb-3 col-lg-10" dir="ltr">
                            <input class="form-check-input" type="checkbox" id="isCertified" name="is_certified">
                        </div>
                    </div>  

                    <div class="row mb-4">
                        <label for="natioanlity" class="col-form-label col-lg-2">Langue <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <select class="form-select mb-4" name="langue">
                               <option value="AR">Arabe</option>
                               <option value="EN">Anglais</option>
                               <option value="FR">Français</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="natioanlity" class="col-form-label col-lg-2">Category</span></label>
                        <div class="col-lg-10">
                            <select class="form-select mb-4" name="category">
                                @forelse ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                  <option value="0">Pas de Category</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="natioanlity" class="col-form-label col-lg-2">Formateur</label>
                        <div class="col-lg-10">
                            <select class="form-select mb-4" name="formateur">
                                  <option value="0">Choisir un Formateur</option>
                               @forelse ($instructors as $instructor)
                                  <option value="{{ $instructor->id }}">{{ $instructor->user->full_name }}</option>
                               @empty
                                  <option value="0"><p>Aucun formateur n'est disponible<p></option>
                               @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-check-label col-lg-2" for="isCertified">Contenue de Formation <span class="text-danger">(*) </span></label>
                        <div class="col-lg-10">     
                            <textarea id="elm1" name="what_learn"></textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">Thumbnail <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input class="form-control" name="thumbnail" type="file" id="formFile">
                        </div>
                    </div>
    
                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2"></label>
                        <div class="col-lg-10">
                            {{-- put the preview image --}}
                        </div>
                    </div>
    
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Ajouter La Formation</button>
                            <button type="reset" class="btn btn-danger">Annuler</button>
                        </div>
                    </div>
                    <p class="mt-5">Tous les champs avec <span class="text-danger">(*) </span> sont Obligatoires</p>
                </form>
                
            </div>
        </div>
    </div>
</div>
<!-- end row -->
    
@endsection


@section('script')

<!--tinymce js-->
<script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<!-- init js -->
<script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>

<script>
    $(document).ready(function(){
    $('#remise').hide();  
    $('#active_discount').on('click', function(event) {        
        $('#remise').toggle('show');
    });
});
</script>
@endsection