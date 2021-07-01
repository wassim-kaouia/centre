@extends('layouts.master')

@section('title')
Liste Des Etudiants
@endsection

@section('content')
{{-- start the list from here  --}}
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Liste Des Etudiants</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                    <li class="breadcrumb-item active">Projects List</li>
                </ol>
            </div>
            
        </div>
    </div>
</div>     
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class="table-responsive">
                <table class="table project-list-table table-nowrap align-middle table-borderless">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 100px">#</th>
                            <th scope="col">Nom Complet</th>
                            <th scope="col">Date Inscription</th>
                            <th scope="col">Status de Paiement</th>
                            <th scope="col">Status de Formation</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <td><img src="{{ asset($student->photo_profile) }}" alt="" class="avatar-sm"></td>
                            <td>
                                <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">{{ $student->first_name.' '.$student->last_name }}</a></h5>
                                <p class="text-muted mb-0">{{ $student->user->email }}</p>
                            </td>
                            <td>{{ $student->created_at }}</td>
                            <td><span class="badge bg-success">Complet</span></td>
                            <td><span class="badge bg-primary">En formation</span></td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('etudiants.edit',['id' => $student->id]) }}">Modifier</a>
                                        <a class="dropdown-item" href="#">Factures</a>
                                        <a class="dropdown-item" href="#">Formations</a>
                                    </div>
                                </div>
                            </td>
                        </tr> 
                        @empty
                            <h2>Pas d'etudiants</h2>
                        @endforelse              
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    
    
   
                        
@endsection

@section('script')
<script>
    function submiting() {
        var form = document.getElementById("deletingForm");
        form.submit();
    }
</script>

<script>
    $('#staticBackdrop').on('show.bs.modal',function(event){
         var button = $(event.relatedTarget);
         var userId = button.data('user_id');

         $('#user_id').val(userId);
         console.log('done');
    });
</script>
@endsection
