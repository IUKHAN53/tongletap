<style>
    .list-group .active {
        color: #fff !important;
        background: linear-gradient(135deg, #FD7E30 0%, #FDBF18 77.08%) !important;
        box-shadow: 0px 6px 12px 0px rgba(253, 126, 48, 0.40) !important;
    }
</style>

<div class="card sticky-top" style="top:30px">
    <div class="list-group list-group-flush" id="useradd-sidenav">
        <a href="{{route('employee.health')}}" class="list-group-item py-3 list-group-item-action border-0  {{ (Request::route()->getName() == 'employee.health' ) ? ' active' : '' }}">{{__('Blood Pressure')}} <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

        <a href="{{ route('employee.glucose') }}" class="list-group-item py-3 list-group-item-action border-0 {{ (Request::route()->getName() == 'employee.glucose' ) ? ' active' : '' }}">{{__('Glucose')}}<div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

        <a href="{{ route('employee.exercise') }}" class="list-group-item py-3 list-group-item-action border-0 {{ (Request::route()->getName() == 'employee.exercise' ) ? ' active' : '' }}">{{__('Exercise')}}<div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

        <a href="{{ route('employee.weight') }}" class="list-group-item py-3 list-group-item-action border-0 {{ (Request::route()->getName() == 'employee.weight' ) ? ' active' : '' }}">{{__('Weight')}}<div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

        <a href="{{ route('employee.sleep') }}" class="list-group-item py-3 list-group-item-action border-0 {{ (Request::route()->getName() == 'employee.sleep' ) ? ' active' : '' }}">{{__('Sleep')}}<div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
    </div>
</div>
