<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::all();
        return view('admin.proposals.index', compact('proposals'));
    }

    public function dana()
    {
        $proposals = Proposal::all();
        return view('data.proposals.dana', compact('proposals'));
    }

    public function loa()
    {
        $proposals = Proposal::all();
        return view('data.proposals.loa', compact('proposals'));
    }

    public function monev()
    {
        $proposals = Proposal::all();
        return view('data.proposals.monev', compact('proposals'));
    }
    /**
     * Show the form for creating a new resource.
     */

     public function data(Request $request)
     {
         // Lakukan join dengan tabel users dan statuses untuk mendapatkan nama pengguna dan status
         $data = Proposal::select('proposals.*', 'users.name as username', 'statuses.status as status_name')
                         ->join('users', 'proposals.users_id', '=', 'users.id')
                         ->join('statuses', 'proposals.status_id', '=', 'statuses.id')
                         ->orderBy('proposals.id');

         return DataTables::of($data)
             ->filter(function ($instance) use ($request) {
                 if (!empty($request->get('search'))) {
                     $search = $request->get('search');
                     $instance->where(function($query) use ($search) {
                         $query->where('proposals.name', 'LIKE', "%$search%")
                               ->orWhere('users.name', 'LIKE', "%$search%")
                               ->orWhere('statuses.status', 'LIKE', "%$search%");
                     });
                 }
             })
             ->make(true);
     }
    public function datatables()
    {
        $departement = Proposal::select('*');
        return DataTables::of($departement)->make(true);
    }

    public function create()
    {
        //
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
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proposal $proposal)
    {
        //
    }
}
