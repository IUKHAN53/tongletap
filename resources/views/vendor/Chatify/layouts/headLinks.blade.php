<title>{{ config('chatify.name') }}</title>

{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="route" content="{{ $route }}">
<meta name="csrf-token" content="{{ csrf_token() }}">


<link href="{{ asset('ss/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('ss/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
{{--<link href="{{ asset('public/css/app.css') }}" rel="stylesheet" />--}}

{{-- Messenger Color Style--}}
@include('Chatify::layouts.messengerColor')
