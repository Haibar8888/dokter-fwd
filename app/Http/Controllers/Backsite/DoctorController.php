<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//request validation form
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;

// sweet alert
use RealRashid\SweetAlert\Facades\Alert;

// models
use App\Models\Operational\Doctor;
use App\Models\MasterData\Specialist;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        //for table
        $doctor = Doctor::orderBy('created_at', 'desc')->get();

        //for select2
        $specialist = Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.doctor.index', compact('doctor', 'specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        //$data untuk menampung semua request
        $data = $request->all();

        // store data ke databases
        $doctor = Doctor::create($data);

        alert()->success('Success Message', 'Data berhasil ditambahkan');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //for select2
        $specialist = Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
        $data = $request->all();

        $doctor->update($data);

        alert()->success('Success Message', 'Data berhasil diupdate');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
        $doctor->delete();

        alert()->success('Sucesss Message', 'Data berhasil dihapus');
        return back();
    }
}
