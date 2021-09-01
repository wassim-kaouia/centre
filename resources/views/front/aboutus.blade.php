@extends('layouts_front.master')

@section('css_files')
 <!-- bootstrap.min css -->
<link rel="stylesheet" href="{{ asset('front/vendors/bootstrap/bootstrap.css') }}">
<!-- Iconfont Css -->
<link rel="stylesheet" href="{{ asset('front/vendors/fontawesome/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('front/vendors/bicon/css/bicon.min.css') }}">
<!-- animate.css -->
<link rel="stylesheet" href="{{ asset('front/vendors/animate-css/animate.css') }}">

 
<!-- Main Stylesheet -->
<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
@endsection

@section('title')
Qui somme nous ?
@endsection

@section('content')

{{-- content here --}}

<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>Qui Somme Nous</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#">Accueil</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    Qui Somme Nous               
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="course">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 p-0">
                  <img src="{{ asset('assets/images/aboutus.png') }}" class="img-fluid"  width="100%">
              </div>
          </div>
          <div class="row p-4">
              <div class="col-lg-12">
                   {!! $aboutus == null ? 'Page sous Construction' : $aboutus->content !!}
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

    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection