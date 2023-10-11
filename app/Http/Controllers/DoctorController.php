<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::paginate(10);
        return view('doctors.index', compact('doctors'))->with('i', (request()->input('page', 1) -1) *5);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $doctors = Doctor::all();
        return view('doctors.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required',
            'special' => 'required'
        ]);

        $doctor = new Doctor();
        $doctor->tenBacSi = $validateData['name'];
        $doctor->chuyenKhoa = $validateData['special'];
        $doctor->save();
        Session::flash('success', 'Add new doctor successfull');
        return redirect()->route('doctors.index');
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
        //
        $doctor = Doctor::find($id);
        return view('doctors.edit', ['doctor' => $doctor], compact('doctor'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate([
            'name' => 'required',
            'special' => 'required'
        ]);

        $doctor = Doctor::find($id);
        $doctor->tenBacSi = $validateData['name'];
        $doctor->chuyenKhoa = $validateData['special'];
        $doctor->save();
        Session::flash('success', 'Edit info doctor successfull');
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $doctor = Doctor::find($id);
        $doctor->delete();
        Session::flash('success', 'Delete doctor successfull');
        return redirect()->route('doctors.index');
    }
}
