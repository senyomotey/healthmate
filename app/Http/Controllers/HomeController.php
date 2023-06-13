<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Patient;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $totalPatients =  Patient::count();
        $totalVisits =  Visit::count();
        $totalVisitsInsured =  Visit::where('nhis_status', 'yes')->count();
        $totalVisitsUninsured =  Visit::where('nhis_status', 'no')->count();
        $totalPatientsMale =  Patient::where('sex', 'male')->count();
        $totalPatientsFemale =  Patient::where('sex', 'female')->count();
        $totalVisitsNew =  Visit::where('entry_type', 'new')->count();
        $totalVisitsOld =  Visit::where('entry_type', 'old')->count();

        $array = [
            "totalPatients" => $totalPatients,
            "totalVisits" => $totalVisits,
            "totalVisitsInsured" => $totalVisitsInsured,
            "totalVisitsUninsured" => $totalVisitsUninsured,
            "totalPatientsMale" => $totalPatientsMale,
            "totalPatientsFemale" => $totalPatientsFemale,
            "totalVisitsNew" => $totalVisitsNew,
            "totalVisitsOld" => $totalVisitsOld,
        ];

        return view('home')->with($array);
    }
}
