{{ Form::open(array('url' => 'glucose')) }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {{Form::label('mgdl',__('mg/dL'),array('class'=>'form-label')) }}
                {{Form::text('mgdl', null, ['class' => 'form-control', 'placeholder' => __('mg/dL')])}}
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                {{Form::label('messure type',__('messure type'),array('class'=>'form-label')) }}
                <select name="messure_type" id="messure_type" required class="form-control ">
                    <option selected disabled>{{__('When did you messure?')}}</option>
                    <option value="{{__('Before Breakfast')}}">{{__('Before Breakfast')}}</option>
                    <option value="{{__('After Breakfast')}}">{{__('After Breakfast')}}</option>
                    <option value="{{__('Before Lanch')}}">{{__('Before Lanch')}}</option>
                    <option value="{{__('After Lanch')}}">{{__('After Lanch')}}</option>
                    <option value="{{__('Before Dinner')}}">{{__('Before Dinner')}}</option>
                    <option value="{{__('After Dinner')}}">{{__('After Dinner')}}</option>
                    <option value="{{__('Bedtime')}}">{{__('Bedtime')}}</option>
                    <option value="{{__('After Snacks')}}">{{__('After Snacks')}}</option>
                    <option value="{{__('Random')}}">{{__('Random')}}</option>
                </select>

            </div>
        </div>
    </div>

   <!--<div class="row">-->
   <!--     <div class="col-md-12">-->
   <!--         <div class="form-group">-->
   <!--            {{ Form::label('company_name', __('Company Name'), ['class' => 'form-label']) }}-->
   <!--             {{ Form::select('company_name', $companyname, null, ['class' => 'form-control select2 company_name','placeholder' => __('Select Company')]) }}-->
   <!--         </div>-->
   <!--     </div>-->
   <!-- </div>-->

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
                {{Form::label('time_slot',__('time_slot'),array('class'=>'form-label')) }}
                <input type="datetime-local" class="form-control" name="time_slot" id="datetimepicker">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Create')}}" class="btn  btn-primary">
</div>
{{ Form::close() }}