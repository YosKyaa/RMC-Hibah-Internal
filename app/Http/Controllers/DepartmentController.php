<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $this->authorize('setting/manage_data/department.read');
        if ($request->isMethod('POST')) { 
            $this->validate($request, [ 
                'name' => 'required',
            ]);
            $this->authorize('setting/manage_data/department.create');
            $new = Department::create([
                'name' => $request->name,
            ]);
            if($new){
                return redirect()->route('dept.index')->with('msg','Data atas ('.$request->name.') BERHASIL ditambahkan!');
            }
        }
            $departement = Department::select("*")->get();
            // dd($data);
            return view('data.departement.index', compact('departement'));
        }

    public function data(Request $request){
        $this->authorize('setting/manage_data/department.read');
        $data = Department::select('*')->orderBy("id");
            return DataTables::of($data)
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('search'))) {
                            $search = $request->get('search');
                            $instance->where('name', 'LIKE', "%$search%");
                        }
                    })->make(true);
    }

    public function datatables()
    {
        $departement = Department::select('*');
        return DataTables::of($departement)->make(true);
    }
   
    public function edit($id)
    {
        $this->authorize('setting/manage_data/department.update');
        $departement = Department::findOrFail($id);
        return view('data.departement.edit', compact('departement'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $departement = Department::findOrFail($id);
        $departement->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dept.index')->with('Department,', 'Department berhasil diperbarui.');
    }
    public function delete(Request $request){
        $this->authorize('setting/manage_data/department.delete');
        $data = Department::find($request->id);
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


