<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use PDF;

class LoaController extends Controller
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
        return view('admin.loa.index', compact( 'totalUsers', 'proposalCount', 'proposalApproved', 'proposalDisapprove'));
    }

    public function data(Request $request){
        // $this->authorize('setting/manage_data/department.read');
        $data = Proposal::with(['users' => function ($query) {
            $query->select('id','username');
        }])
        ->with(['statuses' => function ($query) {
            $query->select('id','status','color');
        }])
        ->with(['researchType' => function ($query) {
            $query->select('id','title','total_funds');
        }])
        ->where('status_id', '!=', 'S04') // Exclude status S04
        ->where('approval_admin_fundfinalization', true) // Filter by approval_admin_fundfinalization
        ->select('*')->orderBy("id");

        return DataTables::of($data)
            ->filter(function ($instance) use ($request) {
                if (!empty($request->get('search'))) {
                    $search = $request->get('search');
                    $instance->where('name', 'LIKE', "%$search%");
                }
            })->make(true);
    }


    public function print_contract($id)
    {
        $proposals = Proposal::findOrFail($id);
        $pdf = PDF::loadView('proposals.print', compact('proposals'));
        return $pdf->stream('proposal.pdf');
    }

    public function transfer_receipt_update (Request $request)
    {
        $data = Proposal::find($request->id);
        if($data) {
            $data->transfer_receipt = $request->transfer_receipt;
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