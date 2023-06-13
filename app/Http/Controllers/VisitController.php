<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visit;
use App\Models\Patient;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = array();

        $visits =  Visit::all();

        foreach ($visits as $visit) {
            $patient =  Patient::where('opd_number', $visit['opd_number'])->first();

            $data['visits'] = [
                'id' => $visit['id'],
                'entry_type' => $visit['entry_type'],
                'opd_number' => $visit['opd_number'],
                'firstname' => $patient['firstname'],
                'middlename' => $patient['middlename'],
                'lastname' => $patient['lastname'],
                'nhis_status' => $visit['nhis_status'],
                'nhis_number' => $visit['nhis_number'],
                'created_at' => $visit['created_at'],
            ];
        }

        return view('visits.index')->with('visits', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients =  Patient::all();

        return view('visits.add')->with('patients', $patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'entry_type' => 'required|min:3|max:3',
            'opd_number' => 'required|min:1',
            'nhis_status' => 'required|min:2|max:3',
            'nhis_number' => 'required_if:nhis_status,==,yes',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect('visit/add')->with('error', $errors->first());
        }

        if ($request->nhis_status == 'no') {
            $request->nhis_number = null;
        }

        $uniqueId = uniqid();

        $result = DB::table('visits')->insert([
            'unique_id' => $uniqueId,
            'entry_type' => $request->entry_type,
            'opd_number' => $request->opd_number,
            'nhis_status' => $request->nhis_status,
            'nhis_number' => $request->nhis_number,
            'created_at' => now()
        ]);

        if ($result > 0) {
            return redirect('visit/add')->with('success', "Visit has been added successfully");
        } else {
            return redirect('visit/add')->with('error', 'Sorry, visit was not added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if (session()->has('token') && session()->has('user')) {
        //     $array = array();

        //     // fetch bank details
        //     $request = Http::withHeaders([
        //         'Authorization' => 'Bearer '.session('token'),
        //         'Content-Type' => 'application/json',
        //     ])->post(env('API_URL').'/bank', [
        //         'user_uuid' => session('user')['uuid'],
        //         'uuid' => $id
        //     ]);

        //     $response = json_decode($request->getBody(), true);

        //     if ($response['error'] == false) {
        //         $array['bank'] = $response['data'];
        //     } else {
        //         if ($request->status() != 200) {
        //             abort($request->status());
        //         }
        //     }

        //     // fetch bank accounts
        //     $request = Http::withHeaders([
        //         'Authorization' => 'Bearer '.session('token'),
        //         'Content-Type' => 'application/json',
        //     ])->post(env('API_URL').'/bank/bankaccounts', [
        //         'user_uuid' => session('user')['uuid'],
        //         'uuid' => $id
        //     ]);

        //     $response = json_decode($request->getBody(), true);

        //     if ($response['error'] == false) {
        //         $array['bankAccounts'] = $response['data'];
        //     } else {
        //         if ($request->status() != 200) {
        //             abort($request->status());
        //         }
        //     }

        //     // fetch bank withdrawals
        //     $request = Http::withHeaders([
        //         'Authorization' => 'Bearer '.session('token'),
        //         'Content-Type' => 'application/json',
        //     ])->post(env('API_URL').'/bank/bankaccounts', [
        //         'user_uuid' => session('user')['uuid'],
        //         'uuid' => $id
        //     ]);

        //     $response = json_decode($request->getBody(), true);

        //     if ($response['error'] == false) {
        //         $array['bankAccounts'] = $response['data'];
        //     } else {
        //         if ($request->status() != 200) {
        //             abort($request->status());
        //         }
        //     }

        //     return view('banks.profile')->with($array);
        // } else {
        //     return redirect('login');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
