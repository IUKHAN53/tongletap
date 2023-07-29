@extends('layouts.employee')
@section('page-title')
{{__('Health Journey')}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
<li class="breadcrumb-item">{{__('Health Journey')}}</li>
@endsection

@section('action-btn')
<div class="float-end">
    <a data-url="{{ route('employee.bp.create') }}" data-ajax-popup="true" data-title="{{__('Create blood pressure')}}" data-bs-toggle="tooltip" title="{{__('Create')}}" class="btn btn-sm custom-btn border-0 text-white px-3 py-2">
        <i class="ti ti-plus"></i>
    </a>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-3">
                @include('employee.content.health.health_setup')
            </div>

            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>{{ __('SYS') }}</th>
                                        <th>{{ __('DIA') }}</th>
                                        <!--<th>{{ __('COMPANY NAME') }}</th>-->
                                        <th>{{ __('EMPLOYEE NAME') }}</th>
                                        <th>{{ __('time_slot') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($bloodPressures as $bloodPressure)
                                    <tr>
                                        <td>{{ $bloodPressure->sys }}</td>
                                        <td>{{ $bloodPressure->dia }}</td>
                                        <!--<td>{{ $bloodPressure->company_name }}</td>-->
                                        <td>{{ $bloodPressure->employee_name }}</td>
                                        <td>{{ $bloodPressure->datetime }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection