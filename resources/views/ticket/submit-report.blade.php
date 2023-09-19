<style>
    .modal-body {
        padding: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .col-form-label {
        font-weight: bold;
    }
    .form-control {
        border-radius: 5px;
        padding: 10px;
    }
    .btn-light, .btn-primary {
        padding: 10px 20px;
        margin: 5px;
        border-radius: 5px;
    }
</style>

{{ Form::open(['route' => ['ticket.store-report', $ticket->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
<div class="modal-body">
    <div class="form-group">
        {{ Form::label('meeting_report', __('Meeting Report'), ['class' => 'col-form-label']) }}
        {{ Form::file('meeting_report', ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    @if(!empty($ticket->meeting_report))
        <a href="{{ route('ticket.download-report', $ticket->id) }}" class="btn btn-info">Download Existing Report</a>
    @endif
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Submit Report') }}" class="btn btn-primary">
</div>
{{ Form::close() }}
