<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"></li>

                <li>
                    <a href="{{ route('root') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Tableau de board </span>
                    </a>
                </li>

        

                <li class="menu-title" key="t-apps">Applications</li>

                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-dashboards">Utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('calendar.index') }}" class="waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-dashboards">Calendrier</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-school"></i>
                        <span>Etudiants</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('etudiants.create') }}">Création Etudiant</a></li>
                        <li><a href="{{ route('etudiants.index') }}">Gestion des Etudiants</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-badge"></i>
                        <span>Formateurs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('formateurs.create') }}">Création Formateur</a></li>
                        <li><a href="{{ route('formateurs.index') }}">Gestion des Formateurs</a></li>
        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-book-open"></i>
                        <span>Formations</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('formations.create') }}">Création de Formation</a></li>
                        <li><a href="{{ route('formations.index') }}">Gestion des Formations</a></li>
                        <li><a href="{{ route('formations.pending') }}">Non Approuvées <span class="badge rounded-pill bg-danger float-end">{{ $pending->count()>0 ? $pending->count() : 0 }}</span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('tags.index') }}" class="waves-effect">
                        <i class="bx bxs-bookmark-star"></i>
                        <span key="t-dashboards">Tags</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('categories.index') }}" class="waves-effect">
                        <i class="bx bx-tag"></i>
                        <span key="t-dashboards">Categories</span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-shopping-bag"></i>
                        <span>Paiements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('paiements.index') }}">Transactions</a></li>
                        <li><a href="{{ route('paiements.paid') }}">Effectué</a></li>
                        <li><a href="{{ route('paiements.avance') }}">Avec Avance</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="{{ route('tags.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Séries</span>
                    </a>
                </li> --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span>Factures</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('invoices.index') }}">Liste des factures</a></li>
                        <li><a href="{{ route('invoices.receipt') }}">Reçus de Paiements <span class="badge rounded-pill bg-danger float-end">{{ $payments_paid->count()>0 ? $payments_paid->count() : 0 }}</span></a></li>
                        <li><a href="{{ route('invoices.avance') }}">Reçus d'avances <span class="badge rounded-pill bg-danger float-end">{{ $payments_avance->count()>0 ? $payments_avance->count() : 0 }}</span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('sms.index') }}" class="waves-effect">
                        <i class="bx bx-user-voice"></i>
                        <span key="t-dashboards">Promotions</span>
                    </a>
                </li>
                     
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-plug"></i>
                        <span>Gestion general</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('fees.index') }}">Les frais</a></li>
                        <li><a href="{{ route('settings.edit') }}">Paramètres Generales</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
