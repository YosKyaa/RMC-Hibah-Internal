<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FinalisasiDanaController extends Controller
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
        return view('admin.fundsfinalization.index', compact( 'totalUsers', 'proposalCount', 'proposalApproved', 'proposalDisapprove'));
    }



    public function data(Request $request)
    {
        $data = Proposal::with(['users' => function ($query) {
            $query->select('id', 'username');
        }])
            ->with(['statuses' => function ($query) {
                $query->select('id', 'status', 'color');
            }])
            ->with(['researchType' => function ($query) {
                $query->select('id', 'title', 'total_funds');
            }])
            ->where('approval_reviewer', true)
            ->select('*')
            ->orderBy("id");

        return DataTables::of($data)
            ->filter(function ($instance) use ($request) {
                if (!empty($request->get('search'))) {
                    $search = $request->get('search');
                    $instance->where('name', 'LIKE', "%$search%");
                }
            })
            ->make(true);
    }

   public function datatables()
   {
       $proposals = Proposal::select('*');
       return DataTables::of($proposals)->make(true);
   }

    public function approve(Request $request)
    {
        $data = Proposal::find($request->id);
        if ($data) {
            $data->approval_admin_fundfinalization = true;
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
        if ($data) {
            $data->approval_admin_fundfinalization = false;
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
}
