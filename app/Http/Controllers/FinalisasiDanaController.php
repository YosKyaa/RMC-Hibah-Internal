<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FinalisasiDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::all();
        return view('admin.proposals.dana', compact('proposals'));
    }

    public function data(Request $request)
    {
        // Lakukan join dengan tabel users dan statuses untuk mendapatkan nama pengguna dan status
        $data = Proposal::select('proposals.*', 'users.name as username', 'statuses.status as status_name', 'research_types.title as research_type', 'research_types.total_funds as totaldana')
                        ->join('users', 'proposals.users_id', '=', 'users.id')
                        ->join('statuses', 'proposals.status_id', '=', 'statuses.id')
                        ->join('research_types', 'proposals.research_types_id', '=', 'research_types.id')
                        ->join('research_types', 'proposals.research_types_id', '=', 'research_types.id')
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
       $proposals = Proposal::select('*');
       return DataTables::of($proposals)->make(true);
   }
    /**
     * Show the form for creating a new resource.
     */
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
