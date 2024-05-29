<?php

namespace App\Http\Controllers;

use App\Models\CategoryResearch;
use App\Models\FieldFocusResearch;
use App\Models\MainResearchTarget;
use App\Models\Proposal;
use App\Models\ResearchCategories;
use App\Models\ResearchTeam;
use App\Models\ResearchThemes;
use App\Models\ResearchTopics;
use App\Models\ResearchTypes;
use App\Models\Status;
use App\Models\TktTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
                'status_id' => Status::where('status', 'Pengajuan')->first()->id,
            ]);

            if ($data) {
                return redirect()->route('proposals.index')->with('msg', 'Data atas (' . $request->research_title . ') BERHASIL ditambahkan!');
            } else {
                return redirect()->route('proposals.index')->with('msg', 'Proposal GAGAL dibuat!');
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
    public function create()
    {
        return view('proposals.create');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
