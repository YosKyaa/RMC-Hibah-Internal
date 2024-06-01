<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reviewers.index');
    }


    /**
     * Get the data for DataTables.
     */
    public function data(Request $request)
    {
        $reviewerId = $request->user()->id;
        $data = Proposal::where('reviewer_id', $reviewerId)
            ->with([
                'users' => function ($query) {
                    $query->select('id', 'username');
                },
                'statuses' => function ($query) {
                    $query->select('id', 'status', 'color');
                },
                'reviewer' => function ($query) {
                    $query->select('id', 'username');
                },
                'proposalTeams.researcher' => function ($query) {
                    $query->select('id', 'username');
                }
            ])
            ->orderBy('id')
            ->get();

        return DataTables::of($data)
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('search'))) {
                    $search = $request->get('search');
                    $query->where('research_title', 'LIKE', "%$search%")
                        ->orWhereHas('users', function ($query) use ($search) {
                            $query->where('username', 'LIKE', "%$search%");
                        });
                }
            })
            ->make(true);
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
