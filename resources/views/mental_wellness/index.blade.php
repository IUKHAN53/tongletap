@extends('layouts.admin')

@section('page-title')
    {{__('Mental Wellness Library')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Mental Wellness Library')}}</li>
@endsection
@section('content')
    @include('partials.video-library')
@endsection
