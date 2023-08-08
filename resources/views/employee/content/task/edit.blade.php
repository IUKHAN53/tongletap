{{ Form::model($task, ['route' => ['employee.tasks.update',[$task->id]], 'id' => 'edit_task', 'method' => 'POST']) }}
<div class="modal-body">
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                {{ Form::label('name', __('Task name'),['class' => 'form-label']) }}<span class="text-danger">*</span>
                {{ Form::text('name', null, ['class' => 'form-control','required'=>'required']) }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                {{ Form::label('description', __('Description'),['class' => 'form-label']) }}
                <small class="form-text text-muted mb-2 mt-0">{{__('This textarea will autosize while you type')}}</small>
                {{ Form::textarea('description', null, ['class' => 'form-control','rows'=>'1','data-toggle' => 'autosize']) }}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                {{ Form::label('estimated_hrs', __('Estimated Hours'),['class' => 'form-label']) }}<span class="text-danger">*</span>
                <small class="form-text text-muted mb-2 mt-0">{{__('allocated total ').$hrs['allocated'].__(' hrs in other tasks')}}</small>
                {{ Form::number('estimated_hrs', null, ['class' => 'form-control','required' => 'required','min'=>'0','maxlength' => '8']) }}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                {{ Form::label('priority', __('Priority'),['class' => 'form-label']) }}
                <small class="form-text text-muted mb-2 mt-0">{{__('Set Priority of your task')}}</small>
                <select class="form-control select2" name="priority" id="priority" required>
                    @foreach(\App\Models\ProjectTask::$priority as $key => $val)
                        <option value="{{ $key }}" {{ ($key == $task->priority) ? 'selected' : '' }} >{{ __($val) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                {{ Form::label('start_date', __('Start Date'),['class' => 'form-label']) }}
                {{ Form::date('start_date', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                {{ Form::label('end_date', __('End Date'),['class' => 'form-label']) }}
                {{ Form::date('end_date', null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Update')}}" class="btn  btn-primary">
</div>
{{Form::close()}}

