@extends('layouts.admin')
@section('page-title','Company Dashboard')
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-md-6  col-sm-12">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <div id="health_chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <div class="card w-100">
                                <div class="card-header">
                                    <h5>Requested Counsellors Summary</h5>
                                </div>
                                <div class="card-body p-4 d-flex gap-3 flex-wrap" style="min-height: 270px">
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
            </div>
        </div>
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-md-6  col-sm-12">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <p class="mb-2 fs-3">Counselling Hours (Total: {{$total_hours}})</p>
                            <div id="hours_chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
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
        const depressionAvg = @json($depression_avg);
        const anxietyAvg = @json($anxiety_avg);
        const stressAvg = @json($stress_avg);

        // Function to determine color and status based on value and ranges
        const determineStatusAndColor = (value, ranges) => {
            for (const range of ranges) {
                if (value >= range.from && value <= range.to) {
                    return range.color;
                }
            }
            return '#000';  // Default color for N/A
        };

        // Define the ranges and colors for each category
        const depressionRanges = [
            {from: 0, to: 4, color: '#81c984'},
            {from: 5, to: 6, color: '#fbbe18'},
            {from: 7, to: 10, color: '#fb822e'},
            {from: 11, to: 13, color: '#c34b20'},
            {from: 14, to: Infinity, color: '#b61f1c'}
        ];

        const anxietyRanges = [
            {from: 0, to: 3, color: '#81c984'},
            {from: 4, to: 5, color: '#fbbe18'},
            {from: 6, to: 7, color: '#fb822e'},
            {from: 8, to: 9, color: '#c34b20'},
            {from: 10, to: Infinity, color: '#b61f1c'}
        ];

        const stressRanges = [
            {from: 0, to: 7, color: '#81c984'},
            {from: 8, to: 9, color: '#fbbe18'},
            {from: 10, to: 12, color: '#fb822e'},
            {from: 13, to: 16, color: '#c34b20'},
            {from: 17, to: Infinity, color: '#b61f1c'}
        ];

        // Determine colors based on the stat values
        const depressionColor = determineStatusAndColor(depressionAvg, depressionRanges);
        const anxietyColor = determineStatusAndColor(anxietyAvg, anxietyRanges);
        const stressColor = determineStatusAndColor(stressAvg, stressRanges);

        console.log(depressionColor, anxietyColor, stressColor)
        // ApexCharts options
        const options = {
            series: [{
                name: 'Average Score',
                data: [
                    {
                        x: 'Depression',
                        y: depressionAvg,
                        fillColor: depressionColor
                    },
                    {
                        x: 'Anxiety',
                        y: anxietyAvg,
                        fillColor: anxietyColor
                    },
                    {
                        x: 'Stress',
                        y: stressAvg,
                        fillColor: stressColor
                    }
                ],
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false
                }
            },
            title: {
                text: 'Average Scores for Depression, Anxiety, and Stress',
                align: 'center'
            }
        };
        const chart = new ApexCharts(document.querySelector("#health_chart"), options);
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