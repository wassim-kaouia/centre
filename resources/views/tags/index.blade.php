@extends('layouts.master')

@section('title')
Tags
@endsection

@section('content')
{{-- start the list from here  --}}
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Liste des Tags</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Création de Tags</h4>
                    <p class="card-title-desc">
                        Ici vous pouvez créer les 'Tags' pour vos formations Afin de faciliter la recherche chez les utilisateurs
                    </p>

                    <div class="mb-3 row">
                        <p class="text-muted">Tags</p>

                        <div class="d-flex flex-wrap gap-2 widget-tag">
                            @forelse ($tags as $tag)
                                <div><a href="#" class="badge bg-light font-size-12">{{ $tag->name }}</a></div>
                            @empty
                                <p>Il n'y a pas de Tags pour le moment !</p>
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
                        <form action="{{ route('tags.create') }}" method="POST">
                            @csrf
                            <label for="example-text-input" class="col-md-2 col-form-label">Nom de Tag</label>
                            <div class="col-md-10">
                            <input class="form-control" type="text" name="tag_name" value="" id="example-text-input">
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

    @if (count($tags) > 0)
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Suppression des Tags</h4>
                    <p class="card-title-desc">
                        Ici vous pouvez supprimer tous les Tags non Nécessaires
                    </p>

                    <div class="mb-3 row">
                        <p class="text-muted">Tags</p>

                        <div class="d-flex flex-wrap gap-2 widget-tag">
                            <form action="{{ route('tags.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <select class="form-select mb-4" name="selected_tag">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-danger">Supprimer le Tag</button>
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
