@extends('main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Patients
        <small>Add patient</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="patients.php"><i class="fa fa-users"></i> Patients</a></li>
        <li class="active">Add patient</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Add Patient</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="patient_form" method="post" action="{{url('patient/store')}}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>OPD Number</label>
                            <div class="pull-right">
                                accept     <input id="opd_number_entry" name="" type="checkbox" onclick="javascript:yesnoCheck();" required>
                            </div>
                            <input id="opd_number" name="opd_number" type="number" value="{{ $opdNumber }}" disabled class="form-control" style="width: 100%;" maxlength="6" required/>
                        </div>
                        <div class="form-group">
                            <label>Firstname</label>
                            <input id="firstname" name="firstname" type="name" class="form-control" style="width: 100%;" required/>
                        </div>
                        <div class="form-group">
                            <label>Lastname</label>
                            <input id="lastname" name="lastname" type="name" class="form-control" style="width: 100%;" required/>
                        </div>
                        <div class="form-group">
                            <label>Sex</label>
                            <select id="sex" name="sex" class="form-control select2" style="width: 100%;" required>
                                <option selected="selected">Select sex</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
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
                                <input id="date_of_birth" name="date_of_birth" type="text" class="form-control" placeholder="mm/dd/yyyy" data-inputmask="'alias': 'dd/mm/yyyy'" onchange="javascript:getAge()">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group ">
                            <label>Phone</label>
                            <input id="phone" name="phone" type="number" class="form-control" style="width: 100%;" maxlength="10" required/>
                        </div>
                        <div class="form-group ">
                            <label>Phone Emergency</label>
                            <input id="phone_emergency" name="phone_emergency" type="number" class="form-control" style="width: 100%;" maxlength="10" required/>
                        </div>
                        <div class="form-group ">
                            <label>Address</label>
                            <input id="address" name="address" type="text" class="form-control " style="width: 100%;" required/>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer ">
                <input id="submit" name="submit" type="submit" value="SUBMIT" class="btn btn-block btn-primary pull-right" style="width: 90px;"/>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
        