@extends('layouts.master')

@section('title')
Utilisateurs
@endsection

@section('content')
<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
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
                                    <div class="card-title">
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-hover">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 70px;">#</th>
                                                        <th scope="col">Titre</th>
                                                        <th scope="col">Auteur</th>
                                                        <th scope="col">Date de Création</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($blogs as $blog)
                                                    <tr>
                                                        <td>
                                                            {{ $blog->id }}
                                                        </td>
                                                        <td>
                                                            <a href="#"><h5>{{ $blog->title }}</h5></a>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="#" class="text-dark">{{ $blog->user->name }}</a></h5>
                                                            <p class="text-muted mb-0">{{ $blog->user->role->role == 'Admin' ? 'Admin' : 'Secretaire' }}</p>
                                                        </td>
                                                        <td>{{ $blog->created_at }}</td>
        
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{ route('blog.edit',['id' => $blog->id]) }}" title="modifier"><i class="bx bx-user-circle"></i></a>
                                                                </li>
                                                                    
                                                                <li class="list-inline-item px-2">
                                                                    <a href="" data-blog_id="{{ $blog->id }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" title="Supprimer"><i class="bx bx-trash"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        <h2>Pas de blog pour l'instant !</h2>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                {{ $blogs->links('vendor.pagination.custom') }}
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
                    <h5 class="modal-title" id="staticBackdropLabel">Suppression de Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <form action="{{ route('blog.destroy') }}" method="POST" autocomplete="off">
                @csrf
                @method('DELETE')
                
                <div class="modal-body">
                    <p>Vous êtes sûr de vouloir Supprimer ce Blog ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                    <input type="hidden" name="blog_id" id="blog_id" value="" />
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
         var blogId = button.data('blog_id');

         $('#blog_id').val(blogId);
         console.log('done');
    });
</script>
@endsection
