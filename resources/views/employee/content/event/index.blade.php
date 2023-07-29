@extends('layouts.employee')

@section('page-title')
    {{__('Event')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Event')}}</li>
@endsection

@push('css-page')
    <style>
        .card-header h5{
            color: #fff !important;
        }
        .fc-header-toolbar .btn-group .btn {
            color: #fff !important;
            background: linear-gradient(135deg, #FD7E30 0%, #FDBF18 77.08%) !important;
            box-shadow: 0px 6px 12px 0px rgba(253, 126, 48, 0.40) !important;
            padding: 8px 12px !important;
            border-style: none !important;
        }
        .fc-h-event, .fc-today-button{
            color: #fff !important;
            background: linear-gradient(135deg, #FD7E30 0%, #FDBF18 77.08%) !important;
            box-shadow: 0px 6px 12px 0px rgba(253, 126, 48, 0.40) !important;
            padding: 4px;
            border-style: none !important;
        }
    </style>
@endpush

@section('action-btn')
    @if(\Auth::user()->type == 'super admin')
        <div class="float-end">
            <a href="#" data-size="lg" data-url="{{ route('event.create') }}" data-ajax-popup="true"
               data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create New Event')}}"
               class="btn btn-sm custom-btn border-0 text-white px-3 py-2">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Calendar') }}</h5>
                </div>
                <div class="card-body">
                    <div id='calendar' class='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">{{__('Current Month Event')}}</h6>
                    <ul class="event-cards list-group list-group-flush mt-3 w-100">
                        <li class="list-group-item card mb-3">
                            <div class="row align-items-center justify-content-between">
                                <div class=" align-items-center">
                                    @if(!$events->isEmpty())
                                        @forelse ($current_month_event as $event)
                                            <div class="card mb-3 border shadow-none">
                                                <div class="px-3">
                                                    <div class="row align-items-center">
                                                        <div class="col ml-n2">
                                                            <h5 class="text-sm mb-0 fc-event-title-container">
                                                                <a href="#" data-size="lg"
                                                                   data-url="{{ route('event.edit',$event->id) }}"
                                                                   data-ajax-popup="true"
                                                                   data-title="{{__('Edit Event')}}"
                                                                   class="fc-event-title text-primary">
                                                                    {{$event->title}}
                                                                </a>
                                                            </h5><br>
                                                            <p class="card-text small text-dark mt-0">
                                                                @role('super admin')
                                                                @if($event->company_id)
                                                                    {{__('Company')}} :
                                                                    {{ $event->company->name ?? ''}}<br>
                                                                @endif
                                                                @endrole
                                                                {{__('Start Date : ')}}
                                                                {{  \Auth::user()->dateFormat($event->start_date)}}<br>
                                                                {{__('End Date : ')}}
                                                                {{  \Auth::user()->dateFormat($event->end_date) }}
                                                            </p>

                                                        </div>
                                                        @if(Auth::user()->type == "super admin")
                                                            <div class="col-auto text-right">

                                                                <div class="action-btn bg-primary ms-2">
                                                                    <a href="#"
                                                                       data-url="{{ route('event.edit',$event->id) }}"
                                                                       data-title="{{__('Edit Event')}}"
                                                                       data-ajax-popup="true"
                                                                       class="mx-3 btn btn-sm  align-items-center"
                                                                       data-bs-toggle="tooltip" title="{{__('Edit')}}"
                                                                       data-original-title="{{__('Edit')}}"><i
                                                                                class="ti ti-pencil text-white"></i></a>
                                                                </div>

                                                                <div class="action-btn bg-danger ms-2">
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['event.destroy', $event->id],'id'=>'delete-form-'.$event->id]) !!}
                                                                    <a href="#"
                                                                       class="mx-3 btn btn-sm  align-items-center bs-pass-para"
                                                                       data-bs-toggle="tooltip" title="{{__('Delete')}}"
                                                                       data-original-title="{{__('Delete')}}"
                                                                       data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}"
                                                                       data-confirm-yes="document.getElementById('delete-form-{{$event->id}}').submit();"><i
                                                                                class="ti ti-trash text-white"></i></a>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="4">
                                                    <div class="text-center">
                                                        <h6>{{__('There is no event in this month')}}</h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    @else
                                        <div class="text-center">

                                        </div>
                                    @endif
                                </div>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>

            <div class="card testing">
                <div class="card-body">
                    <h4 class="mb-4">{{__('Expired Events')}}</h4>
                    <ul class="event-cards list-group list-group-flush mt-3 w-100">
                        <li class="list-group-item card mb-3">
                            <div class="row align-items-center justify-content-between">
                                <div class=" align-items-center">
                                    @if(!$events->isEmpty())
                                        @foreach($expired_events as $event)
                                            <div class="card mb-3 border shadow-none">
                                                <div class="px-3">
                                                    <div class="row align-items-center">
                                                        <div class="col ml-n2">
                                                            <h5 class="text-sm mb-0 fc-event-title-container">
                                                                <a href="#" data-size="lg"
                                                                   data-url="{{ route('event.edit',$event->id) }}"
                                                                   data-ajax-popup="true"
                                                                   data-title="{{__('Edit Event')}}"
                                                                   class="fc-event-title text-primary">
                                                                    {{$event->title}}
                                                                </a>
                                                            </h5><br>

                                                            <p class="card-text small text-dark mt-0">
                                                                @role('super admin')
                                                                @if($event->company_id)
                                                                    {{__('Company')}} :
                                                                    {{ $event->company->name ?? ''}}<br>
                                                                @endif
                                                                @endrole
                                                                {{__('Start Date : ')}}
                                                                {{ \Auth::user()->dateFormat($event->start_date)}}<br>
                                                                {{__('End Date : ')}}
                                                                {{ \Auth::user()->dateFormat($event->end_date) }}
                                                            </p>

                                                        </div>
                                                        @if(Auth::user()->type == "super admin")
                                                            <div class="col-auto text-right">
                                                                <div class="action-btn bg-primary ms-2">
                                                                    <a href="#"
                                                                       data-url="{{ route('event.edit',$event->id) }}"
                                                                       data-title="{{__('Edit Event')}}"
                                                                       data-ajax-popup="true"
                                                                       class="mx-3 btn btn-sm  align-items-center"
                                                                       data-bs-toggle="tooltip" title="{{__('Edit')}}"
                                                                       data-original-title="{{__('Edit')}}"><i
                                                                                class="ti ti-pencil text-white"></i></a>
                                                                </div>
                                                                <div class="action-btn bg-danger ms-2">
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['event.destroy', $event->id],'id'=>'delete-form-'.$event->id]) !!}
                                                                    <a href="#"
                                                                       class="mx-3 btn btn-sm  align-items-center bs-pass-para"
                                                                       data-bs-toggle="tooltip" title="{{__('Delete')}}"
                                                                       data-original-title="{{__('Delete')}}"
                                                                       data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}"
                                                                       data-confirm-yes="document.getElementById('delete-form-{{$event->id}}').submit();"><i
                                                                                class="ti ti-trash text-white"></i></a>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center"></div>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script-page')
    <script src="{{ asset('assets/js/plugins/main.min.js') }}"></script>
    <script type="text/javascript">
        (function () {
            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
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
        })();
    </script>
@endpush