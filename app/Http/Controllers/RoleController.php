<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct() {
        // $this->middleware('auth');
        $this->middleware('can:read role');
        // if(!Gate::allows('read role')){
        //     abort(404);
        // }
    }

    public function test()
    {
        //
        $user = User::find("1");
        $test = $user->syncRoles(['staff','admin']);
        var_dump($test);
    }

    public function index()
    {
        //
        $this->authorize('read role');
        // if(!Gate::allows('read role')){
        //     abort(404);
        // }
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('read role');
        return 'create page';
    }

    
    // public function create2()
    // {
    //     ////tidak kebaca di route resource
    //     $this->authorize('read role');
    //     return 'haha page';
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat
        $this->authorize('create role');
        return "store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan
        $this->authorize('create role');
        return "show by id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //menampilkan edit
        $this->authorize('update role');
        return "edit by id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //submit edit
        $this->authorize('update role');
        return "update by id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //hapus by id
        $this->authorize('delete role');
        return "destroy";
    }
}
