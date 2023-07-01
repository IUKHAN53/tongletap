{{ Form::open(['route' => ['ticket.update-status', $ticket->id], 'method' => 'PUT']) }}
<div class="modal-body">
    <div class="form-group">
        {{ Form::label('status', __('Status'), ['class' => 'col-form-label']) }}
        <select name="status" class="form-control  select2" id="status">
            <option value="pending" @if ($ticket->status == 'pending') selected @endif>{{ __('Pending') }}</option>
            <option value="approved" @if ($ticket->status == 'approved') selected @endif>{{ __('Approved') }}</option>
            <option value="rejected" @if ($ticket->status == 'rejected') selected @endif>{{ __('Rejected') }}</option>
        </select>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Apply') }}" class="btn btn-primary">
</div>
{{ Form::close() }}