<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Auth;

class ViceRector2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $NonVerifCount = Proposal::where('approval_vice_rector_2', false)
            ->where('approval_vice_rector_1', true)
            ->count();
        $VerifCount = Proposal::where('approval_vice_rector_2', true)->count();
        $proposals2 = Proposal::where('approval_vice_rector_1', true)
        ->with(['documents' => function ($query) {
            $query->select('id', 'proposals_id', 'proposal_doc', 'doc_type_id', 'created_by');
        }])
        ->latest()->filter(request(['search']))->paginate(9);
        $Total = Proposal::where('approval_vice_rector_1', true)
        ->with(['documents' => function ($query) {
            $query->select('id', 'proposals_id', 'proposal_doc', 'doc_type_id', 'created_by');
        }])->count();
        return view('vicerector2.index', compact('proposals2','NonVerifCount','VerifCount','Total'));
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
    public function approve(Request $request)
    {
        $data = Proposal::find($request->id);
        if($data) {
            $data->approval_vice_rector_2 = true;
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
            $data->approval_vice_rector_2 = false;
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

    public function transfer_receipt ($id)
    {
        $proposals = Proposal::findOrFail($id);
        $pdf = PDF::loadView('proposals.print', compact('proposals'));
        $pdf->save(public_path('proposal.pdf'));
        $documentUrl = asset('proposal.pdf');
        $documentPath = public_path('proposal.pdf');
        return view('vicerector2.transfer_receipt', compact('proposals', 'documentUrl', 'documentPath'));
    }

    public function transfer_receipt_update (Request $request, $id)
    {
       $request->validate([
            'proposal_doc' => 'required|file|mimes:png,jpg,pdf|max:5120',
        ]);
        $fileName = "";
        if ($request->hasFile('proposal_doc')) {
            $ext = $request->proposal_doc->extension();
            $name = str_replace(' ', '_', $request->proposal_doc->getClientOriginalName());
            $fileName = Auth::user()->id . '_' . $name;
            $folderName = "storage/FILE/receipt_1/" . Carbon::now()->format('Y/m');
            $path = public_path() . "/" . $folderName;
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true); //create folder
            }
            $upload = $request->proposal_doc->move($path, $fileName); //upload file to folder
            if ($upload) {
                $fileName = $folderName . "/" . $fileName;
            } else {
                $fileName = "";
            }
        }

        $proposals = Proposal::findOrFail($id);
        $proposals->update([
            'status_id' => 'S08',
        ]);
        Documents::create([
            'proposals_id' => $proposals->id,
            'proposal_doc' => $fileName,
            'doc_type_id' => 'DC3',
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('vicerector2.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function transfer_receipt2 ($id)
    {
        $proposals = Proposal::findOrFail($id);
        $documentPath = $proposals->documents->where('doc_type_id', 'DC5')->first()->proposal_doc;
        $documentUrl = url($documentPath);
        return view('vicerector2.transfer_receipt2', compact('proposals', 'documentUrl', 'documentPath'));
    }

    public function transfer_receipt2_update (Request $request, $id)
    {
       $request->validate([
            'proposal_doc' => 'required|file|mimes:png,jpg,pdf|max:5120',
        ]);
        $fileName = "";
        if ($request->hasFile('proposal_doc')) {
            $ext = $request->proposal_doc->extension();
            $name = str_replace(' ', '_', $request->proposal_doc->getClientOriginalName());
            $fileName = Auth::user()->id . '_' . $name;
            $folderName = "storage/FILE/receipt_2/" . Carbon::now()->format('Y/m');
            $path = public_path() . "/" . $folderName;
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true); //create folder
            }
            $upload = $request->proposal_doc->move($path, $fileName); //upload file to folder
            if ($upload) {
                $fileName = $folderName . "/" . $fileName;
            } else {
                $fileName = "";
            }
        }

        $proposals = Proposal::findOrFail($id);
        $proposals->update([
            'status_id' => 'S10',
        ]);
        Documents::create([
            'proposals_id' => $proposals->id,
            'proposal_doc' => $fileName,
            'doc_type_id' => 'DC4',
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('vicerector2.index')->with('success', 'Data berhasil diperbarui.');
    }

}
