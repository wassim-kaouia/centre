@extends('layouts.master')

@section('title')
Page De politique de confidentialit√©
@endsection

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Politique de confidentialit√©</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de Board</a></li>
                    <li class="breadcrumb-item active">Politique de confidentialit√©</li>
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
                <h4 class="card-title mb-4">Conditions Generales</h4>
                <form class="outer-repeater"  method="POST" action="{{ $policies != null && $policies->count() > 0 ? route('settings.edit_politique') :  route('settings.politique') }}" enctype="multipart/form-data" >
                    @csrf
                    @if ($policies != null && $policies->count() > 0)
                        @method('PUT')
                    @endif
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">                       
                            <div class="row mb-4">
                                <label class="col-form-check-label col-lg-2" for="isCertified">Conditions Generale de Platform</label>
                                <div class="col-lg-10">     
                                    <textarea id="elm1" name="content">{{ $policies != null && $policies->count() > 0 ? $policies->policy : ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">{{ $policies != null && $policies->count() > 0 ? 'Mise √† Jour' : 'Cr√©er La Page' }}</button>
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
<!--tinymce js-->
<script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<!-- init js -->
<script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
@endsection
