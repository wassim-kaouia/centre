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
Les Formations
@endsection

@section('content')

{{-- content here --}}



<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>Formations</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#">Accueil</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    Formations
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="section-padding course">
      <div class="course-top-wrap">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-8">
                      <p>Showing 1-9 of 8 results</p>
                  </div>
  
                  <div class="col-lg-4">
                      <div class="topbar-search">
                          <form method="get" action="#">
                              <input type="text"  placeholder="chercher une formation" class="form-control">
                              <label><i class="fa fa-search"></i></label>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
  
      <div class="container">
          <div class="row">
                @forelse ($courses as $course)
                <div class="col-lg-4 col-md-6">
                    <div class="course-block">
                        <div class="course-img">
                            <img src="{{ $course->thumbnail }}" alt="" width="100%" height="240px">
                            <span class="course-label">{{ $course->isCertified == true ? 'Formation Certifiée' : 'Formation Non Certifiée' }}</span>
                        </div>
                        
                        <div class="course-content">
                            <div class="course-price ">{{ $course->price }} MAD</div>   
                            
                            <h4><a href="#">{{ $course->title }}</a></h4>    
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <span>(5.00)</span>
                            </div>
                            <p>{{ $course->description }}</p>
    
                            <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                <div class="course-meta">
                                    <span class="course-student"><i class="bi bi-group"></i>{{ $course->students->count() }}</span>
                                    <span class="course-duration"><i class="bi bi-badge3"></i>Max {{ $course->student_limit }} étudiants</span>
                                </div> 
                               
                                <div class="buy-btn"><a href="{{ route('show.detail.course',['id' => $course->id]) }}" class="btn btn-main-2 btn-small">Détails</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    
                @endforelse
          </div>
  
  
          <div class="row">
              <div class="col-lg-12">
                   
                    
            
              </div>
          </div>
      </div>
  </section>

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