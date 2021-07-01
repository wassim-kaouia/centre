<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"></li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Tableau de board</span>
                    </a>
                </li>

        

                <li class="menu-title" key="t-apps">Applications</li>

                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Etudiants</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('etudiants.create') }}">Création Etudiant</a></li>
                        <li><a href="{{ route('etudiants.index') }}">Gestion des Etudiants</a></li>
                        <li><a href="#">Formations</a></li>
                        <li><a href="#">Facture</a></li>
                        <li><a href="#">Statistiques</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Formateurs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('formateurs.create') }}">Création Formateur</a></li>
                        <li><a href="{{ route('formateurs.index') }}">Gestion des Formateurs</a></li>
                        <li><a href="#">Formations</a></li>
                        <li><a href="#">Facture</a></li>
                        <li><a href="#">Statistiques</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Formations</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('formations.create') }}">Création de Formation</a></li>
                        <li><a href="{{ route('formations.index') }}">Gestion des Formations</a></li>
                        <li><a href="#">Promotions</a></li>
                        <li><a href="#">Facture</a></li>
                        <li><a href="#">Statistiques</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('tags.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Tags</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('categories.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Categories</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
