<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$patients = Patient::paginate(10);
        $patients = Patient::join('doctors', 'doctors.id', '=', 'patients.idBacSi')
        ->select('patients.*','doctors.tenBacSi as doctor_name')
        ->paginate(10);
        return view('patients.index', compact('patients'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $doctors = Doctor::all();
        return view('patients.add', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required',
            'date' => 'required',
            'symptom' => 'required',
            'nameDoctor' => 'required',
        ]);

        $doctor = Doctor::where('tenBacSi', $validateData['nameDoctor'])->first();

        $patient = new Patient();
        $patient->tenBenhNhan = $validateData['name'];
        $patient->ngayKham = $validateData['date'];
        $patient->trieuChung = $validateData['symptom'];
        $patient->idBacSi = $doctor->id;

        $patient->save();
        Session::flash('success', 'Add new patient sucessful');
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctors = Doctor::all();
        $patient = Patient::find($id);
        $doctor = Doctor::find($patient->idBacSi);
        return view('patients.edit', ['patient' => $patient], compact('doctors', 'doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate([
            'name' => 'required',
            'date' => 'required',
            'symptom' => 'required',
            'nameDoctor' => 'required',
        ]);

        $doctor = Doctor::where('tenBacSi', $validateData['nameDoctor'])->first();
        $patient = Patient::find($id);

        $patient->tenBenhNhan = $validateData['name'];
        $patient->ngayKham = $validateData['date'];
        $patient->trieuChung = $validateData['symptom'];
        $patient->idBacSi = $doctor->id;

        $patient->save();
        Session::flash('success', 'Edit info patient sucessful');
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $patient = Patient::find($id);
        $patient->delete();
        Session::flash('success', 'Delete patient sucessful');
        return redirect()->route('patients.index');
    }
}
