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

<!-- default styles -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> --}}
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.0/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

<!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme CSS files as mentioned below (and change the theme property of the plugin) -->
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.0/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />


@endsection

@section('title')
Page de formation
@endsection

@section('content')
<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>Blog</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#">Home</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    Blog
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </section>
  
<div class="page-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                @foreach ($blogs as $blog)
                <article class="blog-post-item">
                    <div class="post-thumb">
                        <img src="{{ $blog->couverture }}" alt="" class="img-fluid">
                    </div>
                    <div class="post-item mt-4">
                        <div class="post-meta">
                            <span class="post-date"><i class="fa fa-calendar-alt mr-2"></i>{{ $blog->created_at }}</span>
                            <span class="post-author"><i class="fa fa-user mr-2"></i>{{ $blog->user->role->role == 'Admin' ? 'Admin' : 'Secretaire' }}</span>
                            <span><a href="#" class="post-comment"><i class="fa fa-comments mr-2"></i>1 Comment</a></span>
                        </div>
                        <h2 class="post-title"><a href="#">{{ $blog->title }}</a></h2>
                        <div class="post-content">
                            {{-- <p>{!! $blog->content !!}</p> --}}
                            <p>{{ $blog->getAbbreviatedPostAttribute() }}</p>
                            <a href="{{ route('blog.show',['id' => $blog->id]) }}" class="read-more">Continuer <i class="fa fa-angle-right ml-2"></i></a>
                        </div>
                    </div>
              </article>
                @endforeach
                  <nav class="blog-pagination">
                      <ul>
                        <li class="page-num active" ><a href="#">1</a></li>
                        <li class="page-num"><a href="#">2</a></li>
                        <li class="page-num"><a href="#">3</a></li>
                      </ul>
                  </nav>
                </div>
                <div class="col-md-4">
                  <div class="blog-sidebar mt-5 mt-lg-0 mt-md-0">
      <div class="widget widget_search">
          <h4 class="widget-title">Search</h4>
          <form role="search" class="search-form">
              <input type="text" class="form-control" placeholder="Search">
              <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
          </form>
      </div>
  
       <div class="widget widget_news">
          <h4 class="widget-title">Latest Posts</h4>
          <ul class="recent-posts">
              <li>
                  <div class="widget-post-thumb">
                      <a href="#"><img src="assets/images/blog/post-thumb-2.jpg" alt="" class="img-fluid"></a>
                  </div>
                  <div class="widget-post-body">
                      <span>10 april 2020</span>
                      <h6> <a href="#">Organic Food in your door</a></h6>
                  </div>
              </li>
              <li>
                  <div class="widget-post-thumb">
                      <a href="#"><img src="assets/images/blog/post-thumb-3.jpg" alt="" class="img-fluid"></a>
                  </div>
                  <div class="widget-post-body">
                      <span>10 april 2020</span>
                      <h6> <a href="#">Get high quality food</a></h6>
                  </div>
              </li>
             
          </ul>
      </div>
  
  
      <div class="widget widget_categories">
          <h4 class="widget-title">Categories</h4>
          <ul>
            <li class="cat-item"><a href="#"><i class="fa fa-angle-right"></i>Web Design</a>(4)</li>
            <li class="cat-item"><a href="#"><i class="fa fa-angle-right"></i>Wordpress</a>(14)</li>
            <li class="cat-item"><a href="#"><i class="fa fa-angle-right"></i>Marketing</a>(24)</li>
            <li class="cat-item"><a href="#"><i class="fa fa-angle-right"></i>Design & dev</a>(6)</li>
          </ul>
      </div>
  
      <div class="widget widget_tag_cloud">
          <h4 class="widget-title">Tags</h4>
          <a href="#">Design</a>
          <a href="#">Development</a>
          <a href="#">UX</a>
          <a href="#">Marketing</a>
          <a href="#">Tips</a>
          <a href="#">Tricks</a>
          <a href="#">Ui</a>
          <a href="#">Free</a>
          <a href="#">Wordpress</a>
          <a href="#">bootstrap</a>
          <a href="#">Tutorial</a>
          <a href="#">Html</a>
      </div>
  
  </div>
                </div>
          </div>
      </div>
  </div>
  
    
@include('layouts_front.newsletter')
@endsection


@section('scriptjs')


    <!-- important mandatory libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <!-- Main jQuery -->
    {{-- <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script> --}}
    <!-- Bootstrap 4.5 -->
    <script src="{{ asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>


    </script>
@endsection


