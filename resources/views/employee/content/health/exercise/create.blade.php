{{ Form::open(['route' => 'employee.exercise.store', 'method' => 'POST']) }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('exercise',__('How long did you exercise?'),array('class'=>'form-label')) }}
                {{Form::text('exercise', null, ['class' => 'form-control', 'placeholder' => __('minutes')])}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('time_slot',__('time_slot'),array('class'=>'form-label')) }}
                <input type="datetime-local" class="form-control" name="time_slot" id="datetimepicker">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('exercise type',__('exercise type'),array('class'=>'form-label')) }}
                <select name="exercise_type" id="exercise_type" class="form-control select2">
                    <option selected disabled>{{__('What are the types of exercises you did?')}}</option>
                    <option value="{{__('cardio')}}">{{__('cardio')}}</option>
                    <option value="{{__('Swimming')}}">{{__('Swimming')}}</option>
                    <option value="{{__('Low Impact')}}">{{__('Low Impact')}}</option>
                    <option value="{{__('Weight Lifting')}}">{{__('Weight Lifting')}}</option>
                    <option value="{{__('Yoga')}}">{{__('Yoga')}}</option>
                    <option value="{{__('Other')}}">{{__('Other')}}</option>
                </select>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{__('Create')}}" class="btn  btn-primary">
    </div>
{{ Form::close() }}