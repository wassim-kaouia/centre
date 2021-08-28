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
Page Principale 
@endsection

@section('content')
@include('layouts_front.welcome')
@include('layouts_front.blocks')

{{-- content here --}}

@if ($courses->count() > 0)
    
<section class="section-padding popular-course bg-grey">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span class="subheading">Dèrnieres formations</span>
                    <h3>Formations présentiels</h3>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="course-btn text-lg-right"><a href="{{ route('show.courses') }}" class="btn btn-success"><i class="fas fa-book-reader mr-2"></i>Toutes les formations</a></div>
            </div>
        </div>

        <div class="row">
            @forelse ($courses as $course)
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="{{ $course->thumbnail }}" alt="" class="" width="100%" height="240px">
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
                            
                            <div class="buy-btn"><a href="{{ route('show.detail.course',['id' => $course->id,'category' => $course->category->name]) }}"  class="btn btn-danger btn-small">Détails</a></div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
        </div>
    </div>
</section>
@endif

<section class="section-padding bg-grey team-2">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading">
                    <span class="subheading">Top meilleurs formateurs</span>
                    <h3>Nos formateurs profesionnaux</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($insctructors as $instructor)
            <div class="col-lg-4 col-sm-6">
                <div class="team-block">
                    <div class="team-img">
                        <img src="{{ $instructor->user->avatar }}" alt="" class="img-fluid">
                    </div>
                    <div class="team-info">
                        <h4>{{ $instructor->user->full_name }}</h4>
                        <p>Formateur</p>
                    </div>
                    <ul class="team-socials list-inline">
                        <li class="list-inline-item"><a href="{{ $settings->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
\                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div> 
    </div>
</section>

@include('layouts_front.reviews')
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