@extends('main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Visits
        <small>Add visit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('visits') }}"><i class="fa fa-heartbeat"></i> Visits</a></li>
        <li class="active">Add visit</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <!-- /.box-header -->
        <form role="form" id="visit_form" method="post" action="{{url('visit/store')}}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Entry type</label>
                            <select id="entry_type" name="entry_type" class="form-control select2" style="width: 100%;" required>
                                <option value="" selected="selected" required>Select an entry type</option>
                                <option value="new">New</option>
                                <option value="old">Old</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>OPD Number</label>
                            <select id="opd_number" name="opd_number" class="form-control select2" style="width: 100%;" required>
                                <option value="" selected="selected">Select an OPD Number</option>
                                @foreach($patients as $patient)
                                <option value="{{ $patient['opd_number'] }}">{{ $patient['opd_number'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NHIS Status</label>
                            <select id="nhis_status" name="nhis_status" class="form-control select2" style="width: 100%;" onclick="javascript:yesnoCheck();" required>
                                <option value="" selected="selected">Select an NHIS status</option>
                                <option value="yes">Insured</option>
                                <option value="no">Not Insured</option>
                            </select>
                        </div>
                        <div id="nhis_number_div" class="form-group">
                            <label>NHIS Number</label>
                            <input id="nhis_number" name="nhis_number" type="number" maxlength="8" class="form-control" style="width: 100%;" />
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->        
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary pull-right" style="width: 90px;">SUBMIT</button>
            </div>
        </form>
    </div>

</section>
<!-- /.content -->
@endsection

@push('js')

@endpush