@extends('layouts.master')

@section('title')
Visualiser un Etudiant
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Visualiser les données de {{ $student->user->full_name }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Informations</h4>
                <p class="card-title-desc">Remplisser tous les champs requis (*)</p>

                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="productname">Prénom</label>
                                <input id="productname" name="productname" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="manufacturername">Nom</label>
                                <input id="manufacturername" name="manufacturername" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="manufacturerbrand">Email</label>
                                <input id="manufacturerbrand" name="manufacturerbrand" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input id="price" name="price" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Nationalité</label>
                                <select class="form-control select2">
                                    <option>Selectionner</option>
                                    <option value="FA">Fashion</option>
                                    <option value="EL">Electronic</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Features</label>

                                <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                                    <option value="WI">Wireless</option>
                                    <option value="BE">Battery life</option>
                                    <option value="BA">Bass</option>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="productdesc">Product Description</label>
                                <textarea class="form-control" id="productdesc" rows="5"></textarea>
                            </div>
                            
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Attachments - Documents</h4>

                <form action="/" method="post" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>

                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>
                        
                        <h4>Drop files here or click to upload.</h4>
                    </div>
                </form>
            </div>

        </div> <!-- end card-->
    </div>
</div>
<!-- end row -->
@endsection

@section('script')
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
 <!-- apexcharts -->
 <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
 <script src="{{ asset('assets/js/pages/profile.init.js') }}"></script>
@endsection
