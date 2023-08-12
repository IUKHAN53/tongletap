@extends('layouts.admin')
@section('page-title')
    {{__('Time Module')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Time Module')}}</li>
@endsection
@can('manage time module')
    @if(\Auth::user()->type == 'super admin')
        @section('action-btn')
            <div class="float-end">
                <a href="#" data-url="{{ route('timemodule.create') }}" data-ajax-popup="true"
                   data-title="{{__('Create Timemodule')}}" data-bs-toggle="tooltip" title="{{__('Create')}}"
                   class="btn btn-sm btn-primary">
                    <i class="ti ti-plus"></i>
                </a>
            </div>
        @endsection
    @endif
@endcan

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{ __('Company Name') }}</th>
                                <th>{{ __('Total Hours Purchase') }}</th>
                                <th>{{ __('Total Hours Used') }}</th>
                                <th>{{ __('Remaining Hours') }}</th>
                                <th>{{ __('Time Slot') }}</th>
                                @if(Auth::user()->type == 'super admin')
                                    <th>{{ __('Action')}}</th>
                                @endif
                            </tr>
                            </thead>

                            <tbody class="list">
                            @if(\Auth::user()->type == 'super admin')
                                @foreach ($timemodules as $timemodule)
                                    <tr>

                                        <td>{{ $timemodule->company_name }}</td>
                                        <td>{{ $timemodule->total_hours_purchase }}</td>
                                        <td>{{ $timemodule->total_hours_used }}</td>
                                        <td>{{ $timemodule->remaining_hours }}</td>
                                        <td>{{ $timemodule->datetime }}</td>
                                        <td>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="#"
                                                   data-url="{{ URL::to('timemodule/' . $timemodule->id . '/edit') }}"
                                                   data-ajax-popup="true" data-title="{{ __('Edit Time Module') }}"
                                                   data-size="lg" data-bs-toggle="tooltip" title=""
                                                   class="mx-3 btn btn-sm align-items-center"
                                                   data-bs-original-title="{{ __('Edit') }}">
                                                    <i class="ti ti-pencil text-white"></i>
                                                </a>
                                            </div>
                                            <div class="action-btn bg-danger ms-2">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['timemodule.destroy', $timemodule->id], 'id' => 'delete-form-' . $timemodule->id]) !!}
                                                <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para"
                                                   data-bs-toggle="tooltip" title="" data-bs-original-title="Delete"
                                                   aria-label="Delete">
                                                    <i class="ti ti-trash text-white"></i>
                                                </a>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach ($clientdatas as $clientdata)
                                    <tr>
                                        <td>{{ $clientdata->company_name }}</td>
                                        <td>{{ $clientdata->total_hours_purchase }}</td>
                                        <td>{{ $clientdata->total_hours_used }}</td>
                                        <td>{{ $clientdata->remaining_hours }}</td>
                                        <td>{{ $clientdata->datetime }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection