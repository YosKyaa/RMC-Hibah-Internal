<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $this->authorize('setting/manage_data/study_program.read');
        if ($request->isMethod('POST')) { 
            $this->validate($request, [ 
                'name_program' => 'required',
            ]);
            $this->authorize('setting/manage_data/study_program.create');
            $new = StudyProgram::create([
                'name_program' => $request->name_program,
            ]);
            if($new){
                return redirect()->route('program.index')->with('msg','Data atas ('.$request->name_program.') BERHASIL ditambahkan!');
            }
        }
            $studyprogram = StudyProgram::select("*")->get();
            // dd($data);
            return view('data.studyprogram.index', compact('studyprogram'));
        }

    public function data(Request $request){
        $this->authorize('setting/manage_data/study_program.read');
        $data = StudyProgram::select('*')->orderBy("id");
            return DataTables::of($data)
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('search'))) {
                            $search = $request->get('search');
                            $instance->where('name_program', 'LIKE', "%$search%");
                        }
                    })->make(true);
    }

    public function datatables()
    {
        $studyprogram = StudyProgram::select('*');
        return DataTables::of($studyprogram)->make(true);
    }
   
    public function edit($id)
    {
        $this->authorize('setting/manage_data/study_program.update');
        $studyprogram = StudyProgram::findOrFail($id);
        return view('data.studyprogram.edit', compact('studyprogram'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_program' => 'required',
        ]);

        $studyprogram = StudyProgram::findOrFail($id);
        $studyprogram->update([
            'name_program' => $request->name_program,
        ]);

        return redirect()->route('program.index')->with('Study Program,', 'Study Program berhasil diperbarui.');
    }
    public function delete(Request $request){
        $this->authorize('setting/manage_data/study_program.delete');
        $data = StudyProgram::find($request->id);
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
