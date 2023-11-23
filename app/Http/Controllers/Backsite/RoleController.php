<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//request validation form
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;

// sweet alert
use RealRashid\SweetAlert\Facades\Alert;

// models
use App\Models\ManagementAccess\Role;
use App\Models\ManagementAccess\Permision;

class RoleController extends Controller
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
        $role = Role::orderBy('created_at', 'desc')->get();
        return view('pages.backsite.management-access.role.index');
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
    public function store(StoreRoleRequest $request)
    {
        //
        $data = $request->all();
        $role = Role::create($data);

        alert()->success('Success Message', 'Data berhasil ditambahkan');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $role->load('permision');
        return view('pages.backsite.management-access.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $permision = Permision::all();

        $role->load('permision');

        return view('pages.backsite.managemen-access.role.edit', compact('role', 'permision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
        $data = $request->all();

        $role->update($data);
        $role->permision()->sync($request->input('permision', []));

        alert()->success('Success Message', 'Data berhasil diupdate');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->forceDelete();
        alert()->success('Sucesss Message', 'Data berhasil dihapus');
        return back();
    }
}
