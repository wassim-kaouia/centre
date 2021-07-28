@extends('layouts.master')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


<style>
    .fc-title { color: #fff; }
</style>
@endsection
@section('title')
Calendrier
@endsection

@section('content')
<div class="container">
    <div class="jumbotron">
       <div class="container text-center">
          <h1>Calendrier</h1>
       </div>
    </div>
    <div id='calendar'></div>
 </div>
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function () {
          
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var calendar = $('#calendar').fullCalendar({
        editable:false,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month',
        },
        //here we will set the course event link to send request 
        events:"{{ route('calendar.index') }}",
    });
  
    });
 </script>
@endsection