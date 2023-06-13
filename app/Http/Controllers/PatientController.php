<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = array();

        $patients =  Patient::all();
        if (!$patients) {
            // return response([
            //     'error' => true,
            //     'message' => 'No transaction type found'
            // ], 404);
        }

        // foreach ($visit as $visits) {
        //     $data[] = [
        //         'uuid' => $visit['uuid'],
        //         'name' => $visit['name'],
        //         'minimum_amount' => $visit['minimum_amount'],
        //         'maximum_amount' => $visit['maximum_amount'],
        //         'charge_type' => $visit['charge_type'],
        //         'charge_amount' => $visit['charge_amount'],
        //     ];
        // }
        // $array['visits'] = [];

        $data['patients'] = $patients;

        return view('patients.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opdNumber = $this->generateOPDNumber();

        return view('patients.add')->with('opdNumber', $opdNumber);
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
            'opd_number' => 'required|min:3',
            'firstname' => 'required|min:3',
            'middlename' => 'nullable|min:3',
            'lastname' => 'required|min:3',
            'sex' => 'required|min:4|max:6',
            'date_of_birth' => 'required|date|min:10|max:10',
            'phone' => 'required|min:10|max:10',
            'phone_emergency' => 'required|min:10|max:10',
            'address' => 'required|min:2',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect('patient/add')->with('error', $errors->first());
        }

        $uniqueId = uniqid();

        $result = DB::table('patients')->insert([
            'unique_id' => $uniqueId,
            'opd_number' => $request->opd_number,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'sex' => $request->sex,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'phone_emergency' => $request->phone_emergency,
            'address' => $request->address,
            'created_at' => now()
        ]);

        if ($result > 0) {
            return redirect('patients')->with('success', "Patient has been added successfully");
        } else {
            return redirect('patient/add')->with('error', 'Sorry, patient was not added');
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

    function generateOPDNumber() {
        $patient = Patient::latest()->first();

        if ($patient != null) {
            return $patient['opd_number'] + 1;
        } else {
            return 20000;
        }
    }
}
