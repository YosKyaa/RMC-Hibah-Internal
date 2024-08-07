<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class ViceRector1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $NonVerifCount = Proposal::where('approval_vice_rector_1', false)
            ->where('approval_admin_fundfinalization', true)
            ->count();
        $VerifCount = Proposal::where('approval_vice_rector_1', true)->count();
        $totalAdminFundApproval = Proposal::where('approval_admin_fundfinalization', true)->count();
        $proposals = Proposal::where('approval_admin_fundfinalization', true)->latest()->filter(request(['search']))->paginate(9);
        return view('vicerector1.index', compact('proposals','NonVerifCount','VerifCount','totalAdminFundApproval'));
    }

    public function show($id)
    {
        $proposals = Proposal::with([
            'proposalTeams.researcher' => function ($query) {
            $query->select('id', 'username', 'image');
            },

            'reviewer' => function ($query) {
                $query->select('id', 'username', 'image');
            },
        ])->findOrFail($id);
        $documentPath = $proposals->documents->first()->proposal_doc;
        $documentUrl = url($documentPath);
        $user = User::select('image');
        return view('proposals.show', compact('proposals', 'documentUrl', 'user'));
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
            'proposalTeams.researcher' => function ($query) {
                $query->select('id', 'username');
            }
        ])
        ->select('*')
        ->where('approval_reviewer', true)
        ->orderBy('id')
        ->get();

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

    public function approve(Request $request)
    {
        $data = Proposal::find($request->id);
        if($data) {
            $data->approval_vice_rector_1 = true;
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
            $data->approval_vice_rector_1 = false;
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
    public function print_contract($id)
    {
        $proposals = Proposal::findOrFail($id);
        $pdf = PDF::loadView('proposals.print', compact('proposals'));
        return $pdf->stream('proposal.pdf');
    }
}
