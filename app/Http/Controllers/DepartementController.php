<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->isMethod('POST')) { 
            $this->validate($request, [ 
                'name_dept' => 'required',
            ]);
            $new = Departement::create([
                'name_dept' => $request->name_dept,
            ]);
            if($new){
                return redirect()->route('dept.index')->with('msg','Data atas ('.$request->name_dept.') BERHASIL ditambahkan!');
            }
        }
            $departement = Departement::select("*")->get();
            // dd($data);
            return view('data.departement.index', compact('departement'));
        }

    public function data(Request $request){
        $data = Departement::select('*')->orderBy("id");
            return DataTables::of($data)
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('search'))) {
                            $search = $request->get('search');
                            $instance->where('name_dept', 'LIKE', "%$search%");
                        }
                    })->make(true);
    }

    public function datatables()
    {
        $departement = Departement::select('*');
        return DataTables::of($departement)->make(true);
    }
   
    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        return view('data.departement.edit', compact('departement'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_dept' => 'required',
        ]);

        $departement = Departement::findOrFail($id);
        $departement->update([
            'name_dept' => $request->name_dept,
        ]);

        return redirect()->route('dept.index')->with('Departement,', 'Departement berhasil diperbarui.');
    }
    public function delete(Request $request){
        $data = Departement::find($request->id);
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
