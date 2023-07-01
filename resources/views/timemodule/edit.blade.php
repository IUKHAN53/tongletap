{{Form::model( $timemodule ,array('route' => array('timemodule.update', $timemodule->id), 'method' => 'PUT')) }}
<div class="modal-body">
    <!--<div class="form-group">-->
    <!--    {{Form::label('employeename',__('Employee Name'),array('class'=>'form-label')) }}-->
    <!--    {{Form::text('employeename', $timemodule->employee_name, ['class' => 'form-control', 'placeholder' => __('Select Employee'),'readonly'])}}-->

    <!--</div>-->

    <div class="form-group">
        {{Form::label('Company',__('Select Company'),['class'=>'form-label'])}}
        <select class="form-control select2" name="companyname" id="companyname" placeholder="Select Company Name">
            <option value="" selected disabled>{{__('Select Company')}}</option>
            @foreach($companyname as $company)
            <option value="{{$company->company_name}}" {{ $company->company_name == $timemodule->company_name ? 'selected' : '' }}>{{$company->company_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{Form::label('totalhourspurchase',__('Total Hours Purchase'),array('class'=>'form-label')) }}
                {{Form::number('totalhourspurchase', $timemodule->total_hours_purchase, ['class' => 'form-control', 'placeholder' => __('Hours')])}}
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{Form::label('totalhoursused',__('Total Hours Used'),array('class'=>'form-label')) }}
                {{Form::number('totalhoursused', $timemodule->total_hours_used, ['class' => 'form-control', 'placeholder' => __('Hours')])}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{Form::label('remaininghours',__('Remaining Hours'),array('class'=>'form-label')) }}
                {{Form::number('remaininghours', $timemodule->remaining_hours, ['class' => 'form-control', 'placeholder' => __('Hours'),'readonly'])}}
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{ Form::label('time_slot', __('Time Slot'), ['class' => 'form-label']) }}
                {{ Form::input('dateTime-local', 'time_slot', $timemodule->datetime, ['id' => 'time_slot', 'class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <span id="errormass" style="color: brown;"></span>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Create')}}" class="btn  btn-primary">
</div>
{{ Form::close() }}

<script>
    $('#totalhoursused').keyup(function() {
        var gettothoupurval = $('#totalhourspurchase').val();
        var hoursused = this.value;
        if (hoursused == '') {
            var hoursused = 0;
        }
        if (gettothoupurval === '') {
            $('#remaininghours').val('0');
        } else {
            if (parseInt(gettothoupurval) < parseInt(hoursused)) {
                $('#totalhoursused').val('');
                $('#remaininghours').val('0');
                $('#errormass').css('display', 'block');
                $('#errormass').html('Enter Total Hours Used less than Total Hours Purchased.');
            } else {
                $('#errormass').css('display', 'none');
                var getlasthour = gettothoupurval - hoursused;
                $('#remaininghours').val(getlasthour);
            }
        }
    });
</script>