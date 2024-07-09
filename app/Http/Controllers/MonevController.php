<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class MonevController extends Controller
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
        return view('admin.monev.index', compact( 'totalUsers', 'proposalCount', 'proposalApproved', 'proposalDisapprove'));
    }

    public function data(Request $request)
    {
        $data = Proposal::with([
                'users' => function ($query) {
                    $query->select('id', 'name');
                },
                'researchType' => function ($query) {
                    $query->select('id', 'title');
                },
                'researchTopic' => function ($query) {
                    $query->select('id', 'name');
                },
            ])
            ->select('*')
            ->whereHas('documents', function ($query) {
                $query->where('doc_type_id', 'DC5');
            })
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

    public function print_monev($id)
    {
        $proposal = Proposal::findOrFail($id);
        $documentPath = $proposal->documents->where('doc_type_id', 'DC5')->first()->proposal_doc;
        $documentUrl = url($documentPath);
        return response()->download($documentPath);
    }

}

