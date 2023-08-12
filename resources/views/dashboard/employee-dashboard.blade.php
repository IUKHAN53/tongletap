@extends('layouts.employee')
@push('css-page')
    <style>
        .card-header h5 {
            color: #fff !important;
        }

        .fc-h-event, .custom-btn {
            color: #fff !important;
            background: linear-gradient(135deg, #FD7E30 0%, #FDBF18 77.08%) !important;
            box-shadow: 0px 6px 12px 0px rgba(253, 126, 48, 0.40) !important;
            padding: 4px;
            border-style: none !important;
        }

        .fc-toolbar-chunk .btn-group button {
            border-radius: 100px !important;
            background: #F6F6F6 !important;
            border: none !important;
            color: black;
        }

        .fc-toolbar-chunk .btn-group .active {
            border-radius: 100px !important;
            background: linear-gradient(135deg, #FDBF18 0%, #FD7E30 75.26%) !important;
            box-shadow: 0px 5px 10px 0px rgba(253, 126, 48, 0.35) !important;
            border: none !important;
            color: white !important;
        }
    </style>
@endpush
@section('content')
    <div style="scale: 96%">
        <div class="row">
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="row w-100">
                    <div class="col-md-6">
                        <div class="card w-100">
                            <div class="card-header shadow">
                                <div class="card-title text-white fw-bold">Stress</div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div id="stressChart" style="width: 100%; height: 200px"></div>
                                    <div class="stress-indicator w-100 px-4 py-2 d-flex justify-content-center align-items-center">
                                        <p class="m-0">{{$stats['stress']['status']}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header shadow">
                                <div class="card-title text-white fw-bold">Anxiety</div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div id="anxiety-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="min-height: 600px">
                            <div class="card-header shadow d-flex justify-content-between align-items-center">
                                <div class="card-title text-white fw-bold">Depression</div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div id="depression-chart"></div>
                                </div>
                                <div class="stress-indicator w-100 px-4 py-2 d-flex justify-content-center align-items-center mt-4">
                                    <p class="m-0">{{$stats['depression']['status']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="max-height: 600px">
                            <div class="card-header shadow">
                                <div class="card-title text-white fw-bold">Booked Schedule</div>
                            </div>
                            <div class="card-body">
                                <div id="booking_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card w-100">
                    <div class="position-relative">
                        <img src="{{asset('assets/emp/images/svgs/card-header.svg')}}" class="w-100" alt="">
                        <div class="circle position-absolute avatar-div shadow">
                            <img width="120" height="120"
                                 src="{{auth()->user()->image}}"
                                 alt="Avatar">
                        </div>
                    </div>
                    <div class="card-body mt-5">
                        <div class="d-flex justify-content-center align-items-center flex-column my-3">
                            <h2 class="fw-bold">{{auth()->user()->name}}</h2>
                            <p class="fw-bold">{{auth()->user()->designation}}</p>
                        </div>

                        <div class="d-flex just-content-between align-items-center gap-3 flex-column flex-sm-row">
                            <div class="card w-100">
                                <div class="sleep-card" style="max-height: 80px">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-white">Sleep</div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M6.352 1.14533C6.42208 1.21539 6.46977 1.3047 6.48899 1.40191C6.50822 1.49912 6.49813 1.59986 6.46 1.69133C6.15522 2.4228 5.99885 3.20756 6 3.99999C6 5.59129 6.63214 7.11741 7.75736 8.24263C8.88258 9.36785 10.4087 9.99999 12 9.99999C12.7924 10.0011 13.5772 9.84478 14.3087 9.53999C14.4001 9.50192 14.5007 9.49185 14.5978 9.51105C14.695 9.53025 14.7842 9.57785 14.8543 9.64783C14.9243 9.7178 14.972 9.807 14.9913 9.90411C15.0106 10.0012 15.0006 10.1019 14.9627 10.1933C14.4307 11.4688 13.5332 12.5584 12.3831 13.3247C11.2331 14.0911 9.88199 14.5 8.5 14.5C4.634 14.5 1.5 11.366 1.5 7.49999C1.5 4.58799 3.278 2.09199 5.80667 1.03733C5.89805 0.999339 5.99865 0.989324 6.09573 1.00855C6.1928 1.02778 6.28199 1.07538 6.352 1.14533Z"
                                                      fill="white"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="text-white mt-3">{{auth()->user()->sleepHours()}} hours</span>
                                </div>
                            </div>
                            <div class="card w-100">
                                <div class="activity-card" style="max-height: 80px">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-white">Activity</div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.7433 1.06333C9.84092 1.11766 9.91752 1.20312 9.9609 1.30607C10.0043 1.40901 10.0119 1.52353 9.98264 1.63133L8.65464 6.5H13.5C13.5974 6.5 13.6927 6.52848 13.7742 6.58193C13.8557 6.63538 13.9198 6.71147 13.9586 6.80085C13.9974 6.89022 14.0092 6.989 13.9927 7.08502C13.9761 7.18104 13.9318 7.27013 13.8653 7.34133L6.8653 14.8413C6.78906 14.9232 6.68757 14.9771 6.57705 14.9945C6.46654 15.0119 6.35339 14.9917 6.25571 14.9372C6.15803 14.8826 6.08145 14.7969 6.03823 14.6937C5.99501 14.5906 5.98764 14.4759 6.0173 14.368L7.3453 9.5H2.49997C2.40253 9.49999 2.30721 9.47151 2.22574 9.41806C2.14426 9.36462 2.08018 9.28853 2.04137 9.19915C2.00256 9.10977 1.99071 9.011 2.00728 8.91498C2.02385 8.81895 2.06812 8.72987 2.13464 8.65866L9.13464 1.15866C9.21088 1.07709 9.31223 1.02339 9.42254 1.00611C9.53285 0.988837 9.64577 1.00898 9.7433 1.06333Z"
                                                      fill="white"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="text-white mt-3">{{auth()->user()->activity}} hours</span>
                                </div>
                            </div>
                        </div>

                        <div class="mood-div">
                            <h4 class="fw-bolder">Your mood today</h4>
                            <div class="d-flex align-items-center my-4 ">
                                {!! auth()->user()->getMoodDiv() !!}
                            </div>
                        </div>

                        <div class="my-5">
                            <ul class="list-unstyled info-list">
                                <li class="d-flex justify-content-start gap-2 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none">
                                        <path d="M11.9999 13.43C12.4096 13.43 12.8153 13.3493 13.1939 13.1925C13.5724 13.0357 13.9163 12.8059 14.2061 12.5162C14.4958 12.2265 14.7256 11.8825 14.8824 11.504C15.0392 11.1254 15.1199 10.7197 15.1199 10.31C15.1199 9.90028 15.0392 9.49457 14.8824 9.11603C14.7256 8.73749 14.4958 8.39355 14.2061 8.10383C13.9163 7.81411 13.5724 7.58429 13.1939 7.4275C12.8153 7.2707 12.4096 7.19 11.9999 7.19C11.1724 7.19 10.3788 7.51872 9.79371 8.10383C9.2086 8.68894 8.87988 9.48253 8.87988 10.31C8.87988 11.1375 9.2086 11.9311 9.79371 12.5162C10.3788 13.1013 11.1724 13.43 11.9999 13.43Z"
                                              stroke="#4D5558" stroke-width="1.5"/>
                                        <path d="M3.61995 8.49C5.58995 -0.169998 18.42 -0.159997 20.38 8.5C21.53 13.58 18.37 17.88 15.6 20.54C14.632 21.4735 13.3397 21.9952 11.995 21.9952C10.6502 21.9952 9.35788 21.4735 8.38995 20.54C5.62995 17.88 2.46995 13.57 3.61995 8.49Z"
                                              stroke="#4D5558" stroke-width="1.5"/>
                                    </svg>
                                    <span>{{auth()->user()->location}}</span>
                                </li>
                                <li class="d-flex justify-content-start gap-2 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none">
                                        <path d="M13.5 10H17M7 15.5H17M7.5 4H16.5C17.12 4 17.67 4.02 18.16 4.09C20.79 4.38 21.5 5.62 21.5 9V15C21.5 18.38 20.79 19.62 18.16 19.91C17.67 19.98 17.12 20 16.5 20H7.5C6.88 20 6.33 19.98 5.84 19.91C3.21 19.62 2.5 18.38 2.5 15V9C2.5 5.62 3.21 4.38 5.84 4.09C6.33 4.02 6.88 4 7.5 4Z"
                                              stroke="#4D5558" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M10.095 10H10.104M7.09497 10H7.10397" stroke="#4D5558"
                                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Since {{\Carbon\Carbon::parse(auth()->user()->created_at)->format('M Y')}}</span>
                                </li>
                            </ul>
                        </div>

                        <div class="biography-div mb-5">
                            <h4 class="fw-bolder">Biography</h4>
                            <p class="my-4">
                                {{auth()->user()->biography}}
                            </p>
                        </div>
                        <a href="{{route('employee.ticket.index')}}" class="btn custom-btn w-100 border-0 py-3 text-white">Schedule
                            Meeting</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header shadow">
                        <div class="card-title text-white fw-bold">Upcoming Workshop & Mental Health Day</div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div id="events_calender"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script src="{{ asset('assets/js/plugins/main.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script type="text/javascript">
        (function () {
                var calendar = new FullCalendar.Calendar(document.getElementById('events_calender'), {
                    headerToolbar: {
                        left: 'prev,next',
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
                    navLinks: false,
                    droppable: true,
                    selectable: true,
                    selectMirror: true,
                    editable: false,
                    dayMaxEvents: true,
                    handleWindowResize: true,
                    events: {!! $arrEvents !!},
                    eventClick: function (calEvent, jsEvent, view) {
                        calEvent.preventDefault();
                        jsEvent.preventDefault();
                        return false;
                    },
                    viewDidMount: function () {
                        $('.fc-scrollgrid').removeClass('table-bordered')
                    }
                });
                calendar.render();
                $('.fc-header-toolbar').addClass('flex-column flex-sm-row')

                //     booking calendar
                var booking_calendar = new FullCalendar.Calendar(document.getElementById('booking_calendar'), {
                    height: 500,
                    displayEventTime : false,
                    headerToolbar: {
                        left: 'title',
                        right: 'prev,next'
                    },
                    themeSystem: 'bootstrap',
                    navLinks: false,
                    handleWindowResize: true,
                    events: {!! $bookings !!},
                    eventClick: function (calEvent, jsEvent, view) {
                        calEvent.preventDefault();
                        jsEvent.preventDefault();
                        return false;
                    },
                    viewDidMount: function () {
                        $('.fc-scrollgrid').removeClass('table-bordered')
                    }
                });
                booking_calendar.render();

            }
        )();

        $(document).ready(function () {

            // Anxiety Chart
            const anxietyChartOption = {
                series: [{{$stats['anxiety']['percentage']}}],
                chart: {
                    height: 275,
                    type: 'radialBar',
                },
                colors: ['#FF8C00'],  // Starting color
                plotOptions: {
                    radialBar: {
                        startAngle: 0,
                        endAngle: 360,
                        hollow: {
                            margin: 0,
                            size: '70%',
                            imageOffsetX: 0,
                            imageOffsetY: 0,
                            position: 'front',
                        },
                        track: {
                            background: 'rgb(246,246,246)',
                            strokeWidth: '50%',
                        },
                        dataLabels: {
                            showOn: 'always',
                            name: {
                                offsetY: -10,
                                show: true,
                                color: '#888',
                                fontSize: '17px'
                            },
                            value: {
                                formatter: function (val) {
                                    return parseInt(val) + '%';
                                },
                                color: '#111',
                                fontSize: '35px',
                                show: true,
                                fontWeight: '600'
                            }
                        }
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: 'horizontal',
                        shadeIntensity: 0.5,
                        gradientToColors: ['#9b5300'],
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100]
                    }
                },
                stroke: {
                    lineCap: 'round'
                },
                labels: ['{{$stats['anxiety']['status']}}'],
            };

            const anxietyChart = new ApexCharts(document.querySelector("#anxiety-chart"), anxietyChartOption);
            anxietyChart.render();


            // Stress Chart
            var root = am5.Root.new("stressChart");
            root._logo.dispose()
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            var chart = root.container.children.push(am5radar.RadarChart.new(root, {
                panX: false,
                panY: false,
                startAngle: 160,
                endAngle: 380
            }));

            var axisRenderer = am5radar.AxisRendererCircular.new(root, {
                innerRadius: 50,
                minGridDistance: false,
            });

            var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0,
                min: 0,
                max: 100,
                strictMinMax: true,
                renderer: axisRenderer
            }));
            var axisDataItem = xAxis.makeDataItem({});

            var clockHand = am5radar.ClockHand.new(root, {
                pinRadius: am5.percent(20),
                radius: am5.percent(40),
                bottomWidth: 10,
            })

            var bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(root, {
                sprite: clockHand
            }));

            xAxis.createAxisRange(axisDataItem);

            axisDataItem.set("value", {{$stats['stress']['percentage']}});
            bullet.get("sprite").on("rotation", function () {
                var value = axisDataItem.get("value");
                var fill = am5.color(0x000000);
                xAxis.axisRanges.each(function (axisRange) {
                    if (value >= axisRange.get("value") && value <= axisRange.get("endValue")) {
                        fill = axisRange.get("axisFill").get("fill");
                    }
                })

                // label.set("text", Math.round(value).toString());

                clockHand.pin.animate({key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic)})
                clockHand.hand.animate({key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic)})
            });

            chart.bulletsContainer.set("mask", undefined);

            var bandsData = [{
                color: "#81c984",
                lowScore: 0,
                highScore: 20,
                title: `Healthy`,
                icon: `{{asset('assets/emp/images/svgs/chart/outline/happy-80.svg')}}`
            }, {
                color: "#fbbe18",
                lowScore: 20,
                highScore: 40,
                title: `Mild`,
                icon: `{{asset('assets/emp/images/svgs/chart/outline/happy-60.svg')}}`
            }, {
                color: "#fb822e",
                lowScore: 40,
                highScore: 60,
                title: `Moderate`,
                icon: `{{asset('assets/emp/images/svgs/chart/outline/happy-40.svg')}}`
            }, {
                color: "#c34b20",
                lowScore: 60,
                highScore: 80,
                title: `Unhealthy`,
                icon: `{{asset('assets/emp/images/svgs/chart/outline/happy-20.svg')}}`
            }, {
                color: "#b61f1c",
                lowScore: 80,
                highScore: 100,
                title: `Concerning`,
                icon: `{{asset('assets/emp/images/svgs/chart/outline/happy-0.svg')}}`
            }];

            am5.array.each(bandsData, function (data) {
                var axisRange = xAxis.createAxisRange(xAxis.makeDataItem({}));

                axisRange.setAll({
                    value: data.lowScore,
                    endValue: data.highScore
                });

                axisRange.get("axisFill").setAll({
                    visible: true,
                    fill: am5.color(data.color),
                    fillOpacity: 0.8
                });

                axisRange.get("label").setAll({
                    text: data.title,
                    inside: false,
                    radius: 15,
                    fontSize: "0.9em",
                    fontWeight: "bold",
                });
            });
            chart.appear(1000, 100);


            // Depression Chart finalized
            const depressionChartOptions = {
                series: [{{$stats['depression']['percentage']}}],
                chart: {
                    height: 350,
                    type: 'radialBar',
                    offsetY: -10
                },
                colors: [
                    '{{$stats['depression']['color']}}',
                ],
                plotOptions: {
                    radialBar: {
                        startAngle: -135,
                        endAngle: 135,
                        dataLabels: {
                            name: {
                                fontSize: '16px',
                                color: undefined,
                                offsetY: 120
                            },
                            value: {
                                offsetY: 76,
                                fontSize: '22px',
                                color: undefined,
                                formatter: function (val) {
                                    return val + "%";
                                }
                            }
                        }
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        shadeIntensity: 0.15,
                        gradientToColors: ['#9b5300'],
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 50, 65, 91]
                    },
                },
                stroke: {
                    dashArray: 4
                },
                labels: ['{{$stats['depression']['status']}}'],
            };
            var depressionChart = new ApexCharts(document.querySelector("#depression-chart"), depressionChartOptions);
            depressionChart.render();
        });
    </script>
@endpush