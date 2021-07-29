@extends('layouts_front.master')

@section('css_files')
 <!-- bootstrap.min css -->
<link rel="stylesheet" href="{{ asset('front/vendors/bootstrap/bootstrap.css') }}">
<!-- Iconfont Css -->
<link rel="stylesheet" href="{{ asset('front/vendors/fontawesome/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('front/vendors/bicon/css/bicon.min.css') }}">
<!-- animate.css -->
<link rel="stylesheet" href="{{ asset('front/vendors/animate-css/animate.css') }}">
<!-- WooCOmmerce CSS -->
<link rel="stylesheet" href="{{ asset('front/vendors/woocommerce/woocommerce-layouts.css') }}">
<link rel="stylesheet" href="{{ asset('front/vendors/woocommerce/woocommerce-small-screen.css') }}">
<link rel="stylesheet" href="{{ asset('front/vendors/woocommerce/woocommerce.css') }}">
<!-- Owl Carousel  CSS -->
<link rel="stylesheet" href="{{ asset('front/vendors/owl/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/vendors/owl/assets/owl.theme.default.min.css') }}">
 
<!-- Main Stylesheet -->
<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
@endsection

@section('title')
Se connecter / s'inscrire
@endsection

@section('content')
{{-- content here --}}
<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>Se connecter</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#">Accueil</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    Se connecter
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </section>
  
@if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif


  <main class="site-main page-wrapper woocommerce single single-product">
      <section class="space-3">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <div class="woocommerce-notices-wrapper"></div>
                      <h2 class="font-weight-bold mb-4">Se connecter</h2>
                      <form action="{{ route('login') }}" class="woocommerce-form woocommerce-form-login login" method="post">
                          @csrf

                          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                              <label for="email">Email address<span class="required">*</span></label>
                              <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="email" autocomplete="email" value="">
                          </p>
                          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                              <label for="password">Mot de passe<span class="required">*</span></label>
                              <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" autocomplete="current-password">
                          </p>
                          <p class="form-row">
                              <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="a414dce984"><input type="hidden" name="_wp_http_referer" value="/my-account/">
                              <button type="submit" class="woocommerce-button button woocommerce-form-login__submit">Se connecter</button>
                              <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                  <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                              </label>
                          </p>
                          <p class="woocommerce-LostPassword lost_password">
                              <a href="#">Mot de passe oublié ?</a>
                          </p>
                      </form>
                  </div>
                  <div class="col-md-6">
                      <h2 class="font-weight-bold mb-4">S'inscrire</h2>
                      <form action="{{ route('etudiant.register') }}" method="POST" class="woocommerce-form woocommerce-form-register register">
                        @csrf
                          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                              <label>Nom complet<span class="required">*</span></label>
                              <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="full_name" id="" autocomplete="user-name" value="">
                          </p>
                          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                              <label>Email<span class="required">*</span></label>
                              <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="" autocomplete="email" value="">
                          </p>
                          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                              <label>Mot de passe<span class="required">*</span></label>
                              <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="" autocomplete="password" value="">
                          </p>
                          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label>Confirmer le mot de passe<span class="required">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password_confirmation" id="" autocomplete="password" value="">
                        </p>
                          <p class="woocommerce-FormRow form-row">
                              <button type="submit" class="woocommerce-Button button">S'inscrire</button>
                          </p>
                      </form>
                  </div>
              </div>
          </div>
      </section>
      <!--shop category end-->
</main>

{{-- end content --}}


@include('layouts_front.newsletter')
@endsection


@section('scriptjs')
    <!-- Main jQuery -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{ asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('assets/js/waypoint.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <!--  Owlk Carousel-->
    <script src="{{ asset('assets/js/carousel.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection

