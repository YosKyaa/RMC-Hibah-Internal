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
        return view('admin.fundsfinalization.index', compact('proposals'));
    }


    public function data(Request $request){
        // $this->authorize('setting/manage_data/department.read');
        $data = Proposal::with(['users' => function ($query) {
            $query->select('id','username');
        }])
        ->with(['statuses' => function ($query) {
            $query->select('id','status');
        }])
        ->with(['research_types' => function ($query) {
            $query->select('id','title','total_funds');
        }])
            ->select('*')->orderBy("id");
            return DataTables::of($data)
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('search'))) {
                            $search = $request->get('search');
                            $instance->where('name', 'LIKE', "%$search%");
                        }
                    })->make(true);
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
