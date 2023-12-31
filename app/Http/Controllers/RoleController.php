<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create role')->only('create');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $dataTable)
    {
        $this->authorize('read role');
        return $dataTable->render('configuration.roles');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create role';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Role $role)
    {
        return view('configuration.roles-action', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        dd($request->all());
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Updated data successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
