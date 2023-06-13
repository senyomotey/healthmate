@extends('main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Visits
        <small>all visits</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-heartbeat"></i> Visits</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Visits</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Entry Type</th>
                                <th>OPD Number</th>
                                <th>Firstname</th>
                                <th>Middlename</th>
                                <th>Lastname</th>
                                <th>NHIS Status</th>
                                <th>NHIS Number</th>
                                <th>Date of Visit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visits as $visit)
                            <tr>
                                <td>{{ $visit['id'] }}</td>
                                <td>{{ $visit['entry_type'] }}</td>
                                <td>{{ $visit['opd_number'] }}</td>
                                <td>{{ $visit['firstname'] }}</td>
                                <td>{{ $visit['middlename'] }}</td>
                                <td>{{ $visit['lastname'] }}</td>
                                <td>{{ $visit['nhis_status'] }}</td>
                                <td>{{ $visit['nhis_number'] }}</td>
                                <td>{{ date("d-M-Y, h:i:s A", strtotime($visit['created_at'])) }}</td>
                                <td>
                                    <a href="{{ route('visit/edit', ['id' => $visit['unique_id']]) }}"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <!--<a href="#"><span class="label label-danger"><i class="fa fa-trash"></i></span></a>-->
                                 </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <!-- <tr>
                                <th>ID</th>
                                <th>Entry Type</th>
                                <th>OPD Number</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>NHIS Status</th>
                                <th>NHIS Number</th>
                                <th>Date of Visit</th>
                                <th>Action</th>
                            </tr> -->
                        </tfoot>
                        
                    </table>
                    <div class="<!--alert alert-danger-->">
                        <a href="{{ route('visit/add') }}"><button name="add" id="add" value="add" style="width: 60px; height: 27px;" class="btn btn-success btn-xs">Add</button></a>
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