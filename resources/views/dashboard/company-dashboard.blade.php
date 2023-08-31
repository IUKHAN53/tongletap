@extends('layouts.admin')
@section('page-title','Company Dashboard')
@section('content')

    <style>
        .card-header {
            border-radius: 15px !important;
            background: linear-gradient(90deg, #FF0080 0%, #FF8C00 100%);
            box-shadow: 0px 6px 20px 0px rgba(253, 126, 48, 0.40);
        }
        .card-header h5 {
            color: #fff !important;
        }
        .card .card-header:not(.border-0) h5:after, .card .card-header:not(.border-0) .h5:after {
            content: none !important;
        }
    </style>
    <div class="row">
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-md-6  col-sm-12">
                    <div class="card w-100">
                        <div class="card-header">
                            <h5>Weekly Mental Health %</h5>
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
                        <div class="card-header">
                            <h5>Monthly Mental Health %</h5>
                        </div>
                        <div class="card-body p-4">
                            <div id="monthly_stats"></div>
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
        // Get the average scores from the controller
        const depressionPercentage = @json($depression_percentage);
        const anxietyPercentage = @json($anxiety_percentage);
        const stressPercentage = @json($stress_percentage);

        var optionsDepression = {
            chart: {
                height: 70,
                type: 'bar',
                stacked: true,
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '40%',
                    borderRadius: 15,
                    borderRadiusApplication: 'around',
                    colors: {
                        backgroundBarColors: ['#d8d0e8'],
                        backgroundBarRadius: 15
                    }
                },
            },
            colors: ['#FDBF18'],
            stroke: {
                width: 0,
            },
            series: [{
                name: 'Depression',
                data: [depressionPercentage]
            }],
            title: {
                floating: true,
                offsetX: -10,
                offsetY: -5,
                text: 'Depression',
                style: {
                    fontSize: '20px',
                    fontWeight: '2px',
                    color: '#FDBF18'
                },
            },
            subtitle: {
                floating: true,
                align: 'right',
                offsetY: 0,
                text: depressionPercentage + '%',
                style: {
                    fontSize: '20px',
                    color: '#FD7E30'
                }
            },
            tooltip: {
                enabled: false
            },
            xaxis: {
                categories: ['Depression'],
            },
            yaxis: {
                max: 100
            },
            fill: {
                type: 'gradient',
                gradient: {
                    inverseColors: false,
                    gradientToColors: ['#FD7E30']
                }
            },
        }

        var chartDepression = new ApexCharts(document.querySelector('#depression'), optionsDepression);
        chartDepression.render();


        var optionsAnxiety = {
            chart: {
                height: 70,
                type: 'bar',
                stacked: true,
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '40%',
                    borderRadius: 15,
                    colors: {
                        backgroundBarColors: ['#d8d0e8'],
                        backgroundBarRadius: 15
                    }
                },
            },
            colors: ['#b44bc9'],
            stroke: {
                width: 0,
            },
            series: [{
                name: 'Anxiety',
                data: [anxietyPercentage]
            }],
            title: {
                floating: true,
                offsetX: -10,
                offsetY: -5,
                text: 'Anxiety',
                style: {
                    fontSize: '20px',
                    fontWeight: '2px',
                    color: '#b44bc9'
                },
            },
            subtitle: {
                floating: true,
                align: 'right',
                offsetY: 0,
                text: anxietyPercentage + '%',
                style: {
                    fontSize: '20px',
                    color: '#fdb983'
                }
            },
            tooltip: {
                enabled: false
            },
            xaxis: {
                categories: ['Anxiety'],
            },
            yaxis: {
                max: 100
            },
            fill: {
                type: 'gradient',
                gradient: {
                    inverseColors: false,
                    gradientToColors: ['#fdb983']
                }
            },
        }

        var chartAnxiety = new ApexCharts(document.querySelector('#anxiety'), optionsAnxiety);
        chartAnxiety.render();


        var optionsStress = {
            chart: {
                height: 70,
                type: 'bar',
                stacked: true,
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '40%',
                    borderRadius: 15,
                    colors: {
                        backgroundBarColors: ['#d9cfec'],
                        backgroundBarRadius: 15
                    }
                },
            },
            colors: ['#1bd1fd'],
            stroke: {
                width: 0,
            },
            series: [{
                name: 'Stress',
                data: [stressPercentage]
            }],
            fill: {
                type: 'gradient',
                gradient: {
                    gradientToColors: ['#1bd1fd']
                }
            },
            title: {
                floating: true,
                offsetX: -10,
                offsetY: -5,
                text: 'Stress',
                style: {
                    fontSize: '20px',
                    fontWeight: '2px',
                    color: '#1bd1fd'
                },
            },
            subtitle: {
                floating: true,
                align: 'right',
                offsetY: 0,
                text: stressPercentage + '%',
                style: {
                    fontSize: '20px',
                    color: '#4e5eeb'
                }
            },
            tooltip: {
                enabled: false
            },
            xaxis: {
                categories: ['Stress'],
            },
            yaxis: {
                max: 100
            },
            fill: {
                type: 'gradient',
                gradient: {
                    inverseColors: false,
                    gradientToColors: ['#4e5eeb']
                }
            },
        }

        var chartStress = new ApexCharts(document.querySelector('#stress'), optionsStress);
        chartStress.render();

        var options = {
            series: [{
                data: [depressionPercentage, anxietyPercentage, stressPercentage]
            }],
            chart: {
                height: 290,
                type: 'bar',
            },
            colors: ['#FDBF18', '#b44bc9', '#1bd1fd'],
            plotOptions: {
                bar: {
                    columnWidth: '45%',
                    distributed: true,
                    dataLabels: {
                        position: 'top',
                    },
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    colors: ['#FDBF18', '#b44bc9', '#1bd1fd'],
                },
                offsetY: -40
            },
            legend: {
                show: false
            },
            xaxis: {
                categories: [
                    'Depression',
                    'Anxiety',
                    'Stress',
                ],
                labels: {
                    style: {
                        colors: ['#FD7E30', '#b44bc9', '#1bd1fd'],
                        fontSize: '12px'
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    type: "vertical",
                    inverseColors: true,
                    gradientToColors: ['#FD7E30', '#fdb983', '#4e5eeb']
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#monthly_stats"), options);
        chart.render();


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
                        return opts.w.globals.series[opts.seriesIndex];
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
                    height: 300
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