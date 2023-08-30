@extends('layouts.admin')
@push('script-page')
@endpush
@section('page-title')
{{__('Manage Ticket')}}
@endsection
@section('title')
<div class="d-inline-block">
    <h5 class="h4 d-inline-block font-weight-400 mb-0 ">{{__('Manage Ticket')}}</h5>
</div>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
<li class="breadcrumb-item">{{__('Manage Ticket')}}</li>
@endsection

@section('action-btn')
<div class="float-end">
    <!-- <a href="{{ route('support.grid') }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="{{__('Grid View')}}">
        <i class="ti ti-layout-grid text-white"></i>
    </a> -->

    <a href="#" data-url="{{ route('ticket.create') }}" data-ajax-popup="true" data-title="{{ __('Create New Ticket') }}" data-size="lg" data-bs-toggle="tooltip" title="" class="btn btn-sm btn-primary" data-bs-original-title="{{ __('Create') }}">
        <i class="ti ti-plus"></i>
    </a>

</div>
@endsection

@section('content')
<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                            <div class="theme-avtar bg-primary">
                                <i class="ti ti-cast"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="m-0">{{__('Ticket Request')}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto text-end">
                        <h3 class="m-0">{{ $countTicket }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                            <div class="theme-avtar bg-info">
                                <i class="ti ti-cast"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="m-0">{{__('Pending Ticket')}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto text-end">
                        <h3 class="m-0">{{ $countPendingTicket }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                            <div class="theme-avtar bg-warning">
                                <i class="ti ti-cast"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="m-0">{{__('Approved Ticket')}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto text-end">
                        <h3 class="m-0">{{ $countApprovedTicket }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                            <div class="theme-avtar bg-danger">
                                <i class="ti ti-cast"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="m-0">{{__('Rejected Ticket')}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto text-end">
                        <h3 class="m-0">{{ $countRejectedTicket }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Ticket Request Code') }}</th>
                                @if(\Auth::user()->type <> 'employee')
                                    <th>{{ __('Employee') }}</th>
                                    <th>{{ __('Company Name') }}</th>
                                    @endif
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('priority') }}</th>
                                    <th>{{ __('Appointment Time and Day') }}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                            </tr>
                        </thead>

                        <tbody class="list">

                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                    <span style="display: block;
                                            white-space: nowrap;
                                            width: 150px;
                                            overflow: hidden;
                                            text-overflow: ellipsis;">{{ $ticket->title }}</span>
                                </td>
                                <td>{{ $ticket->ticket_code }}</td>
                                @if(\Auth::user()->type <> 'employee')
                                    <!-- $user = \Auth::user()->getUser($ticket->employee_id); -->
                                    @php
                                    $user = \Auth::user();
                                    @endphp
                                    <td>{{ $ticket->employee->name ?? ''}}</td>
                                    <td>{{ $ticket->company_name }}</td>
                                    @endif
                                    <td>
                                        @if ($ticket->status == 'pending')
                                        <div class="badge bg-info p-2 rounded status-badde3">{{ __('Pending') }}</div>
                                        @elseif($ticket->status == 'approved')
                                        <div class="badge bg-warning p-2 rounded status-badde3">{{ __('Approved') }}</div>
                                        @elseif($ticket->status == 'rejected')
                                        <div class="badge bg-danger p-2 rounded status-badde3">{{ __('Rejected') }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $ticket->priority }}</td>
                                    <td>{{ date('M j, Y H:i', strtotime($ticket->time_slot)) }}</td>
                                    <td class="Action">
                                        @if (\Auth::user()->type == 'super admin')
                                        <div class="action-btn bg-warning ms-2">
                                            <a href="#" data-url="{{ URL::to('ticket/' . $ticket->id . '/edit-status') }}" data-ajax-popup="true" data-title="{{ __('Change Ticket Status') }}" data-size="lg" data-bs-toggle="tooltip" title="" class="mx-3 btn btn-sm align-items-center" data-bs-original-title="{{ __('Change Ticket Status') }}">
                                                <i class="ti ti-info-square text-white"></i>
                                            </a>
                                        </div>
                                        @endif
                                        <div class="action-btn bg-primary ms-2">
                                            <a href="{{ URL::to('ticket/' . $ticket->id . '/reply') }}" class="mx-3 btn btn-sm align-items-center" data-bs-toggle="tooltip" title="" data-title="{{ __('Reply') }}" data-bs-original-title="{{ __('Reply') }}">
                                                <i class="ti ti-arrow-back-up text-white"></i>
                                            </a>
                                        </div>

                                        <!-- @if (\Auth::user()->type == 'company' || $ticket->ticket_created == \Auth::user()->id)
                                                     below code
                                        @endif -->

                                        <div class="action-btn bg-info ms-2">
                                            <a href="#" data-url="{{ URL::to('ticket/' . $ticket->id . '/edit') }}" data-ajax-popup="true" data-title="{{ __('Edit Ticket') }}" data-size="lg" data-bs-toggle="tooltip" title="" class="mx-3 btn btn-sm align-items-center" data-bs-original-title="{{ __('Edit') }}">
                                                <i class="ti ti-pencil text-white"></i>
                                            </a>
                                        </div>
                                        <div class="action-btn bg-danger ms-2">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['ticket.destroy', $ticket->id], 'id' => 'delete-form-' . $ticket->id]) !!}
                                            <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" aria-label="Delete">
                                                <i class="ti ti-trash text-white"></i>
                                            </a>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection