@extends('main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Patients
        <small>all patients</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Patients</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Patients</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>OPD Number</th>
                                <th>Firstname</th>
                                <th>Middlename</th>
                                <th>Lastname</th>
                                <th>Sex</th>
                                <th>Date of Birth</th>
                                <th>Phone</th>
                                <th>Phone Emergency</th>
                                <th>Address</th>
                                <th>Created at</th>
                                <th>Last Visit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient['id']}}</td>
                                <td>{{$patient['opd_number']}}</td>
                                <td>{{$patient['firstname']}}</td>
                                <td>{{$patient['middlename']}}</td>
                                <td>{{$patient['lastname']}}</td>
                                <td>{{$patient['sex']}}</td>
                                <td>{{date("d-M-Y", strtotime($patient['date_of_birth']))}}</td>
                                <td>{{$patient['phone']}}</td>
                                <td>{{$patient['phone_emergency']}}</td>
                                <td>{{$patient['address']}}</td>
                                <td>{{date("d-M-Y, h:i:s A", strtotime($patient['created_at']))}}</td>
                                <td>{{date("d-M-Y, h:i:s A", strtotime($patient['last_visit']))}}</td>
                                <td>
                                    <a href="visits_edit.php?visit_unique_id='.$unique_id.'"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <!--<a href="#"><span class="label label-danger"><i class="fa fa-trash"></i></span></a>-->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="<!--alert alert-danger-->">
                        <a href="{{ route('patient/add') }}"><button name="add" id="add" value="add" style="width: 60px; height: 27px;" class="btn btn-success btn-xs">Add</button></a>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection