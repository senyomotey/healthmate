<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\Visit;

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

        foreach ($patients as $patient) {
            $visit =  Visit::where('opd_number', $patient['opd_number'])->latest()->first();

            $data['patients'] = [
                'id' => $patient['id'],
                'unique_id' => $patient['unique_id'],
                'opd_number' => $patient['opd_number'],
                'firstname' => $patient['firstname'],
                'middlename' => $patient['middlename'],
                'lastname' => $patient['lastname'],
                'sex' => $patient['sex'],
                'date_of_birth' => $patient['date_of_birth'],
                'phone' => $patient['phone'],
                'phone_emergency' => $patient['phone_emergency'],
                'address' => $patient['address'],
                'created_at' => $patient['created_at'],
                'last_visit' => $visit['created_at'],
            ];
        }

        return view('patients.index')->with('patients', $data);
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
        $patient =  Patient::where('unique_id', $id)->first();

        return view('patients.edit')->with('patient', $patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'unique_id' => 'required|min:3',
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

            return redirect('patient/edit', ['id' => $request->unique_id])->with('error', $errors->first());
        }

        $patient = Patient::where('unique_id', $request->unique_id)->first();
        if (!$patient) {
            return redirect('patients')->with('error', 'Sorry, patient was not found');
        } else {
            $patient->unique_id = $request->unique_id;
            $patient->opd_number = $request->opd_number;
            $patient->firstname = $request->firstname;
            $patient->middlename = $request->middlename;
            $patient->lastname = $request->lastname;
            $patient->sex = $request->sex;
            $patient->date_of_birth = $request->date_of_birth;
            $patient->phone = $request->phone;
            $patient->phone_emergency = $request->phone_emergency;
            $patient->address = $request->address;
            $patient->updated_at = now();

            $result = $patient->save();

            if ($result) {
                return redirect('patients')->with('success', "Patient has been updated successfully");
            } else {
                return redirect('patient/edit', ['id' => $request->unique_id])->with('error', 'Sorry, patient was not updated');
            }
        }
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
