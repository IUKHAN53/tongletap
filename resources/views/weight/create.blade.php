{{ Form::open(array('url' => 'weight')) }}
<div class="modal-body">
    <!--<div class="row">-->
    <!--    <div class="col-md-12">-->
    <!--        <div class="form-group">-->
    <!--            {{ Form::label('company_name', __('Company Name'), ['class' => 'form-label']) }}-->
    <!--            {{ Form::select('company_name', $companyname, null, ['class' => 'form-control select2 company_name','placeholder' => __('Select Company')]) }}-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('employee_name', __('employee Name'), ['class' => 'col-form-label']) }}
                {{ Form::select('employee_name', $employees, null, ['class' => 'form-control select2 employee_name','placeholder' => __('Select employee')]) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('weight',__('What is your weight?'),array('class'=>'form-label')) }}
                {{Form::text('weight', null, ['class' => 'form-control', 'placeholder' => __('Kilograms')])}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('time_slot',__('time_slot'),array('class'=>'form-label')) }}
                <input type="datetime-local" class="form-control" name="time_slot" id="datetimepicker">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{__('Create')}}" class="btn  btn-primary">
    </div>
    {{ Form::close() }}