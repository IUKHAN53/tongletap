@extends('layouts.auth')
@php
use App\Models\Utility;
// $logo=asset(Storage::url('uploads/logo/'));
$logo=\App\Models\Utility::get_file('uploads/logo');

$company_logo=Utility::getValByName('company_logo');
$settings = Utility::settings();
$mode_setting = \App\Models\Utility::mode_layout();
@endphp
@push('custom-scripts')
@if(env('RECAPTCHA_MODULE') == 'on')
{!! NoCaptcha::renderJs() !!}
@endif
@endpush
@section('page-title')
{{__('Login')}}
@endsection

@section('auth-topbar')
<li class="nav-item ">
    <select class="btn btn-primary my-1 me-2 " onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" id="language">
        @foreach(Utility::languages() as $language)
        <option class="" @if($lang==$language) selected @endif value="{{ route('login',$language) }}">{{Str::upper($language)}}</option>
        @endforeach
    </select>
</li>
@endsection
@section('content')
<img src="{{ asset('assets/images/butterfly-logo.png') }}" alt="logo" class="center" height="100px" width="100px" />

</a>
<div class="">
    <h4 class="mb-3 f-w-600 mt-4 text-center">{{__('Tongle Employee Assistance Portal')}}</h4>
</div>
{{Form::open(array('route'=>'login','method'=>'post','id'=>'loginForm' ))}}
@csrf
<div class="">
    <div class="form-group mb-3 input-container">
        <input class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email" id=" email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        <i class="fa fa-envelope icon" title="Email"></i><br>
        @error('email')
        <div class="invalid-feedback" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3 input-container">
        <input class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Your Password" type="password" name="password" required>
        <i class="fa fa-key icon" title="Password"></i><br>
        @error('password')
        <div class="invalid-feedback" role="alert">{{ $message }}</div>
        @enderror
    </div>
    @if(env('RECAPTCHA_MODULE') == 'on')
    <div class="form-group mb-3">
        {!! NoCaptcha::display() !!}
        @error('g-recaptcha-response')
        <span class="small text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @endif
    <div class="form-group mb-4">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-xs">{{ __('Forgot Your Password?') }}</a>
        @endif
    </div>
    <div class="d-grid">
        <button type="submit" class="login-do-btn btn btn-primary btn-block btn-white-c f-w-600 mt-2" id="login_button" style="color: black; background-color: white;">{{__('Login')}}</button>
    </div>
    @if($settings['enable_signup'] == 'on')
    <p class="my-4 text-center">{{__("Don't have an account?")}} <a href="{{ route('register',!empty(\Auth::user()->lang)?\Auth::user()->lang:'en') }}" class="text-primary">{{__('Register')}}</a></p>
    @endif
</div>
{{Form::close()}}
@endsection
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $("#form_data").submit(function(e) {
            $("#login_button").attr("disabled", true);
            return true;
        });
    });
</script>
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 147px;
        height: 109px;
    }

    .input-container {
        display: flex;
        width: 100%;
        margin-bottom: 15px;
    }

    .icon {
        padding: 10px;
        background: dodgerblue;
        color: white;
        min-width: 50px;
        text-align: center;
    }
</style>