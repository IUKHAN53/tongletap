@extends('layouts.admin')

@section('page-title')
{{ __('Ticket Reply') }}
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ url('ticket') }}">{{ __('Ticket') }}</a></li>
<li class="breadcrumb-item">{{ __('Ticket Reply') }}</li>
@endsection

@section('content')
<div class="row">
    @if (\Auth::user()->type == 'super admin')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5> {{ __('Support Reply') }}</h5>
            </div>
            {{ Form::open(['url' => 'ticket/changereply', 'method' => 'post']) }}
            <li class="list-group-item border-0 d-flex align-items-center">
                {{-- <div class="avatar me-3">
                        @if (Auth::user()->avatar == '')
                            <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="kal" class="img-user">
                @endif
        </div> --}}
        <input type="hidden" value="{{ $ticket->id }}" name="ticket_id">
        <div class="form-group mb-0 form-send w-100">
            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Ticket Reply')]) }}
            <button class="btn btn-send btn-secondary rounded-0" type="submit"><i class="f-16 text-primary ti ti-brand-telegram"></i></button>
        </div>
        </li>
        {{ Form::close() }}
    </div>
</div>
@endif
<div class="col-md-6">
    @forelse ($ticketreply as $reply)
    <div class="card">
        <ul class="list-group team-msg">
            <div class="card-header d-flex justify-content-between">
                <span>{{ $reply->created_at->diffForHumans() }}</span>
            </div>
            <div class="card-body">
                <p>{{ $reply->description }} </p>
            </div>

        </ul>
    </div>
    @empty
    <p>No replies...</p>
    @endforelse
</div>
</div>
@endsection