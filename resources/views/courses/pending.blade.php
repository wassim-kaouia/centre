@extends('layouts.master')

@section('title') 
Formation Non Approuvées
@endsection
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Formations</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                    <li class="breadcrumb-item active">Formation Grid</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Approuver Les Formations</h4>
                <p class="card-title-desc">

                </p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom Formation</th>
                                <th>Formateur</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;
                            ?>
                            @forelse ($pending as $pd)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $pd->title }}</td>
                                <td>{{ $pd->instructor->user->full_name }}</td>
                                <td>
                                    <a class="btn btn-outline-success btn-sm"
                                href="{{ route('formations.approuved',['id' => $pd->id,'approuver' => Auth::user()->id]) }}"
                                role="button"><i class="fas fa-eye"></i>
                                Approuver
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <h2>Toutes Les Formations sont Approuvées</h2>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
    </div>
</div>
</div>
@endsection

@section('script')

@endsection
