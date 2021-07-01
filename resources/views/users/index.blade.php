@extends('layouts.master')

@section('title')
Utilisateurs
@endsection

@section('content')

{{-- start the list from here  --}}
 
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Liste d'utilisateurs</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="">Contacts</a></li>
                                            <li class="breadcrumb-item active">Liste d'utilisateurs</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-hover">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 70px;">#</th>
                                                        <th scope="col">Nom Complet</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Nom Utilisateur</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($users as $user)
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    <a href="{{ route('users.show',['id' => $user->id]) }}"><img class="rounded-circle avatar-xs" src="{{ asset($user->avatar) }}" alt="photo de profil"></a>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="{{ route('users.show',['id' => $user->id]) }}" class="text-dark">{{ $user->full_name }}</a></h5>
                                                            <p class="text-muted mb-0">{{ $user->role->role }}</p>
                                                        </td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>
                                                            <div>
                                                                <a href="#" class="badge badge-soft-primary font-size-11 m-1">{{ $user->role->role }}</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('users.show',['id' => $user->id]) }}">{{ $user->name }}</a>
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{ route('users.show',['id' => $user->id]) }}" title="Profile"><i class="bx bx-user-circle"></i></a>
                                                                </li>
                                                                    
                                                                <li class="list-inline-item px-2">
                                                                    <a href="" data-user_id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" title="Supprimer"><i class="bx bx-trash"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        <h2>Pas d'utilisateurs ici !</h2>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                {{ $users->links('vendor.pagination.custom') }}
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
      
{{-- finish here  --}}

    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Suppression d'Utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <form action="{{ route('users.destroy') }}" method="POST" autocomplete="off">
                @csrf
                @method('DELETE')
                
                <div class="modal-body">
                    <p>Vous êtes sûr de vouloir Supprimer cet Utilisateur ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                    <input type="hidden" name="user_id" id="user_id" value="" />
                    <button type="submit" class="btn btn-danger">Je suis Sûr !</button>
                </div>
            </form>
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
