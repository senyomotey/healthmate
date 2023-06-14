@extends('main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Reports
        <small>statement of outpatients</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-bar-chart"></i> Reports</a></li>
        <li class="active">Statement of Outpatients</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Statement of Outpatients</h3>

                    <div class="box-tools">
                        <form method="get" action="{{ url('reports/soo') }}">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 135px;">
                                <div class="form-group">
                                    <select id="period" name="period" class="form-control select2" style="height: 30px;">
                                        @for($i = 1; $i <= 12; $i++)
                                            @if($i == $month)
                                                <option value="{{ $i }}" selected="selected">{{ $months[$i-1] }}</option>
                                            @else
                                                <option value="{{ $i }}">{{ $months[$i-1] }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Age Group</th>
                            <th>Male(new) insured</th>
                            <th>Female(new) insured</th>
                            <th>Male(old) insured</th>
                            <th>Female(old) insured</th>
                            <th>Male(new) cash</th>
                            <th>Female(new) cash</th>
                            <th>Male(old) cash</th>
                            <th>Female(old) cash</th>
                            <th>Total Male</th>
                            <th>Total Female</th>
                        </tr>
                        <tr>
                            <td>0-28 Days</td>
                            <td class="text-blue">{{ $content['insured_new_male_0_28D'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_0_28D'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_0_28D'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_0_28D'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_0_28D'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_0_28D'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_0_28D'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_0_28D'] }}</td>
                            <td class="text-green">{{ $content['male_0_28D'] }}</td>
                            <td class="text-green">{{ $content['female_0_28D'] }}</td>
                        </tr>
                        <tr>
                            <td>1-11 Months</td>
                            <td class="text-blue">{{ $content['insured_new_male_1_11M'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_1_11M'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_1_11M'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_1_11M'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_1_11M'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_1_11M'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_1_11M'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_1_11M'] }}</td>
                            <td class="text-green">{{ $content['male_1_11M'] }}</td>
                            <td class="text-green">{{ $content['female_1_11M'] }}</td>
                        </tr>
                        <tr>
                            <td>1-4 Years</td>
                            <td class="text-blue">{{ $content['insured_new_male_1_4Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_1_4Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_1_4Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_1_4Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_1_4Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_1_4Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_1_4Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_1_4Y'] }}</td>
                            <td class="text-green">{{ $content['male_1_4Y'] }}</td>
                            <td class="text-green">{{ $content['female_1_4Y'] }}</td>
                        </tr>
                        <tr>
                            <td>5-9 Years</td>
                            <td class="text-blue">{{ $content['insured_new_male_5_9Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_5_9Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_5_9Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_5_9Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_5_9Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_5_9Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_5_9Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_5_9Y'] }}</td>
                            <td class="text-green">{{ $content['male_5_9Y'] }}</td>
                            <td class="text-green">{{ $content['female_5_9Y'] }}</td>
                        </tr>
                        <tr>
                            <td>10-14 Years</td>
                            <td class="text-blue">{{ $content['insured_new_male_10_14Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_10_14Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_10_14Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_10_14Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_10_14Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_10_14Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_10_14Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_10_14Y'] }}</td>
                            <td class="text-green">{{ $content['male_10_14Y'] }}</td>
                            <td class="text-green">{{ $content['female_10_14Y'] }}</td>
                        </tr>
                        <tr>
                            <td>15-17 Years</td>
                            <td class="text-blue">{{ $content['insured_new_male_15_17Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_15_17Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_15_17Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_15_17Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_15_17Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_15_17Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_15_17Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_15_17Y'] }}</td>
                            <td class="text-green">{{ $content['male_15_17Y'] }}</td>
                            <td class="text-green">{{ $content['female_15_17Y'] }}</td>
                        </tr>
                        <tr>
                            <td>18-19 Years</td>
                            <td class="text-blue">{{ $content['insured_new_male_18_19Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_18_19Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_18_19Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_18_19Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_18_19Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_18_19Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_18_19Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_18_19Y'] }}</td>
                            <td class="text-green">{{ $content['male_18_19Y'] }}</td>
                            <td class="text-green">{{ $content['female_18_19Y'] }}</td>
                        </tr>
                        <tr>
                            <td>20-34 Years</td>
                            <td class="text-blue">{{ $content['insured_new_male_20_34Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_20_34Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_20_34Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_20_34Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_20_34Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_20_34Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_20_34Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_20_34Y'] }}</td>
                            <td class="text-green">{{ $content['male_20_34Y'] }}</td>
                            <td class="text-green">{{ $content['female_20_34Y'] }}</td>
                        </tr>
                        <tr>
                            <td>35-49 Years</td>
                            <td class="text-blue">{{ $content['insured_new_male_35_49Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_35_49Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_35_49Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_35_49Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_35_49Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_35_49Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_35_49Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_35_49Y'] }}</td>
                            <td class="text-green">{{ $content['male_35_49Y'] }}</td>
                            <td class="text-green">{{ $content['female_35_49Y'] }}</td>
                        </tr>
                        <tr>
                            <td>50-59 Years</td>
                            <td class="text-blue">{{ $content['insured_new_male_50_59Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_50_59Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_50_59Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_50_59Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_50_59Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_50_59Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_50_59Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_50_59Y'] }}</td>
                            <td class="text-green">{{ $content['male_50_59Y'] }}</td>
                            <td class="text-green">{{ $content['female_50_59Y'] }}</td>
                        </tr>
                        <tr>
                            <td>60-69 Years</td>
                            <td class="text-blue">{{ $content['insured_new_male_60_69Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_60_69Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_60_69Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_60_69Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_60_69Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_60_69Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_60_69Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_60_69Y'] }}</td>
                            <td class="text-green">{{ $content['male_60_69Y'] }}</td>
                            <td class="text-green">{{ $content['female_60_69Y'] }}</td>
                        </tr>
                        <tr>
                            <td>70+</td>
                            <td class="text-blue">{{ $content['insured_new_male_70Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_new_female_70Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_male_70Y'] }}</td>
                            <td class="text-blue">{{ $content['insured_old_female_70Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_male_70Y'] }}</td>
                            <td class="text-red">{{ $content['cash_new_female_70Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_male_70Y'] }}</td>
                            <td class="text-red">{{ $content['cash_old_female_70Y'] }}</td>
                            <td class="text-green">{{ $content['male_70Y'] }}</td>
                            <td class="text-green">{{ $content['female_70Y'] }}</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL</strong></td>
                            <td class="text-muted"><strong>{{ $content['insured_new_male_T'] }}</strong></td>
                            <td class="text-muted"><strong>{{ $content['insured_new_female_T'] }}</strong></td>
                            <td class="text-muted"><strong>{{ $content['insured_old_male_T'] }}</strong></td>
                            <td class="text-muted"><strong>{{ $content['insured_old_female_T'] }}</strong></td>
                            <td class="text-muted"><strong>{{ $content['cash_new_male_T'] }}</strong></td>
                            <td class="text-muted"><strong>{{ $content['cash_new_female_T'] }}</strong></td>
                            <td class="text-muted"><strong>{{ $content['cash_old_male_T'] }}</strong></td>
                            <td class="text-muted"><strong>{{ $content['cash_old_female_T'] }}</strong></td>
                            <td class="text-muted"><strong>{{ $content['male_T'] }}</strong></td>
                            <td class="text-muted"><strong>{{ $content['female_T'] }}</strong></td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
