<?php

namespace App\Http\Controllers;

use App\Models\CategoryResearch;
use App\Models\FieldFocusResearch;
use App\Models\MainResearchTarget;
use App\Models\Proposal;
use App\Models\ResearchTeam;
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
                'note' => 'required', 
                
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
                'research_type_id' => $request->research_type,
                'field_focus_research_id' => $request->research_topic,
                'research_title' => $request->research_title,
                'research_team_id' => $request->research_team,
                'tkt_type_id' => $request->tkt_type,
                'main_research_target_id' => $request->main_research_target,
                'document' => $fileName,
                'note' => $request->note,
            ]);
            if($data){
                return redirect()->route('proposals.index')->with('msg','Data atas ('.$request->title.') BERHASIL ditambahkan!');
            }else{
                return redirect()->route('proposals.index')->with('msg',' Pengmuman GAGAL dibuat!');
            }
        }else{
            $proposals = Proposal::all();
            $researchtypes = ResearchTypes::all();
            $fieldfocusresearch = FieldFocusResearch::all();
            $proposals = Proposal::all();
            $categoryresearch = CategoryResearch::all();
            $researchteam = ResearchTeam::all();
            $tkttype = TktTypes::all();
            $mainresearch = MainResearchTarget::all();
            $researchteam = ResearchTeam::all();
        return view('proposals.index', compact('proposals', 'researchtypes', 'fieldfocusresearch', 'proposals', 'categoryresearch', 'researchteam', 'tkttype', 'mainresearch', 'researchteam'));
        }
    }


    public function get_research_theme_by_id(Request $request)
    {
        $data = FieldFocusResearch::where("",$request->id)
            ->orderBy("id")->get(["id", "research_theme", "research_topic"]);
        if($request->id == null || $request->id == ""){
            $data = FieldFocusResearch::orderBy("id")->get(["id", "researfch_theme", "research_topic"]);
        }
        return response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $researchtypes = ResearchTypes::all();
        $fieldfocusresearch = FieldFocusResearch::all();
        $proposals = Proposal::all();
        $categoryresearch = CategoryResearch::all();
        $researchteam = ResearchTeam::all();
        return view('proposals.create', compact('researchtypes', 'fieldfocusresearch', 'proposals', 'categoryresearch'));    
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
