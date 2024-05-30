<?php

namespace App\Http\Controllers;

use App\Models\CategoryResearch;
use App\Models\FieldFocusResearch;
use App\Models\MainResearchTarget;
use App\Models\Proposal;
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

class UserProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
                'document' => 'required|mimes:pdf|max:10000', // max 10MB
                'notes' => 'required|string',
            ]);
            $fileName = "";
            if ($request->hasFile('document')) {
                $ext = $request->document->extension();
                $name = str_replace(' ', '_', $request->document->getClientOriginalName());
                $fileName = Auth::user()->id . '_' . $name;
                $folderName = "storage/FILE/proposals/" . Carbon::now()->format('Y/m');
                $path = public_path() . "/" . $folderName;
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true); //create folder
                }
                $upload = $request->document->move($path, $fileName); //upload file to folder
                if ($upload) {
                    $fileName = $folderName . "/" . $fileName;
                } else {
                    $fileName = "";
                }
            }

            // dd(Auth::user()->id);
            $data = Proposal::create([
                'users_id' => Auth::user()->id,
                'research_types_id' => $request->research_type,
                'research_topics_id' => $request->research_topics,
                'research_title' => $request->research_title,
                'tkt_types_id' => $request->tkt_type,
                'main_research_targets_id' => $request->main_research_target,
                'document' => $fileName,
                'notes' => $request->notes,
                'status_id' => "S01",
            ]);

            if ($data) {
                return redirect()->route('user-proposals.index')->with('msg', 'Data atas (' . $request->research_title . ') BERHASIL ditambahkan!');
            } else {
                return redirect()->route('user-proposals.index')->with('msg', 'Proposal GAGAL dibuat!');
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
            $mainresearch = MainResearchTarget::all();


            return view('proposals.index', compact('proposals', 'researchtypes', 'researchthemes', 'researchcategories', 'tkttype', 'mainresearch', 'researchtopics','userproposal'));
        }
    }


    public function getResearchThemeById(Request $request)
    {
        $themes = ResearchThemes::where('research_category_id', $request->id)->get();
        return response()->json($themes);
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
                'document' => 'required|mimes:pdf|max:10000', // max 10MB
                'notes' => 'required|string',
            ]);
            $fileName = "";
            if ($request->hasFile('document')) {
                $ext = $request->document->extension();
                $name = str_replace(' ', '_', $request->document->getClientOriginalName());
                $fileName = Auth::user()->id . '_' . $name;
                $folderName = "storage/FILE/proposals/" . Carbon::now()->format('Y/m');
                $path = public_path() . "/" . $folderName;
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true); //create folder
                }
                $upload = $request->document->move($path, $fileName); //upload file to folder
                if ($upload) {
                    $fileName = $folderName . "/" . $fileName;
                } else {
                    $fileName = "";
                }
            }

            // dd(Auth::user()->id);
            $data = Proposal::create([
                'users_id' => Auth::user()->id,
                'research_types_id' => $request->research_type,
                'research_topics_id' => $request->research_topics,
                'research_title' => $request->research_title,
                'tkt_types_id' => $request->tkt_type,
                'main_research_targets_id' => $request->main_research_target,
                'document' => $fileName,
                'notes' => $request->notes,
                'status_id' => "S01",
            ]);

            if ($data) {
                return redirect()->route('user-proposals.edit', $data->id)->with('msg', 'Data atas (' . $request->research_title . ') BERHASIL ditambahkan!');
            } else {
                return redirect()->route('user-proposals.index')->with('msg', 'Proposal GAGAL dibuat!');
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
            $mainresearch = MainResearchTarget::all();


            return view('proposals.create', compact('proposals', 'researchtypes', 'researchthemes', 'researchcategories', 'tkttype', 'mainresearch', 'researchtopics','userproposal'));
        }
    }

    public function timeline()
    {
        return view('proposals.timeline');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proposals = Proposal::findOrFail($id);
        $proposalteam = ProposalTeams::where('proposals_id', $id)->first();
        $users = User::all();
        return view('proposals.edit', compact('proposals', 'proposalteam', 'users'));
    }
    public function update(Request $request, $id)
    {

        // Aturan validasi
        $request->validate([
            'researcher_id' => 'required|exists:users,id'
        ]);

        $proposalteam = ProposalTeams::where('proposals_id', $id)->first();
        if ($proposalteam) {
            $proposalteam->update([
                'researcher_id' => $request->researcher_id,
            ]);
        } else {
            ProposalTeams::create([
                'proposals_id' => $id,
                'researcher_id' => $request->researcher_id,
            ]);
        }

        return redirect()->route('user-proposals.index')->with('Propoasal,', 'Berhasil di Ajukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $event = Proposal::findOrFail($id);
        $event->delete();

        return redirect()->route('user-proposals.index')->with('success', 'Proposal was successfully deleted.');
    }

}
