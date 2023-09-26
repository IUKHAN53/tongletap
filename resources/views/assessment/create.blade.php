{{ Form::open(array('route' => 'assessments.store','method'=>'post','enctype' => 'multipart/form-data')) }}
<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('title', __('Title'),['class'=>'form-label']) }}
            <div class="form-icon-user">
                {{ Form::text('title', '', array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('description', __('Description'),['class'=>'form-label']) }}
            <div class="form-icon-user">
                {{ Form::textarea('description', '', array('class' => 'form-control','rows'=>3,'required'=>'required')) }}
            </div>
        </div>
{{--        <div class="form-group col-md-12">--}}
{{--            {{ Form::label('image', __('Image'),['class'=>'form-label']) }}--}}
{{--            <div class="form-icon-user">--}}
{{--                {{ Form::file('image', array('class' => 'form-control')) }}--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="form-group col-md-12">
            {{ Form::label('url', __('URL'),['class'=>'form-label']) }}
            <div class="form-icon-user">
                {{ Form::text('url', '', array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Create')}}" class="btn  btn-primary">
</div>
{{ Form::close() }}
