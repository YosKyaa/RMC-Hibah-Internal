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

    public function delete(Request $request){
        $data = Proposal::find($request->id);
        if($data){
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil dihapus!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal dihapus!'
            ]);
        }
    }
    public function presentation(Request $request)
    {}


}
