@extends('main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Home
        <small>Overview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $totalPatients }}</h3>
                    <p>Total Patients</p>
                </div>
                <div class="icon">
                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $totalVisits }}</h3>
                    <p>Total Visits</p>
                </div>
                <div class="icon">

                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $totalVisitsInsured }}</h3>
                    <p>Total Insured Visits</p>
                </div>
                <div class="icon">

                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $totalVisitsUninsured }}</h3>
                    <p>Total Uninsured Visits</p>
                </div>
                <div class="icon">

                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-navy">
                <div class="inner">
                    <h3>{{ $totalPatientsMale }}</h3>
                    <p>Male Patients</p>
                </div>
                <div class="icon">

                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3>{{ $totalPatientsFemale }}</h3>
                    <p>Female Patients</p>
                </div>
                <div class="icon">

                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $totalVisitsNew }}</h3>
                    <p>New Visits</p>
                </div>
                <div class="icon">

                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $totalVisitsOld }}</h3>
                    <p>Old Visits</p>
                </div>
                <div class="icon">

                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">

        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->

</section>
<!-- /.content -->
@endsection