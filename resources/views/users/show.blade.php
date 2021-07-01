@extends('layouts.master')

@section('title')
visualiser L'utilisateur
@endsection

@section('content')

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Salut !</h5>
                                        <p>Vous visualiser sur cette page les données de <b>{{ $user->full_name }}</b></p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="{{ asset($user->avatar) }}" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate">{{ $user->full_name }}</h5>
                                    <p class="text-muted mb-0 text-truncate">{{ $user->role->role }}</p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">
                                       
                                        <div class="row">
                                            <div class="col-6">
                                                {{-- for instructor case  --}}
                                                @if($user->role->id === 3) 
                                                  <h5 class="font-size-15">3</h5>
                                                  <p class="text-muted mb-0">Cours</p>
                                                @endif
                                                {{-- for student case  --}}
                                                @if($user->role->id === 4) 
                                                  <h5 class="font-size-15">4</h5>
                                                  <p class="text-muted mb-0">Cours Assisstés</p>
                                                @endif
                                                  
                                            </div>
                                            <div class="col-6">
                                                {{-- for instructor case --}}
                                                @if ($user->role->id === 3)
                                                <h5 class="font-size-15">$1245</h5>
                                                <p class="text-muted mb-0">Revenue</p>   
                                                @endif
                                                {{-- for student case  --}}
                                                @if ($user->role->id === 4)
                                                <h5 class="font-size-15">$1245</h5>
                                                <p class="text-muted mb-0">Revenue</p>   
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('users.edit',['id' => $user->id]) }}" class="btn btn-primary waves-effect waves-light btn-sm">Modifier ce  Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Personal Information</h4>

                            <p class="text-muted mb-4">Description</p>
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nom Complet :</th>
                                            <td>{{ $user->full_name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Telephone :</th>
                                            <td>(123) 123 1234</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">E-mail :</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Pays :</th>
                                            <td>Benguerir, Maroc</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                </div>         
                
                <div class="col-xl-8">

                    <div class="row">
                        @if ($user->role->role === 'Secretariat')
                             <div class="col-md-6">
                        @endif
                        @if ($user->role->role === 'Admin' || $user->role->role === 'Instructor')
                             <div class="col-md-4">
                        @endif
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            @if ($user->role->role === 'Admin')
                                                <p class="text-muted fw-medium mb-2">Approuvées</p>
                                                <h4 class="mb-0">21</h4>
                                            @endif
                                            @if ($user->role->role === 'Secretariat')
                                                <p class="text-muted fw-medium mb-2">Approuvées</p>
                                                <h4 class="mb-0">21</h4>
                                            @endif
                                        </div>

                                        <div class="mini-stat-icon avatar-sm align-self-center rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bx-check-circle font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($user->role->role === 'Secretariat')
                             <div class="col-md-6">
                        @endif
                        @if ($user->role->role === 'Admin' || $user->role->role === 'Instructor')
                             <div class="col-md-4">
                        @endif
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium mb-2">Formations en Attente</p>
                                            <h4 class="mb-0">12</h4>
                                        </div>

                                        <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bx-hourglass font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if ($user->role->role === 'Admin')
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium mb-2">Total Revenue</p>
                                                <h4 class="mb-0">36,524 MAD</h4>
                                            </div>

                                            <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-package font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif



                    </div>
                    
                    @if ($user->role->role === 'Admin')
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Revenue Mensuel</h4>
                                <div id="revenue-chart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Formations</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom Formation</th>
                                            <th scope="col">Date Départ</th>
                                            <th scope="col">Date de Fin</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>admin UI</td>
                                            <td>2 Sep, 2019</td>
                                            <td>20 Oct, 2019</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">Options <i class="mdi mdi-chevron-down"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Admin</td>
                                            <td>1 Sep, 2019</td>
                                            <td>2 Sep, 2019</td>
                                        </tr>
                            
                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


@endsection

@section('script')
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
 <!-- apexcharts -->
 <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
 <script src="{{ asset('assets/js/pages/profile.init.js') }}"></script>
@endsection
