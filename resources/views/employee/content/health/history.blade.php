@extends('layouts.employee')
@section('page-title')
    {{__('Health History')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Health History')}}</li>
@endsection

@section('action-btn')
    <div class="float-end">
        <a href="http://mhc.tongle.space/" data-bs-toggle="tooltip" title="{{__('Track Health')}}" target="_blank"
           class="btn btn-sm custom-btn border-0 text-white px-3 py-2">
            <i class="ti ti-plus"></i>
        </a>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Depression Score') }}</th>
                                        <th>{{ __('Depression Status') }}</th>
                                        <th>{{ __('Anxiety Score') }}</th>
                                        <th>{{ __('Anxiety Status') }}</th>
                                        <th>{{ __('Stress Score') }}</th>
                                        <th>{{ __('Stress Status') }}</th>
                                        <th>{{ __('Taken On') }}</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($history as $stat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $stat->depressionScore }}</td>
                                            <td>{{ $stat->depressionStatus ?? 'N/A' }}</td>
                                            <td>{{ $stat->anxietyScore }}</td>
                                            <td>{{ $stat->anxietyStatus ?? 'N/A' }}</td>
                                            <td>{{ $stat->stressScore }}</td>
                                            <td>{{ $stat->stressStatus ?? 'N/A' }}</td>
                                            <td>{{ $stat->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $history->links() }}
                </div>
            </div>
        </div>

    </div>

@endsection