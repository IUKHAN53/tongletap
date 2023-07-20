{{ Form::open(['url' => 'ticket', 'method' => 'post']) }}
<div class="modal-body">

    <div class="row">
            <div class="form-group">
                {{ Form::label('title', __('Subject'), ['class' => 'col-form-label']) }}
                {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Ticket Subject')]) }}
            </div>

        <!--    <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">-->
        <!--    <div class="form-group">-->
        <!--        {{ Form::label('CompanyName', __('Company Name'), ['class' => 'col-form-label']) }}-->
        <!--        {{ Form::select('CompanyName', $company, null,['class' => 'form-control select2 company_name', 'placeholder' => __('Company Name')]) }}-->
        <!--    </div>-->
        <!--</div>-->
    </div>

    @if (\Auth::user()->type != 'employee')
    <div class="row">
        <!--<div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">-->
        <!--    <div class="form-group">-->
        <!--        {{ Form::label('employee_id', __('Ticket for Employee'), ['class' => 'col-form-label']) }}-->
        <!--        {{ Form::select('employee_id', $employees, null, ['class' => 'form-control select2 employee_id','placeholder' => __('Select Employee')]) }}-->
        <!--    </div>-->
        <!--</div>-->
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{ Form::label('time_slot', __('Appointment Time and Day'), ['class' => 'col-form-label']) }}
                <input type="datetime-local" class="form-control" name="time_slot" id="datetimepicker">
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{ Form::label('EmployeePhone', __('Employee Phone'), ['class' => 'col-form-label']) }}
                {{ Form::number('EmployeePhone', null, ['class' => 'form-control', 'placeholder' => __('Employee Phone')]) }}
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{ Form::label('priority', __('Priority'), ['class' => 'col-form-label']) }}
                <select name="priority" class="form-control select2" id="choices-multiple">
                    <option value="low">{{ __('Low') }}</option>
                    <option value="medium">{{ __('Medium') }}</option>
                    <option value="high">{{ __('High') }}</option>
                    <option value="critical">{{ __('critical') }}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('description', __('Description'), ['class' => 'col-form-label']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Ticket Description'),'rows'=>'5']) }}
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Create') }}" class="btn  btn-primary">
</div>
{{ Form::close() }}