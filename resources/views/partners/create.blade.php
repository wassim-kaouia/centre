@extends('layouts.master')
@section('css')
   <style>
       .slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
   </style>

   <style>
       .area-logos{
           position: relative;
       }

       #deletelogo{
           position: absolute;
           top: 10px;
           right: 10px;
           background-color: transparent;
           border: none;
       }

       .span-delete{
           font-size: 20px;
       }
   </style>
@endsection
@section('title')
Les Partenaires
@endsection

@section('content')
@if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p>
@endif
<div class="row">
    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
</div>
<div class="row">
    <h2 class="pb-4">Prevue des partenaires</h2>
    <section class="customer-logos slider">
        @forelse ($partners as $partner)
            <div class="area-logos">
                <div class="slide"><img  height="150" width="150" src="{{ asset($partner->logo) }}"></div>
                <span class="span-delete">
                    <form action="{{ route('partner.destroy',['id'=> $partner->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="deletelogo" class="bx bxs-trash" type="submit" data-btn-id="{{ $partner->id }}" style="color: red">
                    </form>
                </span>
            </div>
        @empty
            <p class="text-danger">Pas de partenaire pour le moment !</p>
        @endforelse
    </section>
</div>

<div class="row p-4">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Création d'un Utilisateur</h4>
                <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="formrow-email-input" class="form-label">Nom de Partenaire <span class="text-danger">(*)</span></label>
                                <input type="text" name="name" placeholder="Taper le nom de partenaire" class="form-control" id="formrow-email-input">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="formrow-email-input" class="form-label">Lien</label>
                                <input type="text" name="link" placeholder="Lien vers site web" class="form-control" id="formrow-email-input">
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="formrow-inputGroupFile01" class="form-label">Logo Partenaire</label>
                                <input type="file" name="logo" class="form-control" id="inputGroupFile01">
                            </div>
                        </div>
                    
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Ajouter</button>
                        <button type="reset" class="btn btn-success w-md">Annuler</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>    
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<script>
    $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>

<script>
    $(document).ready(function(){
        $('#deletelogo').on('click',function(event){
            console.log('clicked');
            var button = $(event.relatedTarget);
            var btnId = button.data('btn-id');
            console.log(btnId);
        });
    });
</script>

@endsection