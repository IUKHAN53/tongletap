@php
    $companyName = request()->query('company_name', '');
    $employeeName = request()->query('employee_name', '');
@endphp
<div class="card sticky-top" style="top:30px">
    <div class="list-group list-group-flush" id="useradd-sidenav">
        <a href="{{route('health.index', ['company_name' => $companyName, 'employee_name' => $employeeName])}}" class="list-group-item list-group-item-action border-0 {{ (Request::route()->getName() == 'health.index' ) ? ' active' : '' }}">{{__('Blood Pressure')}} <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

        <a href="{{ route('glucose.index', ['company_name' => $companyName, 'employee_name' => $employeeName]) }}" class="list-group-item list-group-item-action border-0 {{ (Request::route()->getName() == 'glucose.index' ) ? ' active' : '' }}">{{__('Glucose')}}<div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

        <a href="{{ route('exercise.index', ['company_name' => $companyName, 'employee_name' => $employeeName]) }}" class="list-group-item list-group-item-action border-0 {{ (Request::route()->getName() == 'exercise.index' ) ? ' active' : '' }}">{{__('Exercise')}}<div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

        <a href="{{ route('weight.index', ['company_name' => $companyName, 'employee_name' => $employeeName]) }}" class="list-group-item list-group-item-action border-0 {{ (Request::route()->getName() == 'weight.index' ) ? ' active' : '' }}">{{__('Weight')}}<div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

        <a href="{{ route('sleep.index', ['company_name' => $companyName, 'employee_name' => $employeeName]) }}" class="list-group-item list-group-item-action border-0 {{ (Request::route()->getName() == 'sleep.index' ) ? ' active' : '' }}">{{__('Sleep')}}<div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
    </div>
</div>
