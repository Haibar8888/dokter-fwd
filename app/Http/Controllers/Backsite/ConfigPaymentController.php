<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//request validation form
use App\Http\Requests\ConfigPayment\UpdateConfigPaymentRequest;

// sweet alert
use RealRashid\SweetAlert\Facades\Alert;

// models
use App\Models\MasterData\ConfigPayment;

class ConfigPaymentController extends Controller
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
        //
        $config_payment = ConfigPayment::all();
        return view('pages.backsite.master-data.config-payment.index', compact('config_payment'));
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
    public function store(Request $request)
    {
        //
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigPayment $config_payment)
    {
        //
        return view('pages.backsite.master-data.config-payment.index', compact('config_payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConfigPaymentRequest $request, ConfigPayment $config_payment)
    {
        //
        $data = $request->all();

        $config_payment->update($data);

        alert()->success('Success Message', 'Data berhasil diupdate');
        return redirect()->route('backsite.config-payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfigPayment $config_payment)
    {
        //
        return abort(404);
    }
}
