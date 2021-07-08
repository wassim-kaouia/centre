@extends('layouts.master')

@section('title') 
Tableau de Board 
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                            <i class="bx bx-copy-alt"></i>
                        </span>
                    </div>
                    <h5 class="font-size-14 mb-0">Revenue Total</h5>
                </div>
                <div class="text-muted mt-4">
                    <h4>{{ $course['totalcurrent'].' MAD' }} <i class="{{ $course['difference'] > 0 ? 'mdi mdi-chevron-up ms-1 text-success' : 'mdi mdi-chevron-down ms-1 text-danger'}}"></i></h4>
                    <div class="d-flex">
                        <span class="badge badge-soft-success font-size-12"> {{ $course['difference'] > 0 ? '+'.$course['difference'] : $course['difference'] }}% </span> <span class="ms-2 text-truncate">de la derniere année</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                            <i class="bx bx-book-open"></i>
                        </span>
                    </div>
                    <h5 class="font-size-14 mb-0">Formations En Attente</h5>
                </div>
                <div class="text-muted mt-4">
                    <h4>{{ $pending->count() == 0 ? 0 : $pending->count() }} <i class="{{ $pending->count() == 0 ? 'mdi mdi-chevron-down ms-1 text-danger' : 'mdi mdi-chevron-up ms-1 text-success'}}"></i></h4>
                    <div class="d-flex">
                        <span class="ms-2 text-truncate">{!! $pending->count() == 0 ? 'Pas de formations en attante' : '<a href="/formation/non-approuver">verifier les formation en attente</a>' !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                            <i class="bx bx-male"></i>
                        </span>
                    </div>
                    <h5 class="font-size-14 mb-0">Nombre Des Etudiants</h5>
                </div>
                <div class="text-muted mt-4">
                    <h4>{{ $students->count() }} <i class="{{ $students->count() == 0 ? 'mdi mdi-chevron-down ms-1 text-danger' : 'mdi mdi-chevron-up ms-1 text-success'}}"></i></h4>
                    <div class="d-flex">
                        <span class="ms-2 text-truncate">{{ $students->count() == 0 ? 'aucun etudiant pour le moment' : 'Actifs' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                            <i class="bx bx-male"></i>
                        </span>
                    </div>
                    <h5 class="font-size-14 mb-0">Nombre De Formations</h5>
                </div>
                <div class="text-muted mt-4">
                    <h4>{{ $courses->count() }} <i class="{{ $courses->count() == 0 ? 'mdi mdi-chevron-down ms-1 text-danger' : 'mdi mdi-chevron-up ms-1 text-success'}}"></i></h4>
                    <div class="d-flex">
                        <span class="ms-2 text-truncate">{{ $courses->count() == 0 ? 'aucune formation pour le moment' : 'Actives' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                            <i class="bx bx-copy-alt"></i>
                        </span>
                    </div>
                    <h5 class="font-size-14 mb-0">Haute Formation</h5>
                </div>
                <div class="text-muted mt-4">
                    <h4>{{ $high['revenue'].' MAD' }} <i class="{{ $high['revenue'] > 0 ? 'mdi mdi-chevron-up ms-1 text-success' : 'mdi mdi-chevron-down ms-1 text-danger'}}"></i></h4>
                    <div class="d-flex">
                        <span class="badge badge-soft-success font-size-12"> Titre: {{ $high['course']->title }} </span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
