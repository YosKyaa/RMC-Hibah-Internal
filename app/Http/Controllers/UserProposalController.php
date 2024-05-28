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
        // $this->authorize('setting/manage_data/study_program.read');
        if ($request->isMethod('POST')) {
            $this->validate($request, [
                //'users' => 'required|exists:users,id',
                'research_type' => 'required',
                'category_research' => 'required',
                'research_theme' => 'required',
                'research_topic' => 'required',
                'research_title' => ['string', 'max:255'],
                'research_team' => 'required',
                'tkt_type' => 'required',
                'main_research_target' => 'required',
                'document' => ['required','mimes:pdf','max:10000'], // max 10MB
                'notes' => 'required',

            ]);
            $fileName = "";
            if(isset($request->document)){
                $ext = $request->document->extension();
                $name = str_replace(' ', '_', $request->document->getClientOriginalName());
                $fileName = Auth::user()->id.'_'.$name;
                $folderName =  "storage/FILE/proposals/".Carbon::now()->format('Y/m');
                $path = public_path()."/".$folderName;
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true); //create folder
                }
                $upload = $request->document->move($path, $fileName); //upload image to folder
                if($upload){
                    $fileName=$folderName."/".$fileName;
                } else {
                    $fileName = "";
                }
            }
            $data = Proposal::create([
                'users_id' => Auth::user()->id, // 'users_id' => $request->users_id
                'research_type' => $request->research_type_id,
                'research_topics' => $request->research_topic_id,
                'research_title' => $request->research_title,
                // 'research_team_id' => $request->research_team,
                'tkt_type' => $request->tkt_type_id,
                'main_research_targets' => $request->main_research_target_id,
                'document' => $fileName,
                'notes' => $request->notes,
            ]);

            if($data){
                return redirect()->route('proposals.index')->with('msg','Data atas ('.$request->title.') BERHASIL ditambahkan!');
            }else{
                return redirect()->route('proposals.index')->with('msg',' Pengmuman GAGAL dibuat!');
            }
        }else{
            $proposals = Proposal::all();
            $researchtypes = ResearchTypes::all();
            $proposals = Proposal::all();
            $researchcategories = ResearchCategories::all();
            $researchthemes = ResearchThemes::all();
            $researchtopics = ResearchTopics::all();
            // $researchteam = ResearchTeam::all();
            $tkttype = TktTypes::all();
            $mainresearch = MainResearchTarget::all();
        return view('proposals.index', compact('proposals', 'researchtypes', 'researchthemes', 'proposals', 'researchcategories',  'tkttype', 'mainresearch', 'researchtopics'));
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
