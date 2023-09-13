@extends('layouts.employee')
@section('page-title')
    {{__('Employee Profile')}}
@endsection
@push('css-page')

@endpush
@push('script-page')

@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Mental Wellness Library')}}</li>
@endsection

@section('content')
    @include('partials.video-library')
@endsection
