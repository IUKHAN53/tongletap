{{ Form::open(['route' => ['ticket.update-meeting-link', $ticket->id], 'method' => 'PUT']) }}
<div class="modal-body">
    <div class="form-group">
        {{ Form::label('meeting_link', __('Meeting Link'), ['class' => 'col-form-label']) }}
        {{ Form::text('meeting_link', $ticket->meeting_link, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Send Link') }}" class="btn btn-primary">
</div>
{{ Form::close() }}