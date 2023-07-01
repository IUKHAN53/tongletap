{{ Form::open(['url' => 'timemodule', 'method' => 'post']) }}
<div class="modal-body">
    <!--<div class="form-group">-->
    <!--    {{Form::label('Company',__('Select Employee'),['class'=>'form-label'])}}-->
    <!--    <select class="form-control select2" name="employeename" id="employeename" placeholder="Select Employee Name">-->
    <!--        <option value="" selected disabled>{{__('Select Employee')}}</option>-->
    <!--        @foreach($users as $user)-->
    <!--        <option value="{{ $user }}">{{ $user }}</option>-->
    <!--        @endforeach-->
    <!--    </select>-->
    <!--</div>-->

    <div class="form-group">
        {{Form::label('Company',__('Select Company'),['class'=>'form-label'])}}
        <select class="form-control select2" name="companyname" id="companyname" placeholder="Select Company Name">
            <option value="" selected disabled>{{__('Select Company')}}</option>
            @foreach($companyname as $company)
            <option value="{{ $company }}">{{ $company }}</option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{Form::label('totalhourspurchase',__('Total Hours Purchase'),array('class'=>'form-label')) }}
                {{Form::text('totalhourspurchase', null, ['class' => 'form-control','id' => 'totalhourspurchase', 'placeholder' => __('Hours')])}}
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{Form::label('totalhoursused',__('Total Hours Used'),array('class'=>'form-label')) }}
                {{Form::text('totalhoursused', null, ['class' => 'form-control ','id' => 'totalhoursused', 'placeholder' => __('Hours')])}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{Form::label('remaininghours',__('Remaining Hours'),array('class'=>'form-label')) }}
                {{Form::text('remaininghours', 0, ['class' => 'form-control ','id' => 'remaininghours', 'placeholder' => __('Hours'),'readonly'])}}
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
            <div class="form-group">
                {{ Form::label('time_slot', __('Time Slot'), ['class' => 'form-label']) }}
                <input type="datetime-local" class="form-control" name="time_slot" id="datetimepicker">
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