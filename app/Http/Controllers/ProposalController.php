<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::all();
        return view('admin.addreviewer.index', compact('proposals'));
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

    public function edit($id)
    {
        $users = User::all();
        $proposals = Proposal::findOrFail($id);
        return view('admin.addreviewer.edit', compact('proposals','users'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'review_date_start' => ['date','required'],
            'review_date_end' => ['date','required'],
            'reviewer_id' => 'required|exists:users,id',
        ]);

        $proposals = Proposal::findOrFail($id);
        $proposals->update([
            'review_date_start' => $request->review_date_start,
            'review_date_end' => $request->review_date_end,
            'reviewer_id' => $request->reviewer_id,
            'status_id' => 'S02'
        ]);

        // Assign reviewer role
        $reviewer = User::findOrFail($request->reviewer_id);
        $reviewer->assignRole('reviewer');

        return redirect()->route('proposals.index')->with('Data,', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
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
}
