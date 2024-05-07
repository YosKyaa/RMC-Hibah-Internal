<?php

namespace App\Http\Controllers;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Contracts\Permission as ContractsPermission;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //variabel digunakan untuk pilihan 
        $roles = Role::orderBy('name')->get();
        $guard_names = Permission::select('guard_name')->groupBy('guard_name')->get();
        return view('configuration.permissions.index', compact('roles','guard_names'));
    }

    public function data(Request $request)
    {
        $data = Permission::
            with(['roles' => function ($query) {
                $query->select('id');
            }])
            ->select('*')->orderBy("name");
            return DataTables::of($data)
                ->filter(function ($instance) use ($request) {
                    //jika pengguna memfilter berdasarkan guard_name
                    if (!empty($request->get('select_guard_name'))) {
                        $instance->where('guard_name', $request->get('select_guard_name'));
                    }
                    //jika pengguna memfilter berdasarkan role
                    if (!empty($request->get('select_role'))) {
                        $instance->whereHas('roles', function($q) use($request){
                            $q->where('role_id', $request->get('select_role'));
                        });
                    }
                    //jika pengguna memfilter menggunakan pencarian
                    if (!empty($request->get('search'))) {
                        $search = $request->get('search');
                        $instance->where('name', 'LIKE', "%$search%");
                    }
                })
                ->addColumn('idd', function($x){
                    //menambahkan kolom idd (id yg ter-enkripsi)
                    return Crypt::encrypt($x['id']);
                })
                ->rawColumns(['idd'])
                ->make(true);
    }
}
