<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PresentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::all();
        return view('admin.presentation.index', compact('proposals'));
    }

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
        ->whereHas('statuses', function ($query) {
            $query->where('id', 'S05',)
            ->orWhere('id', 'S06');
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

    public function edit($id)
    {
        $proposals = Proposal::findOrFail($id);
        return view('admin.presentation.edit', compact('proposals'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'presentation_date' => ['date','required'],
        ]);

        $proposals = Proposal::findOrFail($id);
        $proposals->update([
            'presentation_date' => $request->presentation_date,
            'status_id' => 'S06',
        ]);

        return redirect()->route('presentation.index')->with('Data,', 'Data berhasil diperbarui.');
    }
}
