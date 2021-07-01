@extends('layouts.master-without-nav')

@section('title')
    Registrement
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('body')

    <body class="auth-body-bg">
    @endsection

    @section('content')

        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">

                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">

                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">

                                                 

                                                    <div dir="ltr">
               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5">
                                        <a href="index" class="d-block auth-logo">
                                            <img src="{{ URL::asset('/assets/images/auth_logo.png') }}" alt="" height="50"
                                                class="auth-logo-dark">
                                            <img src="{{ URL::asset('/assets/images/auth_logo.png') }}" alt="" height="50"
                                                class="auth-logo-light">
                                        </a>
                                    </div>
                                    <div class="my-auto">

                                        <div>
                                            <h5 class="text-primary">Créer un compte</h5>
                                        </div>

                                        <div class="mt-4">
                                            <form method="POST" class="form-horizontal" action="{{ route('register') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">Email</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail"
                                                    value="{{ old('email') }}" name="email" placeholder="Tapez un email" autofocus required>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="mb-3">
                                                    <label for="full_name" class="form-label">Nom Complet</label>
                                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name"
                                                    value="{{ old('full_name') }}" name="full_name" placeholder="Tapez le nom complet" autofocus required>
                                                    @error('full_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
        
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Nom d'utilisateur</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" id="username" name="name" autofocus required
                                                        placeholder="Tapez un nom d'utilisateur">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="userpassword" class="form-label">Mot de Passe</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password"
                                                        placeholder="Tapez le mot de passe" autofocus required>
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
        
                                                <div class="mb-3">
                                                    <label for="confirmpassword" class="form-label">Confirmation</label>
                                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword"
                                                    name="password_confirmation" placeholder="Confirmez le mot de passe" autofocus required>
                                                    @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="userdob">Date De Naissance</label>
                                                    <div class="input-group" id="datepicker1">
                                                        <input type="text" class="form-control @error('b_day') is-invalid @enderror" placeholder="dd-mm-yyyy"
                                                            data-date-format="dd-mm-yyyy" data-date-container='#datepicker1' data-date-end-date="0d" value=""
                                                            data-provide="datepicker" name="b_day" autofocus required>
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        @error('b_day')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
        
                                                <div class="mb-3">
                                                    <label for="avatar">Photo de Profile</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="inputGroupFile02" name="avatar" autofocus required>
                                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                                    </div>
                                                    @error('avatar')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
        
                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">S'inscrire</button>
                                                </div>
        
                
                                            </form>

                                            <div class="mt-3 text-center">
                                                <p>Vous avez dèja un compte  ? <a href="{{ url('login') }}"
                                                        class="fw-medium text-primary"> S'authentifier</a> </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

    @endsection
    @section('script')
        <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <!-- owl.carousel js -->
        <script src="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
        <!-- auth-2-carousel init -->
        <script src="{{ URL::asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
    @endsection
