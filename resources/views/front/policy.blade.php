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
Politique de confidentialitée
@endsection

@section('content')

{{-- content here --}}



<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>Politique De Confidentialité</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#">Accueil</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                  Politique De Confidentialité                
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="section-padding course">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                   {!! $policies == null ? 'Page sous Construction' : $policies->policy !!}
              </div>
          </div>
      </div>
  </section>
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