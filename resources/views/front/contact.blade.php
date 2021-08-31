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
Conditions Generales
@endsection

@section('content')
<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>Contact Us</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#">Home</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    Contact
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="contact-info section-padding">
      <div class="container">
          <div class="row align-items-center justify-content-center">
              <div class="col-lg-6">
                  <div class="section-heading center-heading">
                      <span class="subheading" style="color: #96c221">Contacter nous</span>
                      <h3>Avez vous une question ?</h3>
                      <p>Nous somme à votre écoute ! </br> Veillez remplir le formulaire avec vos informations puis tapez le botton envoyer.</p>
                  </div>
              </div>
          </div>
         
          <div class="row justify-content-center">
              <div class="col-lg-4">
                  <div class="row">
                      <div class="col-lg-12 col-md-6">
                          <div class="contact-item">
                              <p style="color: #96c221">Email</p>
                              <h4>{{ $settings->email }}</h4>
                          </div>
                      </div>
                       <div class="col-lg-12 col-md-6">
                          <div class="contact-item">
                              <p style="color: #96c221">Telephone</p>
                              <h4>{{ $settings->phone }}</h4>
                          </div>
                      </div>
                       <div class="col-lg-12 col-md-6">
                          <div class="contact-item">
                              <p style="color: #96c221">Adresse</p>
                              <h4>{{ $settings->address }}</h4>
                          </div>
                      </div>
                  </div>
              </div>
  
              <div class="col-lg-8">
                  <form class="contact__form form-row " method="POST" action="mail.php" id="contactForm">
                      <div class="row">
                         <div class="col-12">
                             <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                 Votre Message est Envoyé avec Succée.
                             </div>
                         </div>
                     </div>
  
                     <div class="row">
                         <div class="col-lg-6">
                             <div class="form-group">
                                 <input type="text" id="name" name="name" class="form-control" placeholder="Votre Nom">
                             </div>
                         </div>
                         
                         <div class="col-lg-6">
                             <div class="form-group">
                                 <input type="text" name="email" id="email" class="form-control" placeholder="Email Adresse">
                             </div>
                         </div>
                         <div class="col-lg-12">
                             <div class="form-group">
                                 <input type="text" name="subject" id="subject" class="form-control" placeholder="Objet">
                             </div>
                         </div>
                         
                         <div class="col-lg-12">
                             <div class="form-group">
                                 <textarea id="message" name="message" cols="30" rows="6" class="form-control" placeholder="Votre Message"></textarea>    
                             </div>
                         </div>
                     </div>
  
                     <div class="col-lg-12">
                         <div class="mt-4 text-right">
                             <button class="btn btn-success" type="submit">Envoyer Le Message <i class="fa fa-angle-right ml-2"></i></button>
                         </div>
                     </div>
                 </form> 
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