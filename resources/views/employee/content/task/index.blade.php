@extends('layouts.employee')
@section('page-title')
    {{ucwords("Tasks")}}
@endsection

@push('css-page')
    <link rel="stylesheet" href="{{asset('css/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/dragula.min.css') }}" id="main-style-link">
@endpush
@push('script-page')
    <script src="{{asset('css/summernote/summernote-bs4.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/dragula.min.js') }}"></script>
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Task')}}</li>
@endsection
@section('action-btn')
    <div class="float-end">
        <a href="#" data-size="lg" data-url="{{ route('employee.tasks.create') }}"
           data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create Task')}}"
           class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <table id="tasksTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Priority</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $taskDetail)
                    <tr>
                        <td>
                            <span class="badge bg-{{\App\Models\ProjectTask::$priority_color[$taskDetail->priority]}}">{{ __(\App\Models\ProjectTask::$priority[$taskDetail->priority]) }}</span>
                        </td>
                        <td>{{$taskDetail->name}}</td>
                        <td>{{ $taskDetail->description }}</td>
                        <td>{{ Utility::getDateFormated($taskDetail->start_date) }}</td>
                        <td>@if(!empty($taskDetail->end_date) && $taskDetail->end_date != '0000-00-00')
                                {{ Utility::getDateFormated($taskDetail->end_date) }}
                            @endif</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button data-size="md" data-url="{{ route('employee.tasks.show',[$taskDetail->id]) }}"
                                   data-ajax-popup="true" class=" btn btn-sm btn-primary"
                                   data-bs-original-title="{{__('View')}}">
                                    <i class="ti ti-bookmark"></i>
                                    <span>{{__('View')}}</span>
                                </button>
                                <button data-size="lg"
                                   data-url="{{ route('employee.tasks.edit',[$taskDetail->id]) }}"
                                   data-ajax-popup="true" class=" btn btn-sm btn-info"
                                   data-bs-original-title="{{__('Edit ').$taskDetail->name}}">
                                    <i class="ti ti-pencil"></i>
                                    <span>{{__('Edit')}}</span>
                                </button>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['employee.tasks.destroy', [$taskDetail->id]]]) !!}
                                <button type="button" class="btn btn-sm btn-danger bs-pass-para">
                                    <i class="ti ti-archive"></i>
                                    <span> {{__('Delete')}} </span>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

