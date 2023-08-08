<div class="modal-body task-id" id="{{$task->id}}">
    <div class="card">
        <div class="card-body">
            <h5> {{__('Task Detail')}}</h5>
            <div class="row  mt-4">
                <div class="ms-2">
                    <p class="text-muted text-sm mb-0">{{__('Name')}}</p>
                    <h3 class="mb-0 text-info">{{ $task->name }}</h3>
                </div>
            </div>
            <div class="row  mt-4">
                <div class="ms-2">
                    <p class="text-muted text-sm mb-0">{{__('Description')}}</p>
                    <h3 class="mb-0 text-info">{{ $task->description }}</h3>
                </div>
            </div>

            <div class="row  mt-4">
                <div class="col-md-6 col-sm-6">
                    <div class="d-flex align-items-start">
                        <div class="ms-2">
                            <p class="text-muted text-sm mb-0">{{__('Estimated Hours')}}</p>
                            <h3 class="mb-0 text-success">{{ (!empty($task->estimated_hrs)) ? number_format($task->estimated_hrs) : '-' }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
