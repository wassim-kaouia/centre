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
Blog Détail
@endsection

@section('content')
<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>{{ $blog->title }}</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="{{ route('main') }}">Accueil</a>
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
                  <div class="post-single">
      <div class="post-thumb">
          <img src="{{ $blog->couverture }}" alt="" class="img-fluid">
      </div>
  
     <div class="single-post-content">
          <div class="post-meta mt-4">
              <span class="post-date"><i class="fa fa-calendar-alt mr-2"></i>{{ date('d-m-Y', strtotime($blog->created_at))}}</span>
              <span class="post-comment"><i class="fa fa-comments mr-2"></i>{{ $blog->comments->count() }} Comment</span>
              <span><a href="#" class="post-author"><i class="fa fa-user mr-2"></i>{{ $blog->user->role->role == 'Admin' ? 'Admin' : 'Secretaire'}}</a></span>
          </div>
  
          <p class="mt-4 "></p>
      
          <h4>{{ $blog->title }}</h4>
          <p>{!! $blog->content !!}</p>
          
          {{-- <blockquote>
              Good design good business.Deliver the project wirthin time.its called professionalism. Build your site with care.
              <cite>- Site Admin</cite>
          </blockquote> --}}
  
     </div>

  
      <div class="author">
          <div class="author-img">
              <img src="{{ $blog->user->avatar }}" alt="" class="img-fluid">
          </div>
          <div class="author-info">
              <h4>{{ $blog->user->name }}</h4>
              <p>{{ $blog->user->role->role == 'Admin' ? 'Admin' : 'Secretaire'}}</p>
              <p>{{ $settings->about }}</p>
              <ul class="list-inline">
                  <li class="list-inline-item"><a href="{{ $settings->facebook }}"><i class="fab fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="{{ $settings->twitter }}"><i class="fab fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="{{ $settings->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                  <li class="list-inline-item"><a href="{{ $settings->pinterest }}"><i class="fab fa-pinterest"></i></a></li>
              </ul>
          </div>
      </div>
      
  
       <div class="comments">
          <h3 class="commment-title">{{ $blog->comments->count() }} Comment</h3>
  
          @foreach ($blog->comments as $comment)
          <div class="media">
            <img src="{{ $comment->user->avatar }}" width="100" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0">{{ $comment->user->name }} <span class="text-primary">{{ date('d-m-Y', strtotime($comment->created_at))}}</span> </h5>
                {{ $comment->content }}
            </div>
        </div> 
          @endforeach
      </div>
  
  
  
      <div class="comments-form p-5 mt-4">
          <h3>Laisser un commentaire </h3>
          <p>Votre email sera pas affiché , Les champs avec * sont requis</p>
          <form action="{{ route('comment.store') }}" method="POST" class="comment_form">
            @csrf
              <div class="row form-row">
                  <div class="col-lg-12">
                      <div class="form-group">
                          <textarea name="content" id="content" cols="30" rows="6" placeholder="Commentaire" class="form-control"></textarea>
                      </div>
                  </div>
                  
                  <div class="col-lg-6">
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Nom" name="nom">
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group"> 
                          <input type="text" class="form-control"  placeholder="Email" name="email">
                      </div>
                  </div>
                   <div class="col-lg-12">
                      <div class="form-group">
                         <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                         <input type="hidden" name="blog" value="{{ $blog->id}}">
                         <button class="btn btn-success" type="submit">Commenter</button>
                    </div>
                  </div>
              </div>
          </form>
      </div>    
  
  </div>
                </div>
                <div class="col-md-4">
                  <div class="blog-sidebar mt-5 mt-lg-0 mt-md-0">
      <div class="widget widget_search">
          <h4 class="widget-title">Rechercher</h4>
          <form role="search" class="search-form">
              <input type="text" class="form-control" placeholder="Rechercher">
              <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
          </form>
      </div>
  
       <div class="widget widget_news">
          <h4 class="widget-title">Derniers Blogs</h4>
          <ul class="recent-posts">
              @foreach ($lasts as $post)
              <li>
                <div class="widget-post-thumb">
                    <a href="#"><img src="{{ $post->couverture }}" alt="" class="img-fluid"></a>
                </div>
                <div class="widget-post-body">
                    <span>{{ date('d-m-Y', strtotime($post->created_at))}}</span>
                    <h6> <a href="{{ route('blog.show',['id' => $post->id]) }}">{{ $post->title }}</a></h6>
                </div>
            </li> 
              @endforeach
          </ul>
      </div>
  
  
      {{-- <div class="widget widget_categories">
          <h4 class="widget-title">Categories</h4>
          <ul>
            <li class="cat-item"><a href="#"><i class="fa fa-angle-right"></i>Web Design</a>(4)</li>
            <li class="cat-item"><a href="#"><i class="fa fa-angle-right"></i>Wordpress</a>(14)</li>
            <li class="cat-item"><a href="#"><i class="fa fa-angle-right"></i>Marketing</a>(24)</li>
            <li class="cat-item"><a href="#"><i class="fa fa-angle-right"></i>Design & dev</a>(6)</li>
          </ul>
      </div> --}}
{{--   
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
      </div> --}}
  
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


