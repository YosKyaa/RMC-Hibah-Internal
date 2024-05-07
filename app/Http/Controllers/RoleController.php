<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Contracts\Permission as ContractsPermission;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct() {
        $this->middleware('auth');
        // $this->middleware('can:setting/manage_account/roles.read');
    }

    public function index(Request $request)
    {
        $this->authorize('setting/manage_account/roles.read');
        if ($request->isMethod('post')) { //jika menerima method post dari form
            // validasi input form
            $this->validate($request, [ 
                'name'=> ['required', 'string', 'max:255', Rule::unique('roles')],
                'guard_name'=> ['required']
            ]);
            //memasukkan data ke database
            $data = Role::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name,
                'color'=> $request->color,
                'description'=> $request->description
            ]);
            //kembali ke halaman index
            return redirect()->route('roles.index')->with('msg','Role "'.$request->name.'" successfully added!');
        }
        //variabel digunakan untuk pilihan
        $permissions = Permission::orderBy('name')->get();
        $guard_names = Role::select('guard_name')->groupBy('guard_name')->get();
        return view('configuration.roles.index', compact('guard_names', 'permissions'));
    }

    public function data(Request $request)
    {
        $this->authorize('setting/manage_account/roles.read');
        $data = Role::
            with(['permissions' => function ($query) {
                $query->select('id');
            }])
            ->with(['users' => function ($query) {
                $query->select('id');
            }])
            ->select('*')->orderBy("name");
            return DataTables::of($data)
                ->filter(function ($instance) use ($request) {
                    //jika pengguna memfilter berdasarkan guard_name
                    if (!empty($request->get('select_guard_name'))) {
                        $instance->where('guard_name', $request->get('select_guard_name'));
                    }
                    //jika pengguna memfilter berdasarkan permission
                    if (!empty($request->get('select_permission'))) {
                        $instance->whereHas('permissions', function($q) use($request){
                            $q->where('permission_id', $request->get('select_permission'));
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idd, Request $request)
    {
        $this->authorize('setting/manage_account/roles.update');
        //mencoba mendeskripsikan idd menjadi id
        try {
            $id = Crypt::decrypt($idd);
        } catch (DecryptException $e) {
            return redirect()->route('roles.index');
        }
        //jika menerima method post dari form
        if ($request->isMethod('post')) {
            $this->validate($request, [ 
                'name' => ['required', 'string'],
                'guard_name' => ['required', 'string'],
            ]);
            //mengubah data di database
            Role::where('id', $id)->update([
                'name'=> $request->name,
                'guard_name'=> $request->guard_name,
                'color'=> $request->color,
                'description'=> $request->description,
                'updated_at' => Carbon::now()
            ]);
            $role = Role::where('id',$id)->first();
            $role->syncPermissions($request->permissions);
            //mencatat perubahan di log
            Log::info(Auth::user()->name." update Role #".$id.", ".$request->name);
            //kembali ke halaman edit dengan pesan notifikasi
            return redirect()->route('roles.edit', ['id'=>$idd])->with('msg','Role '.$request->name.' updated successfully!');
        }
        //mencari data user berdasarkan id
        $data = Role::with('permissions')->find($id);
        //variabel digunakan untuk pilihan guard
        $guard_names = Role::select('guard_name')->groupBy('guard_name')->get();

        $role = Role::with('permissions')->find($id);
        DB::statement("SET SQL_MODE=''");
        $role_permission = Permission::select('name','id')->groupBy('name')->orderBy('name')->get();
        $custom_permission = array();
        foreach($role_permission as $per){
            $key = substr($per->name, 0, strpos($per->name, "."));
            if(str_starts_with($per->name, $key)){
                $custom_permission[$key][] = $per;
            }
        }
        return view('configuration.roles.edit', compact('data','guard_names'))->with('permissions',$custom_permission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request) //hapus by id
    {
        $this->authorize('setting/manage_account/roles.delete');
        $data = Role::find($request->id);
        //jika data ditemukan
        if($data){
            //mencatat proses penghapusan di log
            Log::warning(Auth::user()->username." deleted Role #".$data->id.", name : ".$data->name);
            //data user dihapus dari database
            $data->delete();
            //jika sukses mengembalikan data dalam bentuk json
            return response()->json([
                'success' => true,
                'message' => 'Role deleted successfully!'
            ]);
        } else {
            //jika gagal mengembalikan data dalam bentuk json
            return response()->json([
                'success' => false,
                'message' => 'Role failed to delete!'
            ]);
        }
    }
}
