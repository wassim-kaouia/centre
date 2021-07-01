<header>
    <!-- Main Menu Start -->
    <div class="site-navigation main_menu menu-2" id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('frontend_assets/images/logo1.png') }}" alt="greencitycentre" width="150" class="img-fluid">
                </a>

                <!-- Toggler -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarMenu">

                    <div class="category-menu d-none d-lg-block">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-grip-horizontal"></i>Categoris
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                 <a class="dropdown-item " href="#">
                                    Categorie 1
                                </a>
                                <a class="dropdown-item " href="#">
                                    Categorie 2
                                </a> 

                                <a class="dropdown-item " href="#">
                                    Categorie 3
                                </a> 
    
                            </div>
                        </div>
                    </div>

                    <form action="#" class="header-form">
                        <input type="text" class="form-control" placeholder="rechercher">
                        <i class="fa fa-search"></i>
                    </form> 
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbar3" role="button"  aria-haspopup="true" aria-expanded="false">
                                Acceil
                            </a>
                        
                        </li>
                        <li class="nav-item ">
                            <a href="about.html" class="nav-link js-scroll-trigger">
                                Á Propos
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link js-scroll-trigger">
                                Formations
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link js-scroll-trigger">
                                Blog
                            </a>
                        </li>
                        
                        <li class="nav-item ">
                            <a href="contact.html" class="nav-link">
                                Contacter nous
                            </a>
                        </li>
                    </ul>
                    
                    <a href="#" class="btn btn-main btn-small"><i class="fa fa-sign-in-alt mr-2"></i>Login</a>
                   
                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>
    </div>
</header>