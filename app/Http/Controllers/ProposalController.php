<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposalApproved = Proposal::where('approval_reviewer', true)->count();
        $proposalDisapprove = Proposal::where('status_id', '=', "S04")->count();
        $proposalCount = Proposal::count();
        $lecturers = User::role('lecture')->get();
        $reviewers = User::role('reviewer')->get();
        $totalUsers = $lecturers->concat($reviewers)->count();
        return view('admin.index', compact( 'totalUsers', 'proposalCount', 'proposalApproved', 'proposalDisapprove'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function data(Request $request) {
        // $this->authorize('setting/manage_data/department.read');
        $data = Proposal::with([
            'users' => function ($query) {
                $query->select('id', 'username');
            },
            'statuses' => function ($query) {
                $query->select('id', 'status', 'color');
            },
            'reviewer' => function ($query) {
                $query->select('id', 'username');
            },
            'researchTopic.researchTheme.researchCategory' => function ($query) {
                $query->select('id', 'name');
            },
            'tktType' => function ($query) {
                $query->select('id', 'title');
            },
            'mainResearchTarget' => function ($query) {
                $query->select('id', 'title');
            },
            'proposalTeams.researcher' => function ($query) {
                $query->select('id', 'username');
            },
            'documents' => function ($query) {
                $query->select('id', 'proposals_id','proposal_doc', 'doc_type_id', 'created_by');
            },
        ])
        ->select('*')
        ->orderBy('id');
        return DataTables::of($data)
            ->filter(function ($instance) use ($request) {
            if (!empty($request->get('search'))) {
                $search = $request->get('search');
                $instance->where(function ($query) use ($search) {
                $query->where('research_title', 'LIKE', "%$search%")
                    ->orWhereHas('users', function ($query) use ($search) {
                    $query->where('username', 'LIKE', "%$search%");
                    });
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
}
