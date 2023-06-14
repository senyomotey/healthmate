<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\Visit;

class ReportController extends Controller
{
    private $month;
    private $year;

    public function soo(Request $request) {
        $rules = [
            'period' => 'nullable|min:1',
        ];

        $data = array();

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     $errors = $validator->errors();

        //     return redirect('reports/soo')->with('error', $errors->first());
        // }

        if (!empty($request->period) && $request->period != null) {
            $this->month = $request->period;
            $this->year = date('Y');
        } else {
            $this->month = date('m');
            $this->year = date('Y');
        }

        $data['month'] = $this->month;
        $data['year'] = $this->year;
        $data['content'] = $this->generateMonthlySO();
        $data['months'] = $this->getMonths();

        return view('reports.soo')->with($data);
    }

    function generateMonthlySO() {
        $insured_new_male_0_28D = 0; $insured_new_female_0_28D = 0; $insured_old_male_0_28D = 0; $insured_old_female_0_28D = 0;
        $insured_new_male_1_11M = 0; $insured_new_female_1_11M = 0; $insured_old_male_1_11M = 0; $insured_old_female_1_11M = 0; 
        $insured_new_male_1_4Y = 0; $insured_new_female_1_4Y = 0; $insured_old_male_1_4Y = 0; $insured_old_female_1_4Y = 0; 
        $insured_new_male_5_9Y = 0; $insured_new_female_5_9Y = 0; $insured_old_male_5_9Y = 0; $insured_old_female_5_9Y = 0; 
        $insured_new_male_10_14Y = 0; $insured_new_female_10_14Y = 0; $insured_old_male_10_14Y = 0; $insured_old_female_10_14Y = 0; 
        $insured_new_male_15_17Y = 0; $insured_new_female_15_17Y = 0; $insured_old_male_15_17Y = 0; $insured_old_female_15_17Y = 0; 
        $insured_new_male_18_19Y = 0; $insured_new_female_18_19Y = 0; $insured_old_male_18_19Y = 0; $insured_old_female_18_19Y = 0; 
        $insured_new_male_20_34Y = 0; $insured_new_female_20_34Y = 0; $insured_old_male_20_34Y = 0; $insured_old_female_20_34Y = 0; 
        $insured_new_male_35_49Y = 0; $insured_new_female_35_49Y = 0; $insured_old_male_35_49Y = 0; $insured_old_female_35_49Y = 0; 
        $insured_new_male_50_59Y = 0; $insured_new_female_50_59Y = 0; $insured_old_male_50_59Y = 0; $insured_old_female_50_59Y = 0; 
        $insured_new_male_60_69Y = 0; $insured_new_female_60_69Y = 0; $insured_old_male_60_69Y = 0; $insured_old_female_60_69Y = 0; 
        $insured_new_male_70Y = 0; $insured_new_female_70Y = 0; $insured_old_male_70Y = 0; $insured_old_female_70Y = 0; 
        $insured_new_male_T = 0; $insured_new_female_T = 0; $insured_old_male_T = 0; $insured_old_female_T = 0;

        $cash_new_male_0_28D = 0; $cash_new_female_0_28D = 0; $cash_old_male_0_28D = 0; $cash_old_female_0_28D = 0;
        $cash_new_male_1_11M = 0; $cash_new_female_1_11M = 0; $cash_old_male_1_11M = 0; $cash_old_female_1_11M = 0; 
        $cash_new_male_1_4Y = 0; $cash_new_female_1_4Y = 0; $cash_old_male_1_4Y = 0; $cash_old_female_1_4Y = 0; 
        $cash_new_male_5_9Y = 0; $cash_new_female_5_9Y = 0; $cash_old_male_5_9Y = 0; $cash_old_female_5_9Y = 0; 
        $cash_new_male_10_14Y = 0; $cash_new_female_10_14Y = 0; $cash_old_male_10_14Y = 0; $cash_old_female_10_14Y = 0; 
        $cash_new_male_15_17Y = 0; $cash_new_female_15_17Y = 0; $cash_old_male_15_17Y = 0; $cash_old_female_15_17Y = 0; 
        $cash_new_male_18_19Y = 0; $cash_new_female_18_19Y = 0; $cash_old_male_18_19Y = 0; $cash_old_female_18_19Y = 0; 
        $cash_new_male_20_34Y = 0; $cash_new_female_20_34Y = 0; $cash_old_male_20_34Y = 0; $cash_old_female_20_34Y = 0; 
        $cash_new_male_35_49Y = 0; $cash_new_female_35_49Y = 0; $cash_old_male_35_49Y = 0; $cash_old_female_35_49Y = 0; 
        $cash_new_male_50_59Y = 0; $cash_new_female_50_59Y = 0; $cash_old_male_50_59Y = 0; $cash_old_female_50_59Y = 0; 
        $cash_new_male_60_69Y = 0; $cash_new_female_60_69Y = 0; $cash_old_male_60_69Y = 0; $cash_old_female_60_69Y = 0; 
        $cash_new_male_70Y = 0; $cash_new_female_70Y = 0; $cash_old_male_70Y = 0; $cash_old_female_70Y = 0; 
        $cash_new_male_T = 0; $cash_new_female_T = 0; $cash_old_male_T = 0; $cash_old_female_T = 0;

        $male_0_28D = 0; $female_0_28D = 0;
        $male_1_11M = 0; $female_1_11M = 0;
        $male_1_4Y = 0; $female_1_4Y = 0;
        $male_5_9Y = 0; $female_5_9Y = 0;
        $male_10_14Y = 0; $female_10_14Y = 0;
        $male_15_17Y = 0; $female_15_17Y = 0;
        $male_18_19Y = 0; $female_18_19Y = 0;
        $male_20_34Y = 0; $female_20_34Y = 0;
        $male_35_49Y = 0; $female_35_49Y = 0;
        $male_50_59Y = 0; $female_50_59Y = 0;
        $male_60_69Y = 0; $female_60_69Y = 0;
        $male_70Y = 0; $female_70Y = 0;
        $male_T = 0; $female_T = 0;

        $insured_new_male_0_28D = $this->generate_0_28D('new', 'male', 'yes', $this->month, $this->year);
        $insured_new_male_1_11M = $this->generate_1_11M('new', 'male', 'yes', $this->month, $this->year);
        $insured_new_male_1_4Y = $this->generate_YR('new', 'male', 'yes', $this->month, $this->year, 1, 4);
        $insured_new_male_5_9Y = $this->generate_YR('new', 'male', 'yes', $this->month, $this->year, 5, 9);
        $insured_new_male_10_14Y = $this->generate_YR('new', 'male', 'yes', $this->month, $this->year, 10, 14);
        $insured_new_male_15_17Y = $this->generate_YR('new', 'male', 'yes', $this->month, $this->year, 15, 17);
        $insured_new_male_18_19Y = $this->generate_YR('new', 'male', 'yes', $this->month, $this->year, 18, 19);
        $insured_new_male_20_34Y = $this->generate_YR('new', 'male', 'yes', $this->month, $this->year, 20, 34);
        $insured_new_male_35_49Y = $this->generate_YR('new', 'male', 'yes', $this->month, $this->year, 35, 49);
        $insured_new_male_50_59Y = $this->generate_YR('new', 'male', 'yes', $this->month, $this->year, 50, 59);
        $insured_new_male_60_69Y = $this->generate_YR('new', 'male', 'yes', $this->month, $this->year, 60, 69);
        $insured_new_male_70Y = $this->generate_70Y('new', 'male', 'yes', $this->month, $this->year);
        $insured_new_male_T = $this->generate_TX('new', 'male', 'yes', $this->month, $this->year);

        $insured_new_female_0_28D = $this->generate_0_28D('new', 'female', 'yes', $this->month, $this->year);
        $insured_new_female_1_11M = $this->generate_1_11M('new', 'female', 'yes', $this->month, $this->year);
        $insured_new_female_1_4Y = $this->generate_YR('new', 'female', 'yes', $this->month, $this->year, 1, 4);
        $insured_new_female_5_9Y = $this->generate_YR('new', 'female', 'yes', $this->month, $this->year, 5, 9);
        $insured_new_female_10_14Y = $this->generate_YR('new', 'female', 'yes', $this->month, $this->year, 10, 14);
        $insured_new_female_15_17Y = $this->generate_YR('new', 'female', 'yes', $this->month, $this->year, 15, 17);
        $insured_new_female_18_19Y = $this->generate_YR('new', 'female', 'yes', $this->month, $this->year, 18, 19);
        $insured_new_female_20_34Y = $this->generate_YR('new', 'female', 'yes', $this->month, $this->year, 20, 34);
        $insured_new_female_35_49Y = $this->generate_YR('new', 'female', 'yes', $this->month, $this->year, 35, 49);
        $insured_new_female_50_59Y = $this->generate_YR('new', 'female', 'yes', $this->month, $this->year, 50, 59);
        $insured_new_female_60_69Y = $this->generate_YR('new', 'female', 'yes', $this->month, $this->year, 60, 69);
        $insured_new_female_70Y = $this->generate_70Y('new', 'female', 'yes', $this->month, $this->year);
        $insured_new_female_T = $this->generate_TX('new', 'female', 'yes', $this->month, $this->year);

        $insured_old_male_0_28D = $this->generate_0_28D('old', 'male', 'yes', $this->month, $this->year);
        $insured_old_male_1_11M = $this->generate_1_11M('old', 'male', 'yes', $this->month, $this->year);
        $insured_old_male_1_4Y = $this->generate_YR('old', 'male', 'yes', $this->month, $this->year, 1, 4);
        $insured_old_male_5_9Y = $this->generate_YR('old', 'male', 'yes', $this->month, $this->year, 5, 9);
        $insured_old_male_10_14Y = $this->generate_YR('old', 'male', 'yes', $this->month, $this->year, 10, 14);
        $insured_old_male_15_17Y = $this->generate_YR('old', 'male', 'yes', $this->month, $this->year, 15, 17);
        $insured_old_male_18_19Y = $this->generate_YR('old', 'male', 'yes', $this->month, $this->year, 18, 19);
        $insured_old_male_20_34Y = $this->generate_YR('old', 'male', 'yes', $this->month, $this->year, 20, 34);
        $insured_old_male_35_49Y = $this->generate_YR('old', 'male', 'yes', $this->month, $this->year, 35, 49);
        $insured_old_male_50_59Y = $this->generate_YR('old', 'male', 'yes', $this->month, $this->year, 50, 59);
        $insured_old_male_60_69Y = $this->generate_YR('old', 'male', 'yes', $this->month, $this->year, 60, 69);
        $insured_old_male_70Y = $this->generate_70Y('old', 'male', 'yes', $this->month, $this->year);
        $insured_old_male_T = $this->generate_TX('old', 'male', 'yes', $this->month, $this->year);

        $insured_old_female_0_28D = $this->generate_0_28D('old', 'female', 'yes', $this->month, $this->year);
        $insured_old_female_1_11M = $this->generate_1_11M('old', 'female', 'yes', $this->month, $this->year);
        $insured_old_female_1_4Y = $this->generate_YR('old', 'female', 'yes', $this->month, $this->year, 1, 4);
        $insured_old_female_5_9Y = $this->generate_YR('old', 'female', 'yes', $this->month, $this->year, 5, 9);
        $insured_old_female_10_14Y = $this->generate_YR('old', 'female', 'yes', $this->month, $this->year, 10, 14);
        $insured_old_female_15_17Y = $this->generate_YR('old', 'female', 'yes', $this->month, $this->year, 15, 17);
        $insured_old_female_18_19Y = $this->generate_YR('old', 'female', 'yes', $this->month, $this->year, 18, 19);
        $insured_old_female_20_34Y = $this->generate_YR('old', 'female', 'yes', $this->month, $this->year, 20, 34);
        $insured_old_female_35_49Y = $this->generate_YR('old', 'female', 'yes', $this->month, $this->year, 35, 49);
        $insured_old_female_50_59Y = $this->generate_YR('old', 'female', 'yes', $this->month, $this->year, 50, 59);
        $insured_old_female_60_69Y = $this->generate_YR('old', 'female', 'yes', $this->month, $this->year, 60, 69);
        $insured_old_female_70Y = $this->generate_70Y('old', 'female', 'yes', $this->month, $this->year);
        $insured_old_female_T = $this->generate_TX('old', 'female', 'yes', $this->month, $this->year);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////
        $cash_new_male_0_28D = $this->generate_0_28D('new', 'male', 'no', $this->month, $this->year);
        $cash_new_male_1_11M = $this->generate_1_11M('new', 'male', 'no', $this->month, $this->year);
        $cash_new_male_1_4Y = $this->generate_YR('new', 'male', 'no', $this->month, $this->year, 1, 4);
        $cash_new_male_5_9Y = $this->generate_YR('new', 'male', 'no', $this->month, $this->year, 5, 9);
        $cash_new_male_10_14Y = $this->generate_YR('new', 'male', 'no', $this->month, $this->year, 10, 14);
        $cash_new_male_15_17Y = $this->generate_YR('new', 'male', 'no', $this->month, $this->year, 15, 17);
        $cash_new_male_18_19Y = $this->generate_YR('new', 'male', 'no', $this->month, $this->year, 18, 19);
        $cash_new_male_20_34Y = $this->generate_YR('new', 'male', 'no', $this->month, $this->year, 20, 34);
        $cash_new_male_35_49Y = $this->generate_YR('new', 'male', 'no', $this->month, $this->year, 35, 49);
        $cash_new_male_50_59Y = $this->generate_YR('new', 'male', 'no', $this->month, $this->year, 50, 59);
        $cash_new_male_60_69Y = $this->generate_YR('new', 'male', 'no', $this->month, $this->year, 60, 69);
        $cash_new_male_70Y = $this->generate_70Y('new', 'male', 'no', $this->month, $this->year);
        $cash_new_male_T = $this->generate_TX('new', 'male', 'no', $this->month, $this->year);

        $cash_new_female_0_28D = $this->generate_0_28D('new', 'female', 'no', $this->month, $this->year);
        $cash_new_female_1_11M = $this->generate_1_11M('new', 'female', 'no', $this->month, $this->year);
        $cash_new_female_1_4Y = $this->generate_YR('new', 'female', 'no', $this->month, $this->year, 1, 4);
        $cash_new_female_5_9Y = $this->generate_YR('new', 'female', 'no', $this->month, $this->year, 5, 9);
        $cash_new_female_10_14Y = $this->generate_YR('new', 'female', 'no', $this->month, $this->year, 10, 14);
        $cash_new_female_15_17Y = $this->generate_YR('new', 'female', 'no', $this->month, $this->year, 15, 17);
        $cash_new_female_18_19Y = $this->generate_YR('new', 'female', 'no', $this->month, $this->year, 18, 19);
        $cash_new_female_20_34Y = $this->generate_YR('new', 'female', 'no', $this->month, $this->year, 20, 34);
        $cash_new_female_35_49Y = $this->generate_YR('new', 'female', 'no', $this->month, $this->year, 35, 49);
        $cash_new_female_50_59Y = $this->generate_YR('new', 'female', 'no', $this->month, $this->year, 50, 59);
        $cash_new_female_60_69Y = $this->generate_YR('new', 'female', 'no', $this->month, $this->year, 60, 69);
        $cash_new_female_70Y = $this->generate_70Y('new', 'female', 'no', $this->month, $this->year);
        $cash_new_female_T = $this->generate_TX('new', 'female', 'no', $this->month, $this->year);

        $cash_old_male_0_28D = $this->generate_0_28D('old', 'male', 'no', $this->month, $this->year);
        $cash_old_male_1_11M = $this->generate_1_11M('old', 'male', 'no', $this->month, $this->year);
        $cash_old_male_1_4Y = $this->generate_YR('old', 'male', 'no', $this->month, $this->year, 1, 4);
        $cash_old_male_5_9Y = $this->generate_YR('old', 'male', 'no', $this->month, $this->year, 5, 9);
        $cash_old_male_10_14Y = $this->generate_YR('old', 'male', 'no', $this->month, $this->year, 10, 14);
        $cash_old_male_15_17Y = $this->generate_YR('old', 'male', 'no', $this->month, $this->year, 15, 17);
        $cash_old_male_18_19Y = $this->generate_YR('old', 'male', 'no', $this->month, $this->year, 18, 19);
        $cash_old_male_20_34Y = $this->generate_YR('old', 'male', 'no', $this->month, $this->year, 20, 34);
        $cash_old_male_35_49Y = $this->generate_YR('old', 'male', 'no', $this->month, $this->year, 35, 49);
        $cash_old_male_50_59Y = $this->generate_YR('old', 'male', 'no', $this->month, $this->year, 50, 59);
        $cash_old_male_60_69Y = $this->generate_YR('old', 'male', 'no', $this->month, $this->year, 60, 69);
        $cash_old_male_70Y = $this->generate_70Y('old', 'male', 'no', $this->month, $this->year);
        $cash_old_male_T = $this->generate_TX('old', 'male', 'no', $this->month, $this->year);

        $cash_old_female_0_28D = $this->generate_0_28D('old', 'female', 'no', $this->month, $this->year);
        $cash_old_female_1_11M = $this->generate_1_11M('old', 'female', 'no', $this->month, $this->year);
        $cash_old_female_1_4Y = $this->generate_YR('old', 'female', 'no', $this->month, $this->year, 1, 4);
        $cash_old_female_5_9Y = $this->generate_YR('old', 'female', 'no', $this->month, $this->year, 5, 9);
        $cash_old_female_10_14Y = $this->generate_YR('old', 'female', 'no', $this->month, $this->year, 10, 14);
        $cash_old_female_15_17Y = $this->generate_YR('old', 'female', 'no', $this->month, $this->year, 15, 17);
        $cash_old_female_18_19Y = $this->generate_YR('old', 'female', 'no', $this->month, $this->year, 18, 19);
        $cash_old_female_20_34Y = $this->generate_YR('old', 'female', 'no', $this->month, $this->year, 20, 34);
        $cash_old_female_35_49Y = $this->generate_YR('old', 'female', 'no', $this->month, $this->year, 35, 49);
        $cash_old_female_50_59Y = $this->generate_YR('old', 'female', 'no', $this->month, $this->year, 50, 59);
        $cash_old_female_60_69Y = $this->generate_YR('old', 'female', 'no', $this->month, $this->year, 60, 69);
        $cash_old_female_70Y = $this->generate_70Y('old', 'female', 'no', $this->month, $this->year);
        $cash_old_female_T = $this->generate_TX('old', 'female', 'no', $this->month, $this->year);

        $male_0_28D = $this->generate_0_28D_TY('male', $this->month, $this->year);
        $male_1_11M = $this->generate_1_11M_TY('male', $this->month, $this->year);
        $male_1_4Y = $this->generate_YR_TY('male', $this->month, $this->year, 1, 4);
        $male_5_9Y = $this->generate_YR_TY('male', $this->month, $this->year, 5, 9);
        $male_10_14Y = $this->generate_YR_TY('male', $this->month, $this->year, 10, 14);
        $male_15_17Y = $this->generate_YR_TY('male', $this->month, $this->year, 15, 17);
        $male_18_19Y = $this->generate_YR_TY('male', $this->month, $this->year, 18, 19);
        $male_20_34Y = $this->generate_YR_TY('male', $this->month, $this->year, 20, 34);
        $male_35_49Y = $this->generate_YR_TY('male', $this->month, $this->year, 35, 49);
        $male_50_59Y = $this->generate_YR_TY('male', $this->month, $this->year, 50, 59);
        $male_60_69Y = $this->generate_YR_TY('male', $this->month, $this->year, 60, 69);
        $male_70Y = $this->generate_70Y_TY('male', $this->month, $this->year);
        $male_T = $this->generate_TXY('male', $this->month, $this->year);

        $female_0_28D = $this->generate_0_28D_TY('female', $this->month, $this->year);
        $female_1_11M = $this->generate_1_11M_TY('female', $this->month, $this->year);
        $female_1_4Y = $this->generate_YR_TY('female', $this->month, $this->year, 1, 4);
        $female_5_9Y = $this->generate_YR_TY('female', $this->month, $this->year, 5, 9);
        $female_10_14Y = $this->generate_YR_TY('female', $this->month, $this->year, 10, 14);
        $female_15_17Y = $this->generate_YR_TY('female', $this->month, $this->year, 15, 17);
        $female_18_19Y = $this->generate_YR_TY('female', $this->month, $this->year, 18, 19);
        $female_20_34Y = $this->generate_YR_TY('female', $this->month, $this->year, 20, 34);
        $female_35_49Y = $this->generate_YR_TY('female', $this->month, $this->year, 35, 49);
        $female_50_59Y = $this->generate_YR_TY('female', $this->month, $this->year, 50, 59);
        $female_60_69Y = $this->generate_YR_TY('female', $this->month, $this->year, 60, 69);
        $female_70Y = $this->generate_70Y_TY('female', $this->month, $this->year);
        $female_T = $this->generate_TXY('female', $this->month, $this->year);

        $result = array("insured_new_male_0_28D"=>$insured_new_male_0_28D, "insured_new_female_0_28D"=>$insured_new_female_0_28D, "insured_old_male_0_28D"=>$insured_old_male_0_28D, "insured_old_female_0_28D"=>$insured_old_female_0_28D,
                        "insured_new_male_1_11M"=>$insured_new_male_1_11M, "insured_new_female_1_11M"=>$insured_new_female_1_11M, "insured_old_male_1_11M"=>$insured_old_male_1_11M, "insured_old_female_1_11M"=>$insured_old_female_1_11M, 
                        "insured_new_male_1_4Y"=>$insured_new_male_1_4Y, "insured_new_female_1_4Y"=>$insured_new_female_1_4Y, "insured_old_male_1_4Y"=>$insured_old_male_1_4Y, "insured_old_female_1_4Y"=>$insured_old_female_1_4Y, 
                        "insured_new_male_5_9Y"=>$insured_new_male_5_9Y, "insured_new_female_5_9Y"=>$insured_new_female_5_9Y, "insured_old_male_5_9Y"=>$insured_old_male_5_9Y, "insured_old_female_5_9Y"=>$insured_old_female_5_9Y, 
                        "insured_new_male_10_14Y"=>$insured_new_male_10_14Y, "insured_new_female_10_14Y"=>$insured_new_female_10_14Y, "insured_old_male_10_14Y"=>$insured_old_male_10_14Y, "insured_old_female_10_14Y"=>$insured_old_female_10_14Y, 
                        "insured_new_male_15_17Y"=>$insured_new_male_15_17Y, "insured_new_female_15_17Y"=>$insured_new_female_15_17Y, "insured_old_male_15_17Y"=>$insured_old_male_15_17Y, "insured_old_female_15_17Y"=>$insured_old_female_15_17Y, 
                        "insured_new_male_18_19Y"=>$insured_new_male_18_19Y, "insured_new_female_18_19Y"=>$insured_new_female_18_19Y, "insured_old_male_18_19Y"=>$insured_old_male_18_19Y, "insured_old_female_18_19Y"=>$insured_old_female_18_19Y, 
                        "insured_new_male_20_34Y"=>$insured_new_male_20_34Y, "insured_new_female_20_34Y"=>$insured_new_female_20_34Y, "insured_old_male_20_34Y"=>$insured_old_male_20_34Y, "insured_old_female_20_34Y"=>$insured_old_female_20_34Y, 
                        "insured_new_male_35_49Y"=>$insured_new_male_35_49Y, "insured_new_female_35_49Y"=>$insured_new_female_35_49Y, "insured_old_male_35_49Y"=>$insured_old_male_35_49Y, "insured_old_female_35_49Y"=>$insured_old_female_35_49Y, 
                        "insured_new_male_50_59Y"=>$insured_new_male_50_59Y, "insured_new_female_50_59Y"=>$insured_new_female_50_59Y, "insured_old_male_50_59Y"=>$insured_old_male_50_59Y, "insured_old_female_50_59Y"=>$insured_old_female_50_59Y, 
                        "insured_new_male_60_69Y"=>$insured_new_male_60_69Y, "insured_new_female_60_69Y"=>$insured_new_female_60_69Y, "insured_old_male_60_69Y"=>$insured_old_male_60_69Y, "insured_old_female_60_69Y"=>$insured_old_female_60_69Y, 
                        "insured_new_male_70Y"=>$insured_new_male_70Y, "insured_new_female_70Y"=>$insured_new_female_70Y, "insured_old_male_70Y"=>$insured_old_male_70Y, "insured_old_female_70Y"=>$insured_old_female_70Y, 
                        "insured_new_male_T"=>$insured_new_male_T, "insured_new_female_T"=>$insured_new_female_T, "insured_old_male_T"=>$insured_old_male_T, "insured_old_female_T"=>$insured_old_female_T,

                        "cash_new_male_0_28D"=>$cash_new_male_0_28D, "cash_new_female_0_28D"=>$cash_new_female_0_28D, "cash_old_male_0_28D"=>$cash_old_male_0_28D, "cash_old_female_0_28D"=>$cash_old_female_0_28D,
                        "cash_new_male_1_11M"=>$cash_new_male_1_11M, "cash_new_female_1_11M"=>$cash_new_female_1_11M, "cash_old_male_1_11M"=>$cash_old_male_1_11M, "cash_old_female_1_11M"=>$cash_old_female_1_11M, 
                        "cash_new_male_1_4Y"=>$cash_new_male_1_4Y, "cash_new_female_1_4Y"=>$cash_new_female_1_4Y, "cash_old_male_1_4Y"=>$cash_old_male_1_4Y, "cash_old_female_1_4Y"=>$cash_old_female_1_4Y, 
                        "cash_new_male_5_9Y"=>$cash_new_male_5_9Y, "cash_new_female_5_9Y"=>$cash_new_female_5_9Y, "cash_old_male_5_9Y"=>$cash_old_male_5_9Y, "cash_old_female_5_9Y"=>$cash_old_female_5_9Y, 
                        "cash_new_male_10_14Y"=>$cash_new_male_10_14Y, "cash_new_female_10_14Y"=>$cash_new_female_10_14Y, "cash_old_male_10_14Y"=>$cash_old_male_10_14Y, "cash_old_female_10_14Y"=>$cash_old_female_10_14Y, 
                        "cash_new_male_15_17Y"=>$cash_new_male_15_17Y, "cash_new_female_15_17Y"=>$cash_new_female_15_17Y, "cash_old_male_15_17Y"=>$cash_old_male_15_17Y, "cash_old_female_15_17Y"=>$cash_old_female_15_17Y, 
                        "cash_new_male_18_19Y"=>$cash_new_male_18_19Y, "cash_new_female_18_19Y"=>$cash_new_female_18_19Y, "cash_old_male_18_19Y"=>$cash_old_male_18_19Y, "cash_old_female_18_19Y"=>$cash_old_female_18_19Y, 
                        "cash_new_male_20_34Y"=>$cash_new_male_20_34Y, "cash_new_female_20_34Y"=>$cash_new_female_20_34Y, "cash_old_male_20_34Y"=>$cash_old_male_20_34Y, "cash_old_female_20_34Y"=>$cash_old_female_20_34Y, 
                        "cash_new_male_35_49Y"=>$cash_new_male_35_49Y, "cash_new_female_35_49Y"=>$cash_new_female_35_49Y, "cash_old_male_35_49Y"=>$cash_old_male_35_49Y, "cash_old_female_35_49Y"=>$cash_old_female_35_49Y, 
                        "cash_new_male_50_59Y"=>$cash_new_male_50_59Y, "cash_new_female_50_59Y"=>$cash_new_female_50_59Y, "cash_old_male_50_59Y"=>$cash_old_male_50_59Y, "cash_old_female_50_59Y"=>$cash_old_female_50_59Y, 
                        "cash_new_male_60_69Y"=>$cash_new_male_60_69Y, "cash_new_female_60_69Y"=>$cash_new_female_60_69Y, "cash_old_male_60_69Y"=>$cash_old_male_60_69Y, "cash_old_female_60_69Y"=>$cash_old_female_60_69Y, 
                        "cash_new_male_70Y"=>$cash_new_male_70Y, "cash_new_female_70Y"=>$cash_new_female_70Y, "cash_old_male_70Y"=>$cash_old_male_70Y, "cash_old_female_70Y"=>$cash_old_female_70Y, 
                        "cash_new_male_T"=>$cash_new_male_T, "cash_new_female_T"=>$cash_new_female_T, "cash_old_male_T"=>$cash_old_male_T, "cash_old_female_T"=>$cash_old_female_T,
                    
                        "male_0_28D"=>$male_0_28D, "female_0_28D"=>$female_0_28D,
                        "male_1_11M"=>$male_1_11M, "female_1_11M"=>$female_1_11M,
                        "male_1_4Y"=>$male_1_4Y, "female_1_4Y"=>$female_1_4Y,
                        "male_5_9Y"=>$male_5_9Y, "female_5_9Y"=>$female_5_9Y,
                        "male_10_14Y"=>$male_10_14Y, "female_10_14Y"=>$female_10_14Y,
                        "male_15_17Y"=>$male_15_17Y, "female_15_17Y"=>$female_15_17Y,
                        "male_18_19Y"=>$male_18_19Y, "female_18_19Y"=>$female_18_19Y,
                        "male_20_34Y"=>$male_20_34Y, "female_20_34Y"=>$female_20_34Y,
                        "male_35_49Y"=>$male_35_49Y, "female_35_49Y"=>$female_35_49Y,
                        "male_50_59Y"=>$male_50_59Y, "female_50_59Y"=>$female_50_59Y,
                        "male_60_69Y"=>$male_60_69Y, "female_60_69Y"=>$female_60_69Y,
                        "male_70Y"=>$male_70Y, "female_70Y"=>$female_70Y,
                        "male_T"=>$male_T, "female_T"=>$female_T);

        return $result;
    }

    function generate_0_28D($entryType, 
                            $sex, 
                            $nhisStatus, 
                            $month,
                            $year) {
        $count = 0;

        $result = DB::table('patients')->join('visits', function ($join) use ($entryType, $sex, $nhisStatus, $month, $year) {
            $join->on('patients.opd_number', '=', 'visits.opd_number')
                ->where('patients.sex', $sex)
                ->where('visits.entry_type', $entryType,)
                ->where('visits.nhis_status', $nhisStatus)
                ->whereMonth('visits.created_at', $month)
                ->whereYear('visits.created_at', $year);
        })->select('patients.date_of_birth')->get();

        foreach ($result as $dob) {
            $date = now();
            $today = $date->format("Y-m-d");
            $interval = strtotime($today) - strtotime($dob->date_of_birth);
            if (round($interval/86400) <= 28) {
                $count++;
            } 
        }

        return $count;
    }

    function generate_1_11M($entryType, 
                            $sex, 
                            $nhisStatus, 
                            $month,
                            $year) {
        $count = 0;

        $result = DB::table('patients')
            ->join('visits', 'visits.opd_number', '=', 'patients.opd_number')
            ->where('patients.sex', $sex)
            ->where('visits.entry_type', $entryType)
            ->where('visits.nhis_status', $nhisStatus)
            ->whereMonth('visits.created_at', $month)
            ->whereYear('visits.created_at', $year)
            ->select('patients.date_of_birth')->get();

        foreach ($result as $dob) {
            $date = now();
            $today = $date->format("Y-m-d");
            $year1 = date('Y', strtotime($dob->date_of_birth));
            $year2 = date('Y', strtotime($today));
            $month1 = date('m', strtotime($dob->date_of_birth));
            $month2 = date('m', strtotime($today));
            $interval = (($year2-$year1) * 12) + ($month2-$month1);
            if (round($interval) >= 1 && round($interval) <= 11) {
                $count++;
            }
        }

        return $count;
    }

    function generate_YR($entryType, 
                        $sex, 
                        $nhisStatus, 
                        $month,
                        $year,
                        $min,
                        $max) {
        $count = 0;
        // insured_new_male_0_28D 

        $result = DB::table('patients')
            ->join('visits', 'visits.opd_number', '=', 'patients.opd_number')
            ->where('patients.sex', $sex)
            ->where('visits.entry_type', $entryType)
            ->where('visits.nhis_status', $nhisStatus)
            ->whereMonth('visits.created_at', $month)
            ->whereYear('visits.created_at', $year)
            ->select('patients.date_of_birth')->get();

        foreach ($result as $dob) {
            $today = now();
            $date_of_birth = date('Y-m-d', strtotime($dob->date_of_birth));
            $interval = $today->diff($date_of_birth);
            if (round($interval->y) >= $min && round($interval->y) <= $max) {
                $count++;
            } 
        }

        return $count;
    }

    function generate_70Y($entryType, 
                            $sex, 
                            $nhisStatus, 
                            $month,
                            $year) {
        $count = 0;
        // insured_new_male_0_28D 

        $result = DB::table('patients')
            ->join('visits', 'visits.opd_number', '=', 'patients.opd_number')
            ->where('patients.sex', $sex)
            ->where('visits.entry_type', $entryType)
            ->where('visits.nhis_status', $nhisStatus)
            ->whereMonth('visits.created_at', $month)
            ->whereYear('visits.created_at', $year)
            ->select('patients.date_of_birth')->get();

        foreach ($result as $dob) {
            $today = now();
            $date_of_birth = date('Y-m-d', strtotime($dob->date_of_birth));
            $interval = $today->diff($date_of_birth);
            if (round($interval->y) >= 70) {
                $count++;
            }
        }

        return $count;
    }

    function generate_TX($entryType, 
                        $sex, 
                        $nhisStatus, 
                        $month,
                        $year) {
        $count = 0;
        // insured_new_male_0_28D 

        $result = DB::table('patients')
            ->join('visits', 'visits.opd_number', '=', 'patients.opd_number')
            ->where('patients.sex', $sex)
            ->where('visits.entry_type', $entryType)
            ->where('visits.nhis_status', $nhisStatus)
            ->whereMonth('visits.created_at', $month)
            ->whereYear('visits.created_at', $year)
            ->select('patients.date_of_birth')->get();

        foreach ($result as $dob) {
            $count++;
        }

        return $count;
    }

    function generate_0_28D_TY($sex,
                                $month,
                                $year) {
        $count = 0;

        $result = DB::table('patients')
            ->join('visits', 'visits.opd_number', '=', 'patients.opd_number')
            ->where('patients.sex', $sex)
            ->whereMonth('visits.created_at', $month)
            ->whereYear('visits.created_at', $year)
            ->select('patients.date_of_birth')->get();

        foreach ($result as $dob) {
            $date = now();
            $today = $date->format("Y-m-d");
            $interval = strtotime($today) - strtotime($dob->date_of_birth);
            if (round($interval/86400) <= 28) {
                $count++;
            } 
        }

        return $count;
    }

    function generate_1_11M_TY($sex,
                                $month,
                                $year) {
        $count = 0;

        $result = DB::table('patients')
            ->join('visits', 'visits.opd_number', '=', 'patients.opd_number')
            ->where('patients.sex', $sex)
            ->whereMonth('visits.created_at', $month)
            ->whereYear('visits.created_at', $year)
            ->select('patients.date_of_birth')->get();

        foreach ($result as $dob) {
            $date = now();
            $today = $date->format("Y-m-d");
            $year1 = date('Y', strtotime($dob->date_of_birth));
            $year2 = date('Y', strtotime($today));
            $month1 = date('m', strtotime($dob->date_of_birth));
            $month2 = date('m', strtotime($today));
            $interval = (($year2-$year1) * 12) + ($month2-$month1);
            if (round($interval) >= 1 && round($interval) <= 11) {
                $count++;
            } 
        }
        
        return $count;
    }

    function generate_YR_TY($sex, 
                            $month,
                            $year,
                            $min,
                            $max) {
        $count = 0;
        // insured_new_male_0_28D 

        $result = DB::table('patients')
            ->join('visits', 'visits.opd_number', '=', 'patients.opd_number')
            ->where('patients.sex', $sex)
            ->whereMonth('visits.created_at', $month)
            ->whereYear('visits.created_at', $year)
            ->select('patients.date_of_birth')->get();

        foreach ($result as $dob) {
            $today = now();
            $date_of_birth = date('Y-m-d', strtotime($dob->date_of_birth));
            $interval = $today->diff($date_of_birth);
            if (round($interval->y) >= $min && round($interval->y) <= $max) {
                $count++;
            }
        }
        
        return $count;
    }

    function generate_70Y_TY($sex, 
                            $month,
                            $year) {
        $count = 0;
        // insured_new_male_0_28D 

        $result = DB::table('patients')
            ->join('visits', 'visits.opd_number', '=', 'patients.opd_number')
            ->where('patients.sex', $sex)
            ->whereMonth('visits.created_at', $month)
            ->whereYear('visits.created_at', $year)
            ->select('patients.date_of_birth')->get();

        foreach ($result as $dob) {
            $today = now();
            $date_of_birth = date('Y-m-d', strtotime($dob->date_of_birth));
            $interval = $today->diff($date_of_birth);
            if (round($interval->y) >= 70) {
                $count++;
            } 
        }
        
        return $count;
    }

    function generate_TXY($sex, 
                        $month,
                        $year) {
        $count = 0;
        // insured_new_male_0_28D 

        $result = DB::table('patients')
            ->join('visits', 'visits.opd_number', '=', 'patients.opd_number')
            ->where('patients.sex', $sex)
            ->whereMonth('visits.created_at', $month)
            ->whereYear('visits.created_at', $year)
            ->select('patients.date_of_birth')->get();

        foreach ($result as $dob) {
            $count++;
        }
        
        return $count;
    }

    function getMonth($i) {
        $month = "";

        if ($i == '1') {
            $month = "January";
        } elseif ($i == '2') {
            $month = "February";
        } elseif ($i == '3') {
            $month = "March";
        } elseif ($i == '4') {
            $month = "April";
        } elseif ($i == '5') {
            $month = "May";
        } elseif ($i == '6') {
            $month = "June";
        } elseif ($i == '7') {
            $month = "July";
        } elseif ($i == '8') {
            $month = "August";
        } elseif ($i == '9') {
            $month = "September";
        } elseif ($i == '10') {
            $month = "October";
        } elseif ($i == '11') {
            $month = "November";
        } elseif ($i == '12') {
            $month = "December";
        }

        return $month;
    }

    function getMonths() {
        return array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    }
}
