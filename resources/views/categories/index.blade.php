@extends('layouts.master')

@section('title')
Categories
@endsection

@section('content')
{{-- start the list from here  --}}
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Liste des Catègories</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Création de Catègories</h4>
                    <p class="card-title-desc">
                        Ici vous pouvez créer les 'Categories' pour organiser votre platforme

                    <div class="mb-3 row">
                        <p class="text-muted">Catègories</p>

                        <div class="d-flex flex-wrap gap-2 widget-tag">
                            @forelse ($categories as $categorie)
                                <div><a href="#" class="badge bg-light font-size-12">{{ $categorie->name }}</a></div>
                            @empty
                                <p>Il n'y a pas de Categorie pour le moment !</p>
                            @endforelse
                        </div>
                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                     @endif
                    <div class="mb-3 row">
                        <form action="{{ route('categories.create') }}" method="POST">
                            @csrf
                            <label for="example-text-input" class="col-md-2 col-form-label">Nom de categorie</label>
                            <div class="col-md-10">
                            <input class="form-control" type="text" name="categorie_name" value="" id="example-text-input">
                            </div>
                            <button class="btn btn-primary mt-4" type="submit">Créer</button>
                            <button class="btn btn-danger mt-4" type="reset">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    
    
    {{-- delete area --}}

    @if (count($categories) > 0)
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Suppression des Categories</h4>
                    <p class="card-title-desc">
                        Ici vous pouvez supprimer tous les Categories non Nécessaires
                    </p>

                    <div class="mb-3 row">
                        <p class="text-muted">Categories</p>

                        <div class="d-flex flex-wrap gap-2 widget-tag">
                            <form action="{{ route('categories.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <select class="form-select mb-4" name="selected_categorie">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-danger">Supprimer la categorie</button>
                            </form>
                        </div>
                    </div>
            
                    </div>
                </div>
            </div>
        </div>
    </div>  
    @endif
   
                        
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
