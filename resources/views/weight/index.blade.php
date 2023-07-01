@extends('layouts.admin')
@section('page-title')
{{__('Health Journey')}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
<li class="breadcrumb-item">{{__('Health Journey')}}</li>
@endsection

@section('action-btn')
<div class="float-end">
    <a href="#" data-url="{{ route('weight.create') }}" data-ajax-popup="true" data-title="{{__('Create weight')}}" data-bs-toggle="tooltip" title="{{__('Create')}}" class="btn btn-sm btn-primary">
        <i class="ti ti-plus"></i>
    </a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-3">
                @include('layouts.health_setup')
            </div>

            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>{{ __('Weight') }}</th>
                                        <!--<th>{{ __('COMPANY NAME') }}</th>-->
                                        <th>{{ __('EMPLOYEE NAME') }}</th>
                                        <th>{{ __('time_slot') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($weights as $weight)
                                    <tr>
                                        <td>{{ $weight->weight }}</td>
                                        <!--<td>{{ $weight->company_name }}</td>-->
                                        <td>{{ $weight->employee_name }}</td>
                                        <td>{{ $weight->datetime }}</td>
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