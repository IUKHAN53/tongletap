@extends('layouts.admin')
@section('page-title')
{{__('List of Companies')}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
<li class="breadcrumb-item">{{__('List of companies')}}</li>
@endsection


@section('content')
<div class="row">
    <div class="col-sm-12">
    {{ Form::open(array('url' => 'health', 'method' => 'GET')) }}
        <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('company_name', __('Company Name'), ['class' => 'col-form-label']) }}
                {{ Form::select('company_name', $companyname, null, ['class' => 'form-control select2 company_name','placeholder' => __('Select Company')]) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('employee_name', __('employee Name'), ['class' => 'col-form-label']) }}
                {{ Form::select('employee_name', $employees, null, ['class' => 'form-control select2 employee_name','placeholder' => __('Select employee')]) }}
            </div>
        </div>
    </div>
    <input type="submit" value="{{__('Search')}}" class="btn  btn-primary">
    {{ Form::close() }}
        </div>
    </div>
</div>
@endsection