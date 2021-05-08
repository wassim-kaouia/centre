@extends('layouts.master')

@section('title') @lang('translation.Light_Sidebar') @endsection

@section('body')
    <body data-topbar="dark">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Layouts @endslot
        @slot('title') Light Sidebar @endslot
    @endcomponent

@endsection

@section('script')

@endsection

