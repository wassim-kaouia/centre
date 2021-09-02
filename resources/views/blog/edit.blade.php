@extends('layouts.master')

@section('title')
Modifier Un Blog
@endsection

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Modifier Le Blog</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de Board</a></li>
                    <li class="breadcrumb-item active">Modifier Le Blog</li>
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
                <form action="{{  route('blog.update',['id' => $blog->id])  }}" class="outer-repeater"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">                            
                            <div class="row mb-4">
                                <label class="col-form-check-label col-lg-2" for="isCertified">Titre</label>
                                <div class="col-lg-10">     
                                    <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">                            
                            <div class="row mb-4">
                                <label class="col-form-check-label col-lg-2" for="isCertified">Image Couverture</label>
                                <div class="col-lg-10">    
                                    <img src="{{ $blog->couverture }}" width="200" height="100" class="m-2" > 
                                    <input type="file" name="couverture" class="form-control" id="inputGroupFile01">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">                            
                            <div class="row mb-4">
                                <label class="col-form-check-label col-lg-2" for="isCertified">Contenue</label>
                                <div class="col-lg-10">     
                                    <textarea id="elm1" name="content">
                                        {!! $blog->content !!}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Modifier Le Blog</button>
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
