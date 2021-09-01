@extends('layouts.master')

@section('title')
Qui somme nous ?
@endsection

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Qui Somme Nous</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de Board</a></li>
                    <li class="breadcrumb-item active">Qui Somme Nous</li>
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
                <h4 class="card-title mb-4">Qui Somme Nous</h4>
                <form action="{{$aboutus != null && $aboutus->count() > 0 ? route('about.update') : route('about.create') }}" class="outer-repeater"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($aboutus != null && $aboutus->count() > 0)
                        @method('PUT')
                    @endif
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">                            
                            <div class="row mb-4">
                                <label class="col-form-check-label col-lg-2" for="isCertified"></label>
                                <div class="col-lg-10">     
                                    <textarea id="elm1" name="content">{{ $aboutus != null && $aboutus->count() > 0 ? $aboutus->content : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">{{ $aboutus != null && $aboutus->count() > 0 ? 'Mise à Jour' : 'Créer La page' }}</button>
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
