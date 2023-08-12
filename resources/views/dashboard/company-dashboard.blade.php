@extends('layouts.admin')
@section('page-title','Company Dashboard')
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card w-100">
                <div class="card-header">
                    <h5>Requested Counsellors Summary</h5>
                </div>
                <div class="card-body p-4 d-flex gap-3">
                    <div class="col-lg-3 col-md-6">
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
                    <div class="col-lg-3 col-md-6">
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
                    <div class="col-lg-3 col-md-6">
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
                    <div class="col-lg-3 col-md-6">
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
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <p class="mb-2 fs-3">Counselling Hours (Total: {{$total_hours}})</p>
                            <div id="hours_chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <p class="mb-2 fs-3">Staff (Total: {{$countTotal}})</p>
                            <div id="users_chart"></div>
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

        (function () {
            var calendar = new FullCalendar.Calendar(document.getElementById('event_calendar'), {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek,dayGridMonth'
                },
                buttonText: {
                    timeGridDay: "{{__('Day')}}",
                    timeGridWeek: "{{__('Week')}}",
                    dayGridMonth: "{{__('Month')}}"
                },
                themeSystem: 'bootstrap',
                slotDuration: '00:10:00',
                navLinks: true,
                droppable: true,
                selectable: true,
                selectMirror: true,
                editable: true,
                dayMaxEvents: true,
                handleWindowResize: true,
                events: {!! $arrEvents !!},
            });
            calendar.render();

            const totalHours = parseInt(@json($total_hours))
            const hoursUsed = parseInt(@json($used_hours))
            const hoursRemaining = parseInt(@json($remaining))

            var options = {
                series: [hoursUsed, hoursRemaining],
                chart: {
                    type: 'donut',
                    height: 350
                },
                labels: ['Hours Used', 'Hours Remaining'],
                dataLabels: {
                    enabled: true,
                    formatter: function (val, opts) {
                        return opts.w.globals.series[opts.seriesIndex] + " hours";
                    },
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " hours";
                        }
                    }
                },
                legend: {
                    show: true,
                    labels: {
                        useSeriesColors: true
                    }
                },
                colors: ['#3ec7d4', '#6ed742'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#hours_chart"), options);
            chart.render();


            const totalUsers = parseInt(@json($countTotal))
            const employees = parseInt(@json($countEmployee))
            const accountants = parseInt(@json($countAccountant))
            var options2 = {
                series: [employees, accountants], // Example data: 65 employees and 35 accountants
                chart: {
                    type: 'radialBar',
                    height: 350
                },
                colors: ['#3ec7d4', '#6ed742'],
                legend: {
                    show: true,
                    labels: {
                        useSeriesColors: true
                    }
                },
                plotOptions: {
                    radialBar: {
                        max: totalUsers,
                        dataLabels: {
                            name: {
                                fontSize: '22px',
                            },
                            value: {
                                fontSize: '16px',
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: function (w) {
                                    return totalUsers;
                                }
                            }
                        }
                    }
                },
                labels: ['Employees', 'Accountants'],
            };

            var chart2 = new ApexCharts(document.querySelector("#users_chart"), options2);
            chart2.render();

        })();
    </script>
@endpush