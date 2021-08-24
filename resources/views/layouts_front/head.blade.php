<header>
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <ul class="header-contact">
                        <li>
                            <span>Appeler nous sur :</span>
                           {{ $settings->phone }}
                        </li>
                        <li>
                            <span>Email :</span>
                            {{ $settings->email }}
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header-right float-right">
                        <div class="header-socials">
                            <ul>
                                <li><a href="{{ $settings->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $settings->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $settings->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="{{ $settings->pinterest }}"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        @guest
                        <div class="header-btn">
                            <a href="{{ route('login.register') }}" class="btn btn-main btn-small"><i class="fa fa-user mr-2"></i>Se Connecter / S'inscrire</a>
                        </div>
                        @else 
                        <div class="header-btn">
                            {{-- <a href="{{ route('logout') }}" class="btn btn-main btn-small"><i class="fas fa-tachometer-alt mr-2"> Dashboard</i></a> --}}
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-main btn-small"><i class="fas fa-sign-out-alt mr-2"> Se deconnecter</i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @endguest
                       
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <!-- Main Menu Start -->
   
    <div class="site-navigation main_menu " id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('main') }}">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="Edutim" class="img-fluid" width="200">
                </a>

                <!-- Toggler -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('main') }}" id="navbar3" role="button" aria-haspopup="true" aria-expanded="false">
                                Acceil
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link js-scroll-trigger">
                                Qui nous
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('show.courses') }}" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Courses
                            </a>
                           
                        </li>
                      
                    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog
                            </a>
                            
                        </li>

                        @auth
                        @if (Auth::check() && (Auth::user()->role->role == 'Admin' ||  Auth::user()->role->role == 'Secretariat'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('root') }}" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administration
                            </a> 
                        </li>   
                        @else

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mon espace
                            </a>
                            
                        </li>                        
                        @endif
                        @endauth
                        
                        <li class="nav-item ">
                            <a href="contact.html" class="nav-link">
                                Contacter nous
                            </a>
                        </li>
                    </ul>

                    {{-- <ul class="header-contact-right d-none d-lg-block">
                        <li><a href="#" class="header-search search_toggle"> <i class="fa fa fa-search"></i></a></li>
                    </ul> --}}
                   
                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>
    </div>
</header>