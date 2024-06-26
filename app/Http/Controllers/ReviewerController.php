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
        $status1 = 'S02';
        $status2 = 'S05';
        $dataCount = Proposal::where('status_id', $status1)->count();
        $dataCount2 = Proposal::where('status_id', $status2)->count();

        return view('reviewers.index', compact('dataCount', 'dataCount2'));
    }

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
                },
                'documents' => function ($query) {
                    $query->select('id', 'proposals_id','proposal_doc', 'doc_type_id', 'created_by');
                },
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

    public function presentation(Request $request)
    {
        $data = Proposal::find($request->id);
        if($data) {
            $data->status_id = 'S05'; // Set the status to 'S05'
            $data->save(); // Save the changes to the database
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status!'
            ]);
        }
    }

    public function approve(Request $request)
    {
        $data = Proposal::find($request->id);
        if($data) {
            $data->approval_reviewer = true;
            $data->status_id = 'S07';
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status!'
            ]);
        }
    }

    public function disapprove(Request $request)
    {
        $data = Proposal::find($request->id);
        if($data) {
            $data->approval_reviewer = false;
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status!'
            ]);
        }
    }

    public function reject(Request $request)
    {
        $data = Proposal::find($request->id);
        if($data) {
            $data->status_id = 'S04';
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status!'
            ]);
        }
    }
    public function revision($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('reviewers.revision', compact('proposal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'review_notes' => ['required', 'string'],
        ]);

        $proposal = Proposal::findOrFail($id);
        $proposal->update([
            'review_notes' => $request->review_notes,
            'status_id' => 'S03',
        ]);

        return redirect()->route('reviewers.index')->with('success', 'Catatan revisi berhasil disimpan.');
    }
}



