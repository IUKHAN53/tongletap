@extends('layouts.employee')

@section('page-title')
    {{ __('Ticket Reply') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('employee.ticket.index') }}">{{ __('Ticket') }}</a></li>
    <li class="breadcrumb-item">{{ __('Ticket Reply') }}</li>
@endsection

@section('content')
    <div class="row">
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