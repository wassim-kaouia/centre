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
Page de formation
@endsection

@section('content')

{{-- content here --}}
<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>Page de Formation</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="{{ route('main') }}">Accueil</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    Formation
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="page-wrapper edutim-course-single">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="course-single-header">
      <div class="rating">
          <a href="#"><i class="fa fa-star"></i></a>
          <a href="#"><i class="fa fa-star"></i></a>
          <a href="#"><i class="fa fa-star"></i></a>
          <a href="#"><i class="fa fa-star"></i></a>
          <a href="#"><i class="fa fa-star"></i></a>
          <span>(5.00)</span>
      </div>
  
      <h3 class="single-course-title">{{ $course->title }}</h3> 
      <p>{{ $course->subtitle }}</p>  
      
      <div class="single-course-meta ">
          <ul>
              <li>
                  <span><i class="fa fa-calendar"></i>Dèrniere mise à jour :</span>
                  <a href="#" class="d-inline-block">{{ $course->updated_at }} </a>
              </li>
              
              <li>
                  <span><i class="fa fa-bookmark"></i>Categorie :</span>
                  <a href="#" class="d-inline-block">{{ $course->category->name }}</a>
              </li>
          </ul>
      </div>
  </div>
  
                  <div class="single-course-details ">
      <h4 class="course-title">Description</h4>
      <p>{{ $course->description }}</p>
  
  
      <div class="course-widget course-info">
          <h4 class="course-title">Qu'est ce que vous allez apprendre ?</h4>
          <div>
            {!! $course->what_to_learn !!}
          </div>
      </div>
  </div>
  
  
  <div class="course-widget course-info">
      <h4 class="course-title">A propos de Formateur</h4>
      <div class="instructor-profile">
          <div class="profile-img">
              <img src="{{ $course->instructor->user->avatar }}" alt="" class="img-fluid">
          </div>
          <div class="profile-info">
              <h5>{{ $course->instructor->user->full_name }}</h5>
              <div class="rating">
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star-half"></i></a>
                  <span>3.79 ratings (29 )</span>
              </div>
              <p>{{ $course->instructor->about }}</p>
              <div class="instructor-courses">
                  <span><i class="bi bi-folder"></i>{{ $course->instructor->courses->count() <= 1 ? $course->instructor->courses->count().' formation' : $course->instructor->courses->count().' formations'  }} </span>
                  <span><i class="bi bi-group"></i>{{ $nbr_students }} Etudiants</span>
              </div>
          </div>
      </div>
  </div>
  <div class="course-widget course-info">
      <h4 class="course-title">Feedback des étudiants</h4>
  
      <div class="course-review-wrapper">
          <div class="course-review">
              <div class="profile-img">
                  <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
              </div>
              <div class="review-text">
                  <h5>Mehedi Rasedh  <span>26th june 2020</span></h5>
                 
                  <div class="rating">
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star-half"></i></a>
                  </div>
                  <p>Great course. Well structured, paced and I feel far more confident using this software now then I did back in school when I was learning. And the guy doing the voice over really is great at what he does</p>
              </div>
          </div>

      </div>
  </div>
              </div>
  
              <div class="col-lg-4">
                  <div class="course-sidebar">
                <form action="{{ route('paiements.store') }}" method="POST">
                    @csrf
                    
                    <div class="course-single-thumb">
                        <img src="{{ $course->thumbnail }}" alt="" class="img-fluid w-100">
                        <div class="course-price-wrapper">
                            <div class="course-price ml-3"><h4>Prix: <span>{{ $course->price }} MAD</span></h4></div>
                            <div class="buy-btn">
                                @if (Auth::check())
                                  <input type="hidden" name="student" id="student" value="{{Auth::user()->student->id}}">
                                  <input type="hidden" name="course" id="course" value="{{ $course->id }}">
                                @endif
                                 {{-- <input type="hidden" name="amount" id="amount" value="130"> --}}
                                <button type="submit" {{ $course->payment()->exists() ? 'disabled' : '' }} class="btn btn-main btn-block">S'inscrire</button>
                            </div>
                        </div>
                    </div>
                </form>
  
  
      <div class="course-widget single-info">
          <i class="bi bi-group"></i>
          Dèja inscris <span>{{ $course->students->count() <= 1 ? $course->students->count().' étudiant' : $course->students->count().' étudiants'}} </span> 
      </div>
  
      <div class="course-widget course-details-info">
          <h4 class="course-title">Ce que inclu cette formation</h4>
          <ul>
              <li>
                  <div class="d-flex justify-content-between align-items-center">
                      <span><i class="bi bi-graph-bar"></i>Difficultée: </span>
                      Moyenne
                  </div>
              </li>
              <li>
                  <div class="d-flex justify-content-between align-items-center">
                      <span><i class="bi bi-user-ID"></i>Formateur :</span>
                      <a href="#" class="d-inline-block">{{ $course->instructor->user->full_name }}</a>
                  </div>
              </li>

              <li>
                  <div class="d-flex justify-content-between align-items-center">
                      <span><i class="bi bi-forward"></i>Langues :</span>
                      @switch($course->langue)
                          @case('en')
                            Anglais
                              @break
                          @case('fr')
                              Français
                              @break
                          @case('ar')
                              Arabe
                              @break    
                          @default
                              Non spécifiée
                      @endswitch
                  </div>
              </li>
  
              <li>
                  <div class="d-flex justify-content-between align-items-center">
                      <span><i class="bi bi-madel"></i>Certificat :</span>
                      {{ $course->isCertified == true ? 'Oui' : 'Non' }}
                  </div>
              </li>
          </ul>
      </div>
  
  
      <div class="course-widget course-share d-flex justify-content-between align-items-center">
          <span>Share</span>
          <ul class="social-share list-inline">
              <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
              <li  class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li  class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
              <li  class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
          </ul>
      </div>
  
      <div class="course-widget course-metarials">
          <h4 class="course-title">Prerequis</h4>
          <ul>
            @forelse ($requirements as $requirement)
            <li>
                <i class="fa fa-check"></i>
                {{ $requirement }}
            </li>
            @empty
                <p>Pas de prerequis pour cette formation</p>
            @endforelse
          </ul>
      </div>
  
        {{-- <div class="course-widget">
            <h4 class="course-title">Tags</h4>
            <div class="single-course-tags">
                <a href="#">Web Deisgn</a>
                <a href="#">Development</a>
                <a href="#">Html</a>
                <a href="#">css</a>
            </div>
        </div> --}} 
  
      
      
  </div>
              </div>
          </div>
      </div>
  </section>
  
  <section class="section-padding related-course">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6">
                  <div class="section-heading">
                      <h4>Des formations que vous pourrez aimer</h4>
                  </div>
              </div>
          </div>
  
          <div class="row">
              <div class="col-lg-4 col-md-6">
                  <div class="course-block">
                      <div class="course-img">
                          <img src="assets/images/course/course1.jpg" alt="" class="img-fluid">
                          <span class="course-label">Beginner</span>
                      </div>
                      
                      <div class="course-content">
                          <div class="course-price ">$50</div>   
                          
                          <h4><a href="#">Information About UI/UX Design Degree</a></h4>    
                          <div class="rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <span>(5.00)</span>
                          </div>
                          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>
  
                          <div class="course-footer d-lg-flex align-items-center justify-content-between">
                              <div class="course-meta">
                                  <span class="course-student"><i class="bi bi-group"></i>340</span>
                                  <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                              </div> 
                             
                              <div class="buy-btn"><a href="#" class="btn btn-main-2 btn-small">Details</a></div>
                          </div>
                      </div>
                  </div>
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