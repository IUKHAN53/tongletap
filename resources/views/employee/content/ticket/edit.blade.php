{{ Form::model($ticket, ['route' => ['employee.ticket.update', $ticket->id], 'method' => 'PUT']) }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{ Form::label('title', __('Subject'), ['class' => 'col-form-label']) }}
                {{ Form::text('title', $ticket->title, ['class' => 'form-control', 'placeholder' => __('Enter Ticket Subject')]) }}
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{ Form::label('EmployeePhone', __('Employee Phone'), ['class' => 'col-form-label']) }}
                {{ Form::text('phone', $ticket->employee_phone, ['class' => 'form-control', 'placeholder' => __('Employee Phone')]) }}
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{ Form::label('priority', __('Priority'), ['class' => 'col-form-label']) }}
                <select name="priority" class="form-control select2" id="choices-multiple">
                    <option value="low" @if ($ticket->priority == 'low') selected @endif>{{ __('Low') }}
                    </option>
                    <option value="medium" @if ($ticket->priority == 'medium') selected @endif>{{ __('Medium') }}
                    </option>
                    <option value="high" @if ($ticket->priority == 'high') selected @endif>{{ __('High') }}
                    </option>
                    <option value="critical" @if ($ticket->priority == 'critical') selected @endif>
                        {{ __('critical') }}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{ Form::label('time_slot', __('Time Slot'), ['class' => 'col-form-label']) }}
                <input type="datetime-local" class="form-control" name="time_slot" value="{{$ticket->time_slot}}"
                       id="datetimepicker">
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
    <input type="submit" value="{{ __('Update') }}" class="btn  btn-primary">
</div>
{{ Form::close() }}