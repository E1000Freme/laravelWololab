<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Patient as Patient;
use App\Model\Role as Role;
use App\Model\User as User;

class PatientController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$patients = Role::with('users')->where('name', 'patient')->first()->users()->paginate(10);
        return view('patient.pindex')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	  $this->validate($request, [
        'pName' 	=> 'required|max:255',
		'pSex'		=> 'required|max:255|in:male,female',
		'pAddress'	=> 'required|max:255',
		'pPostcode'	=> 'required|max:255',
		'pPhone'	=> 'required|max:20|unique:patients,phone',
		'pPwd'		=> 'required|max:8'

    		]);

        $pUser = new User;
        $pUser->name = $request->pName;
        $pUser->password = bcrypt($request->pPwd);
        $pUser->save();
        $pUser->attachRole(Role::where('name', 'patient')->first());

    	$newPatient = new Patient;
        $newPatient->user_id     = $pUser->id;
    	$newPatient->sex		= $request->pSex;
    	$newPatient->address	= $request->pAddress;
    	$newPatient->postcode	= $request->pPostcode;
    	$newPatient->phone		= $request->pPhone;
    	// $newPatient->password	= $request->pPwd;

        //TODO: send pwd to patient
    	$newPatient->save();

        return redirect()->route('patient.show', ['id' => $newPatient->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('patient.show')->with('patient', Patient::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('patient.edit')->with('patient', Patient::find($id));
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

    	$patient = Patient::find($id);

    	$patient->name		= $request->pName;
    	$patient->sex		= $request->pSex;
    	$patient->address	= $request->pAddress;
    	$patient->postcode	= $request->pPostcode;
    	$patient->phone		= $request->pPhone;

    	$patient->save();

        return $patient;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$patient = Patient::find($id);
    	$patientName = $patient->name;
        //Patient::destroy($id);
        return redirect()->route('patient.create');/*, ['pName' => $patientName]);*/
    }
}