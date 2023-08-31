@extends('layouts.admin')
@section('page-title','Company Dashboard')
@section('content')

    <style>
        .card-header {
            border-radius: 15px !important;
            /*background: linear-gradient(90deg, #FF0080 0%, #FF8C00 100%);*/
            background: linear-gradient(135deg, #FDBF18 0%, #FD7E30 75.26%) !important;
            box-shadow: 0px 6px 20px 0px rgba(253, 126, 48, 0.40);
        }

        .card-header h5 {
            color: #fff !important;
            margin-top: 6px !important;
        }

        .card .card-header:not(.border-0) h5:after, .card .card-header:not(.border-0) .h5:after {
            content: none !important;
        }

        .date-input {
            width: 30%;
            height: 40px;
            border: 1px solid #d8d8d8;
            background-color: rgba(248, 248, 248, 0);
            border-radius: 5px;
            color: white;
            padding: 0 10px;
        }

        .select-input{
            width: 30%;
            height: 40px;
            border: 1px solid #d8d8d8;
            background-color: rgba(248, 248, 248, 0);
            border-radius: 5px;
            color: white;
            padding: 0 10px;
        }
    </style>
    <div class="row">
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-md-6  col-sm-12">
                    <div class="card w-100">
                        <div class="card-header" style="padding: 18px 18px !important;">
                            <div class="d-flex justify-content-between">
                                <h5>Weekly Mental Health %</h5>
                                <input class="form-control date-input week-select" type="week"
                                       value="{{now()->year .'-W'. now()->week()}}">
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="box mt-4">
                                <div class="m-4">
                                    <div id="depression"></div>
                                </div>
                                <div class="m-4">
                                    <div id="anxiety"></div>
                                </div>
                                <div class="m-4">
                                    <div id="stress"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12">
                    <div class="card w-100">
                        <div class="card-header" style="padding: 18px 18px !important;">
                            <div class="d-flex justify-content-between">
                                <h5>Monthly Mental Health %</h5>
                                <input class="form-control date-input month-select" type="month"
                                       value="{{now()->format('Y-m')}}">
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div id="monthly_stats"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-md-6  col-sm-12">
                    <div class="card w-100">
                        <div class="card-header" style="padding: 18px 18px !important;">
                            <div class="d-flex justify-content-between">
                                <h5>Yearly Mental Health %</h5>
                                <select id="date-select" class="select-input">
                                    @foreach (range(date('Y'), 1990) as $year)
                                        <option value="{{$year}}" {{$year==now()->year ?'selected':''}} style="{{$year!=now()->year ?'color:black':''}}">{{$year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div id="yearly_stats"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="card w-100">
                        <div class="card-header">
                            <h5>Staff (Total: {{$countTotal}})</h5>
                        </div>
                        <div class="card-body p-4">
                            <div id="users_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-md-6  col-sm-12">
                    <div class="card w-100">
                        <div class="card-header">
                            <h5>Counselling Hours (Total: {{$total_hours}})</h5>
                        </div>
                        <div class="card-body p-4">
                            <div id="hours_chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12">
                    <div class="card w-100">
                        <div class="card-header">
                            <h5>Requested Counsellors Summary</h5>
                        </div>
                        <div class="card-body p-6 d-flex gap-4 flex-wrap" style="min-height: 350px">
                            <div class="col-lg-3 col-md-6  col-sm-12">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mb-3 mb-sm-0">
                                        <div class="d-flex align-items-center">
                                            <div class="theme-avtar bg-success py-2 px-3 rounded">
                                                <i class="ti ti-cast text-white fw-bold fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="m-0">Total Requested</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="m-0">{{ $countTicket }}</h3>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mb-3 mb-sm-0">
                                        <div class="d-flex align-items-center">
                                            <div class="theme-avtar bg-primary py-2 px-3 rounded">
                                                <i class="ti ti-cast text-white fw-bold fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="m-0">Pending</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="m-0">{{ $countPendingTicket }}</h3>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mb-3 mb-sm-0">
                                        <div class="d-flex align-items-center">
                                            <div class="theme-avtar bg-info py-2 px-3 rounded">
                                                <i class="ti ti-cast text-white fw-bold fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="m-0">Approved</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="m-0">{{ $countApprovedTicket }}</h3>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mb-3 mb-sm-0">
                                        <div class="d-flex align-items-center">
                                            <div class="theme-avtar bg-danger py-2 px-3 rounded">
                                                <i class="ti ti-cast text-white fw-bold fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="m-0">Rejected</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="m-0">{{ $countRejectedTicket }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xxl-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('Events')}} (Total: {{count(json_decode($arrEvents))}})</h5>
                    </div>
                    <div class="card-body">
                        <div id='event_calendar' class='calendar'></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script>

        const user_id = @json(auth()->user()->id);

        const depressionPercentage = @json($depression_percentage);
        const anxietyPercentage = @json($anxiety_percentage);
        const stressPercentage = @json($stress_percentage);

        const m_depression_percentage = @json($m_depression_percentage);
        const m_anxiety_percentage = @json($m_anxiety_percentage);
        const m_stress_percentage = @json($m_stress_percentage);

        const y_depression_percentage = @json($y_depression_percentage);
        const y_anxiety_percentage = @json($y_anxiety_percentage);
        const y_stress_percentage = @json($y_stress_percentage);


        const arrEvents = @json($arrEvents);

        const totalHours = parseInt(@json($total_hours))
        const hoursUsed = parseInt(@json($used_hours))
        const hoursRemaining = parseInt(@json($remaining))

        const totalUsers = parseInt(@json($countTotal))
        const employees = parseInt(@json($countEmployee))
        const accountants = parseInt(@json($countAccountant))
    </script>
    <script src="{{asset('assets/js/emp_charts.js')}}"></script>
@endpush