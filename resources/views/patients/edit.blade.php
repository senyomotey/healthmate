@extends('main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Patients
        <small>edit patient</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="patients.php"><i class="fa fa-dashboard"></i> Patients</a></li>
        <li class="active">Edit Patient</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Patient</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="patient_form" method="post" action="{{url('patient/update')}}" enctype="multipart/form-data">
            @csrf
            <input id="unique_id" name="unique_id" value="{{ $patient['unique_id'] }}" hidden/>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>OPD Number</label>
                            <div class="pull-right">
                                accept     <input id="opd_number_entry" name="" type="checkbox" onclick="javascript:yesnoCheck();">
                            </div>
                            <input id="opd_number" name="opd_number" type="number" value="{{ $patient['opd_number'] }}" class="form-control" style="width: 100%;" maxlength="6" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Firstname</label>
                            <input id="firstname" name="firstname" type="name" value="{{ $patient['firstname'] }}" class="form-control" style="width: 100%;" required/>
                        </div>
                        <div class="form-group">
                            <label>Middlename</label>
                            <input id="middlename" name="middlename" type="name" value="{{ $patient['middlename'] }}" class="form-control" style="width: 100%;"/>
                        </div>
                        <div class="form-group">
                            <label>Lastname</label>
                            <input id="lastname" name="lastname" type="name" value="{{ $patient['lastname'] }}" class="form-control" style="width: 100%;" required/>
                        </div>
                        <div class="form-group">
                            <label>Sex</label>
                            <select id="sex" name="sex" class="form-control select2" style="width: 100%;" required>
                                <option>Select sex</option>
                                @if($patient['sex'] == 'male')         
                                    <option value="male" selected="selected">Male</option>
                                    <option value="female">Female</option>        
                                @elseif($patient['sex'] =='female')
                                    <option value="male">Male</option>
                                    <option value="female" selected="selected">Female</option>       
                                @endif
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of Birth(mm/dd/yyyy)</label>
                            <div class="pull-right">
                                <p4 id="age_p_tag" name="age_p_tag"></p4>
                            </div>
                            <div class="input-group date" style="width: 100%;">
                                <input id="date_of_birth" name="date_of_birth" type="text" value="{{ date('m/d/Y', strtotime($patient['date_of_birth'])) }}" placeholder="mm/dd/yyyy" class="form-control" onchange="javascript:getAge()">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group ">
                            <label>Phone</label>
                            <input id="phone" name="phone" type="number" value="{{ $patient['phone'] }}" class="form-control" style="width: 100%;" maxlength="10" required/>
                        </div>
                        <div class="form-group ">
                            <label>Phone Emergency</label>
                            <input id="phone_emergency" name="phone_emergency" type="phone" value="{{ $patient['phone_emergency'] }}" class="form-control" style="width: 100%;" maxlength="10" required/>
                        </div>
                        <div class="form-group ">
                            <label>Address</label>
                            <input id="address" name="address" type="text" value="{{ $patient['address'] }}" class="form-control " style="width: 100%;" required/>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer ">
                <button id="submit" name="submit" type="submit" class="btn btn-block btn-primary pull-right" style="width: 90px;">SUBMIT</button>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection