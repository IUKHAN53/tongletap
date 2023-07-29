{{ Form::open(['route' => 'employee.sleep.store']) }}
<div class="modal-body">
 <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('sleep',__('How long did you sleep?'),array('class'=>'form-label')) }}
                {{Form::text('sleep', null, ['class' => 'form-control', 'placeholder' => __('Hours')])}}
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