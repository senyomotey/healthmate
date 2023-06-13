@extends('main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Visits
        <small>edit visit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="visits.php"><i class="fa fa-heartbeat"></i> Visits</a></li>
        <li class="active">Edit Visit</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Visit</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="visit_form" method="post" action="{{url('visit/update')}}" enctype="multipart/form-data">
            @csrf
            <input id="unique_id" name="unique_id" value="{{ $visit['unique_id'] }}" hidden/>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Entry type</label>
                            <select id="entry_type" name="entry_type" class="form-control select2" style="width: 100%;">
                                <option value="">Select an entry type</option>
                                @if($visit['entry_type'] == 'new')         
                                    <option value="new" selected="selected">New</option>
                                    <option value="old">Old</option>        
                                @elseif($visit['entry_type'] =='old')
                                    <option value="new">New</option>
                                    <option value="old" selected="selected">Old</option>       
                                @endif
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>OPD Number</label>
                            <select id="opd_number" name="opd_number" class="form-control select2" style="width: 100%;">
                                <option value="">Select an OPD Number</option>
                                @foreach($patients as $patient)
                                    @if($patient['opd_number'] == $visit['opd_number'])         
                                        <option value="{{ $patient['opd_number'] }}" selected="selected">{{ $patient['opd_number'] }}</option>       
                                    @elseif($patient['opd_number'] == $visit['opd_number'])
                                        <option value="{{ $patient['opd_number'] }}">Insure{{ $patient['opd_number'] }}d</option>       
                                    @endif
                                @endforeach
                                ?>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NHIS Status</label>
                            <select id="nhis_status" name="nhis_status" class="form-control select2" style="width: 100%;" onclick="javascript:yesnoCheck();">
                                <option value="" selected="selected">Select an NHIS status</option>
                                @if($visit['nhis_status'] == 'yes')         
                                    <option value="yes" selected="selected">Insured</option>
                                    <option value="no">Not Insured</option>        
                                @elseif($visit['nhis_status'] =='no')
                                    <option value="yes">Insured</option>
                                    <option value="no" selected="selected">Not Insured</option>       
                                @endif
                            </select>
                        </div>
                        <div id="nhis_number_div" class="form-group">
                            <label>NHIS Number</label>
                            <input id="nhis_number" name="nhis_number" type="number" value="{{ $visit['nhis_number'] }}" maxlength="8" class="form-control" style="width: 100%;"/>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->        
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input id="submit" name="submit" type="submit" value="SUBMIT" class="btn btn-block btn-primary pull-right" style="width: 90px;"/>
            </div>
        </form>
    </div>

</section>
<!-- /.content -->
@endsection