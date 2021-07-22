@extends('layouts.master')

@section('title')
Création de paiement
@endsection

@section('content')

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
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Création de paiement</h4>
                <form action="{{ route('paiements.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">Nom de l'etudiant</label>
                                <select name="student" id="student" class="form-select" onchange="console.log($(this).val())">
                                    <option selected value="{{ $student->id }}">{{ $student->user->full_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">Formation à payer</label>
                                <select name="course" id="course" class="form-select">
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                </select>
                            </div>
                        </div>
                    </div>   
                    
                    <div class="row">
                      
                        <div class="col-lg-12 mb-3">
                            <label name="montant" for="formrow-inputState" class="form-label">Montant à payer ({{ $course->price }} MAD)</label> 
                            <input class="form-control" id="amount" type="text" value="{{ $course->price }}" name="amount" />
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Création de paiement</button>
                        <button type="reset" class="btn btn-success w-md"><a class="text-white" href="{{ route('root') }}">Annuler</a></button>
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

<script>
    // $(document).ready(function(){
    //     $('select[name="student"]').on('change',function(){
    //         $studentId = $(this).val();
    //         if($studentId){
    //             $.ajax({
    //                 url: "/etudiant/perId/ " + $studentId,
    //                 type: "GET",
    //                 dataType : "json",
    //                 success: function(data){
    //                     console.log(data);
    //                     $('select[name="course"]').empty();
    //                     $.each(data, function(key,value){
    //                         // console.log(value);
    //                         $('select[name="course"]').append('<option value="'+value.id+'">'+value.title+'</option>');
    //                         $('#amount').val(value.price);
    //                         $('label[name="montant"]').text('Montant à payer ('+value.price+' MAD)');
    //                     });
    //                 }
    //             })
    //         }else{
    //             console.log('AJAX LOAD is Not Working !');
    //         }
    //     });
    // });
</script>

@endsection
