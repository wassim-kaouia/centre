@extends('layouts.master')
@section('css')
@endsection

@section('title') 
Gestion des compaigns marketing
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Envoi des notifications</h4>
                    <p class="card-title-desc">
                        Cette partie est dédiée à l'envoi des notification et créations des campaigns marketing
                    </p>

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
            </div>
        </div>
    </div>  

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-12">
                            <label for="formrow-inputGroupFile01" class="form-label">Choisir une formation</label>
                            <select name="role" id="formrow-inputState" class="form-select">
                                <option disabled selected>selectionner une formation</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <form action="{{ route('sms.send') }}" method="POST">
                            @csrf
                            <div class="row mb-4" id="message_area">
                                <div class="col-lg-12">
                                    <label for="formrow-inputGroupFile01" class="form-label">Message</label>
                                    <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                        <h4>Liste des etudiants</h4>
                                            <div class="table-responsive">
                                                <table class="table mb-0">
            
                                                    <thead>
                                                        <tr>
                                                            <th>Prènom</th>
                                                            <th>Nom</th>
                                                            <th>Telephone</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="rows_gsm"></tbody>
                                                </table>
    
                                                <button id="btn_send" type="submit" class="btn btn-success mt-4">Envoyer Message</button>
                                            </div>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#btn_send').hide();
        $('#message_area').hide();
        var formation = $('select[name="role"]').on('change',function(){
            console.log(formation.val());
            $.ajax({
            url: "/getNumbers/"+formation.val(),
            type: "GET",
            dataType : "json",
            success: function(course){
                console.log(course);
                $.each(course,function(key,value){
                    $('#rows_gsm').empty();
                    $('#btn_send').hide();
                    $('#message_area').hide();
                    $.each(value.students,function(k,v){
                        $('#btn_send').show();
                        $('#message_area').show();
                        $('#rows_gsm').append("<tr>"+
                                                    "<th>"+v.first_name+"</th>"+
                                                    "<td>"+v.last_name+"</td>"+
                                                    "<td>"+v.gsm+"</td>"+
                                                    "<td>"+
                                                        "<div class='form-check form-check-success'>"+
                                                            "<input type='checkbox' checked name='liste["+v.id+"]' id='student' class='form-check-input'>"+
                                                        "</div>"+
                                                    "</td>"+
                                                "</tr>");
                    })
            
                });
            }
        });
    });

    });
</script>
@endsection
