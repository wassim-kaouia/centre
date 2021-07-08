@extends('layouts.master')

@section('title')
Formations
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
<!-- start page title -->
<div class="row">
    @forelse ($courses as $course)
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="avatar-md me-4">
                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                            <img class="rounded-circle" src="{{ $course->instructor->user->avatar }}" alt="" height="60">
                        </span>
                    </div>
                    <div class="media-body overflow-hidden">
                        <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $course->title }}</a></h5>
                        <p class="text-muted mb-4">Prix Total HT: {{ $course->students()->count() * $course->price }} MAD</p>
                        <p>Nombre Limit: {{ $course->student_limit }} - reste {{ $course->student_limit-$course->students()->count()  }} places</p>
                        <div class="avatar-group">
                            @foreach ($course->students()->take(6)->get() as $student)
                            <div class="avatar-group-item">
                                <a href="javascript: void(0);" class="d-inline-block">
                                    <img src="{{ asset($student->user->avatar) }}" alt="{{ $student->user->full_name }}" class="rounded-circle avatar-xs">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 border-top">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item me-3">
                        <span class="badge {{ $course->student_limit === $course->students()->count() ? 'bg-danger' : 'bg-success' }}">{{ $course->student_limit === $course->students()->count() ? 'Complete' : 'Ouverte' }}</span>
                    </li>
                    <li class="list-inline-item me-3">
                        <i class= "bx bx-calendar me-1"></i> {{ $course->created_at }}
                    </li>
                    <li class="list-inline-item me-3">
                        <i class= "bx bx-comment-dots me-1"></i> {{ $course->students()->count() }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @empty
        
    @endforelse
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
         var attachmentId = button.data('attachment_id');

         $('#attachment_id').val(attachmentId);
         console.log('done');
    });
</script>
@endsection
