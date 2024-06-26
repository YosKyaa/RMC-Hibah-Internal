<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\CategoryResearch;
use App\Models\FieldFocusResearch;
use App\Models\MainResearchTarget;
use App\Models\Proposal;
use App\Models\Documents;
use App\Models\ProposalTeams;
use App\Models\ResearchCategories;
use App\Models\ResearchTeam;
use App\Models\ResearchThemes;
use App\Models\ResearchTopics;
use App\Models\ResearchTypes;
use App\Models\Status;
use App\Models\TktTypes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Auth;
use PDF;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use DB;

class UserProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            $userproposal = Auth::user()->id;
            $proposals = Proposal::where('users_id', $userproposal)->get();
            return view('proposals.index', compact('proposals','userproposal'));
    }


    public function data(Request $request)
    {
        $userproposal = Auth::user()->id;
        $data = Proposal::where('users_id', $userproposal)
            ->with([
                'users' => function ($query) {
                    $query->select('id', 'username');
                },
                'statuses' => function ($query) {
                    $query->select('id', 'status', 'color');
                },
                'researchType' => function ($query) {
                    $query->select('id', 'title');
                },
                'researchTopic' => function ($query) {
                    $query->select('id', 'name');
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

    public function getResearchThemeById(Request $request)
    {
        $themes = ResearchThemes::where('research_category_id', $request->id)->get();
        return response()->json($themes);
    }

    public function getResearchTypeFunds($researchtypesId)
    {
        $funds = ResearchTypes::findOrFail($researchtypesId);
        return response()->json(['total_funds' => $funds->total_funds]);
    }


    public function getResearchTopicById(Request $request)
    {
        $topics = ResearchTopics::where('research_theme_id', $request->id)->get();
        return response()->json($topics);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $existingProposal = Proposal::where('users_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        if ($existingProposal) {
            if ($existingProposal->status_id == 'S04') {
            // Allow creating a new proposal
            } else {
            return redirect()->route('user-proposals.index')->with('proposals', 'You have already created a proposal.');
            }
        }

        if ($request->isMethod('POST')) {
            // dd($request->all());
            $this->validate($request, [
            'research_type' => 'required|exists:research_types,id',
            'research_categories' => 'required|exists:research_categories,id',
            'research_themes' => 'required|exists:research_themes,id',
            'research_topics' => 'required|exists:research_topics,id',
            'research_title' => 'required|string|max:255',
            'tkt_type' => 'required|exists:tkt_types,id',
            'main_research_target' => 'required|exists:main_research_targets,id',
            // 'document' => 'required|mimes:pdf|max:10000', // max 10MB
            'researcher_id' => 'required|array',
            'researcher_id.*' => 'exists:users,id',
            'proposal_doc' => 'required|mimes:pdf|max:10000', // max 10MB
            ]);



            // Create new proposal
            $data = Proposal::create([
            'users_id' => Auth::user()->id,
            'research_types_id' => $request->research_type,
            'research_topics_id' => $request->research_topics,
            'research_title' => $request->research_title,
            'tkt_types_id' => $request->tkt_type,
            'main_research_targets_id' => $request->main_research_target,
            'notes' => $request->notes ?? '',
            'status_id' => "S00",
            ]);

            // Add research team members
            foreach ($request->researcher_id as $researcher_id) {

            ProposalTeams::create([
                'proposals_id' => $data->id,
                'researcher_id' => $researcher_id,
            ]);
            }

            $fileName = "";
            if ($request->hasFile('proposal_doc')) {
            $ext = $request->proposal_doc->extension();
            $name = str_replace(' ', '_', $request->proposal_doc->getClientOriginalName());
            $fileName = Auth::user()->id . '_' . $name;
            $folderName = "storage/FILE/proposals/" . Carbon::now()->format('Y/m');
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
            // Add proposal document
            Documents::create([
            'proposals_id' => $data->id,
            'proposal_doc' => $fileName,
            'doc_type_id' => 'DC1',
            'created_by' => Auth::user()->id,
            ]);

            if ($data) {
            return redirect()->route('user-proposals.index')->with('proposals', 'Data (' . $request->research_title . ') BERHASIL ditambahkan!');
            } else {
            return redirect()->route('user-proposals.index')->with('proposals', 'Proposal GAGAL dibuat!');
            }

        } else {
            $userproposal = Auth::user()->id;
            $proposals = Proposal::where('users_id', $userproposal)->get();
            $researchtypes = ResearchTypes::all();
            $researchcategories = ResearchCategories::all();
            $researchthemes = ResearchThemes::all();
            $researchtopics = ResearchTopics::all();
            // $researchteam = ResearchTeam::all();
            $tkttype = TktTypes::all();
            $existingResearchers = ProposalTeams::pluck('researcher_id')->toArray();
            $mainresearch = MainResearchTarget::all();
            // DB::table('users')
            // ->select('users.id', 'users.name', DB::raw("'COUNT'('proposal_teams.id') as total"), 'proposals.status_id')
            // ->leftJoin('proposal_teams','users.id','=','proposal_teams.researcher_id')
            // ->leftJoin('proposals','proposals.id','=','proposal_teams.proposals_id')
            // ->where('proposals.status_id','!=','S08')
            // ->orWhere('proposals.status_id','!=','S04')
            // ->orWhereNull('proposals.status_id')
            // ->groupBy('users.id','users.name','proposals.status_id')
            // ->having('total','<',2)
            // ->get();

            $users = User::select('users.id', 'users.name', DB::raw("COUNT('proposal_teams.id') as total"))
            ->leftJoin('proposal_teams','users.id','=','proposal_teams.researcher_id')
            ->leftJoin('proposals','proposals.id','=','proposal_teams.proposals_id')
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['lecture']);
            })
            ->where(function ($query) {
                $query->where('proposals.status_id','!=','S08')
                      ->orWhere('proposals.status_id','!=','S04')
                      ->orWhereNull('proposals.status_id');
            })
            ->groupBy('users.id', 'users.name')
            ->havingRaw("total < 2")
            ->get();



            return view('proposals.create', compact('proposals', 'researchtypes', 'researchthemes', 'researchcategories', 'tkttype', 'mainresearch', 'researchtopics','userproposal','users','existingResearchers'));
        }
    }

    public function approve(Request $request)
    {
        $data = Proposal::find($request->id);
        if ($data) {
            $data->status_id = "S01";
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

    public function submit(Request $request)
    {
        $data = Proposal::find($request->id);
        if ($data) {
            $data->status_id = "S02";
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
    public function timeline()
    {
        return view('proposals.timeline');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function edit($id)
    {
        $proposals = Proposal::findOrFail($id);
        $proposalteam = ProposalTeams::where('proposals_id', $id)->first();
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['lecture', 'reviewer']);
        })->get();
        return view('proposals.edit', compact('proposals', 'proposalteam', 'users'));
    }
    public function update(Request $request, $id)
    {
        // Aturan validasi
        $request->validate([
            'researcher_id' => 'required|array',
            'researcher_id.*' => 'exists:users,id'
        ]);

        // Hapus tim peneliti yang lama
        ProposalTeams::where('proposals_id', $id)->delete();

        // Tambahkan tim peneliti yang baru
        foreach ($request->researcher_id as $researcher_id) {
            ProposalTeams::create([
                'proposals_id' => $id,
                'researcher_id' => $researcher_id,
            ]);
        }

        return redirect()->route('user-proposals.index')->with('proposals', 'Data BERHASIL diajukan!');
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

    public function account_bank($id)
    {
        $proposal = Proposal::findOrfail($id);
        $bank = Bank::all();
        return view('proposals.account-bank', compact('proposal', 'bank'));
    }

    public function account_bank_update(Request $request, $id)
    {
        $request->validate([
            'bank_account_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
            'bank' => 'required|exists:banks,id',
        ]);

        $proposal = Proposal::findOrfail($id);
        $proposal->bank_account_name = $request->account_name;
        $proposal->bank_account_number = $request->account_number;
        $proposal->bank_id = $request->bank;
        $proposal->save();

        return redirect()->route('user-proposals.index')->with('proposals', 'Data BERHASIL diperbarui!');
    }


    public function print_pdf($id)
    {
        $proposals = Proposal::findOrFail($id);
        $pdf = PDF::loadView('proposals.print', compact('proposals'));
        return $pdf->stream('proposal.pdf');
    }
}
