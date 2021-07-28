@extends('layouts.master')

@section('title')
Modifier Une Formation   
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
            <h4 class="mb-sm-0 font-size-18">Modifier une Formation</h4>

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
                <h4 class="card-title mb-4">Modifier la formation</h4>
                <form action="{{ route('formations.update') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <label for="title" class="col-form-label col-lg-2">Title <span class="text-danger">(*)</span></span></label>
                        <div class="col-lg-10">
                            <input id="title" name="title" type="text" class="form-control" value="{{ $course->title }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="sub" class="col-form-label col-lg-2">Sous-titre</label>
                        <div class="col-lg-10">
                            <input id="sub" name="subtitle" type="text" class="form-control" value="{{ $course->subtitle }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="desc" class="col-form-label col-lg-2">Description <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="desc" name="description" rows="3" >{{ $course->description  }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">Dates <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <div class="input-daterange input-group" id="project-date-inputgroup" data-provide="datepicker" data-date-format="dd M, yyyy"  data-date-container='#project-date-inputgroup' data-date-autoclose="true">
                                <input autocomplete="off" type="text" class="form-control" value="{{ $course->start }}" name="start" />
                                <input autocomplete="off" type="text" class="form-control" value="{{ $course->end }}" name="end" />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Prix <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input id="prix" name="price" type="text" value="{{ $course->price }}" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Nombre Limit <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <input id="limit" name="limit" type="text" value="{{ $course->student_limit }}" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label class="col-form-check-label col-lg-2" for="active_discount">Activer La Remise</label>
                        <div class="form-check form-switch form-switch-lg mb-3 col-lg-10" dir="ltr">
                            <input {{ $course->isDiscounted === 1 ? 'checked' : '' }} class="form-check-input" type="checkbox" id="active_discount" name="discountable">
                        </div>
                    </div>

                    <div class="row mb-4" id="remise">
                        <label for="discountabl" class="col-form-label col-lg-2">Remise %</label>
                        <div class="col-lg-10">
                            <input value="{{ $course->discount }}" id="discountabl" name="discount" type="text"  class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-check-label col-lg-2" for="isCertified">Formation Certifiée</label>
                        <div class="form-check form-switch form-switch-lg mb-3 col-lg-10" dir="ltr">
                            <input class="form-check-input" type="checkbox" {{ $course->isCertified === 1 ? 'checked' : '' }} id="isCertified" name="is_certified">
                        </div>
                    </div>  

                    <div class="row mb-4">
                        <label for="natioanlity" class="col-form-label col-lg-2">Langue <span class="text-danger">(*)</span></label>
                        <div class="col-lg-10">
                            <select class="form-select mb-4" name="langue">
                               <option {{ $course->langue === 'ar' ? 'selected' : '' }} value="ar" >Arabe</option>
                               <option {{ $course->langue === 'en' ? 'selected' : '' }} value="en" >Anglais</option>
                               <option {{ $course->langue === 'fr' ? 'selected' : '' }} value="fr" >Français</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="natioanlity" class="col-form-label col-lg-2">Category</span></label>
                        <div class="col-lg-10">
                            <select class="form-select mb-4" name="category">
                                @forelse ($categories as $category)
                                  <option {{ $category->name === $course->category->name ? 'selected' : ''  }} value="{{ $category->id }}">{{ $category->name }}</option>
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
                                  <option {{ $course->instructor->id === $instructor->id ? 'selected' : ''}} value="{{ $instructor->id }}">{{ $instructor->user->full_name }}</option>
                               @empty
                                  <option value="0"><p>Aucun formateur n'est disponible<p></option>
                               @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-check-label col-lg-2" for="isCertified">Pourcentage Formateur<span class="text-danger">(*) </span></label>
                        <div class="col-lg-10">     
                            <input type="text" class="form-control" name="pourcentage" id="pourcentage" value="{{ $course->pourcentage_instructor }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-check-label col-lg-2" for="isCertified">Contenue de Formation <span class="text-danger">(*) </span></label>
                        <div class="col-lg-10">     
                            <textarea id="elm1" name="what_learn">{!! $course->what_to_learn !!}</textarea>
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
                            <img src="{{ asset($course->thumbnail) }}" alt="" width="100">

                        </div>
                    </div>

                    <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
    
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Modifier La Formation</button>
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
    // $('#remise').hide();  
    // $('#active_discount').on('click', function(event) {        
    //     $('#remise').toggle('show');
    // });
    if( $('input[name="discountable"]').is(':checked')) {
        console.log('it is checked already');
        $('#remise').show();
    }else{
        console.log('its unchecked !');
        $('#remise').show();
    }

});
</script>
@endsection