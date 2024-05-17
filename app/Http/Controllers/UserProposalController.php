<?php

namespace App\Http\Controllers;

use App\Models\FieldFocusResearch;
use App\Models\Proposal;
use App\Models\ResearchTypes;
use Illuminate\Http\Request;

class UserProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::all();
        return view('proposals.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $researchtypes = ResearchTypes::all();
        $fieldfocusresearch = FieldFocusResearch::all();
        $proposals = Proposal::all();
        return view('proposals.create', compact('researchtypes', 'fieldfocusresearch', 'proposals'));    
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
