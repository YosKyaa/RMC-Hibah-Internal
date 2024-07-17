<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $this->authorize('manage_announcement.read');

        if ($request->isMethod('POST')) {
            $this->validate($request, [
                'title' => ['string', 'max:255'],
                'file_path' => ['required','mimes:jpg,jpeg,png,pdf','max:5120'], // max 5MB
                'description' => 'required',
            ]);
            $this->authorize('manage_announcement.create');
            $fileName = "";
            if(isset($request->file_path)){
                $ext = $request->file_path->extension();
                $name = str_replace(' ', '_', $request->file_path->getClientOriginalName());
                $fileName = Auth::user()->id.'_'.$name;
                $folderName =  "storage/FILE/announcements/".Carbon::now()->format('Y/m');
                $path = public_path()."/".$folderName;
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true); //create folder
                }
                $upload = $request->file_path->move($path, $fileName); //upload image to folder
                if($upload){
                    $fileName=$folderName."/".$fileName;
                } else {
                    $fileName = "";
                }
            }
            $data = Announcement::create([
                'users_id' => Auth::user()->id,
                'title' => $request->title,
                'file_path' => $fileName,
                'description' => $request->description,
            ]);
            if($data){
                return redirect()->route('announcements.index')->with('msg','Data atas ('.$request->title.') BERHASIL ditambahkan!');
            }else{
                return redirect()->route('announcements.index')->with('msg',' Pengmuman GAGAL dibuat!');
            }
        }else{
            $data = "";
            $announcements = Announcement::all('*');
            return view('announcements.index', compact('data','announcements'));
        }

    }


    public function data(Request $request){
        $this->authorize('manage_announcement.read');
        $data = Announcement::select('*')->orderBy("id");
            return DataTables::of($data)
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('search'))) {
                            $search = $request->get('search');
                            $instance->where('title', 'LIKE', "%$search%");
                        }
                    })->make(true);
    }

    public function datatables()
    {
        $announcements = Announcement::select('*');
        return DataTables::of($announcements)->make(true);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->authorize('manage_announcement.update');
        $announcements = Announcement::findOrFail($id);
        return view('announcements.edit', compact('announcements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'date' => ['date','required'],
            'file_path' => ['required','mimes:jpg,jpeg,png,pdf','max:5120'], // max 5MB
            'description' => 'required',
        ]);
        // dd($request);
        $announcements = Announcement::findOrFail($id);
        $fileName = $announcements->file_path;
        if(isset($request->file_path)){
            $name = str_replace(' ', '_', $request->file_path->getClientOriginalName());
            $fileName = Auth::user()->id.'_'.$name;
            $folderName =  "storage/FILE/announcements/".Carbon::now()->format('Y/m');
            $path = public_path()."/".$folderName;
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true); //create folder
            }
            $upload = $request->file_path->move($path, $fileName); //upload image to folder
            if($upload){
                $fileName=$folderName."/".$fileName;
                if($announcements->file_path != null){
                    File::delete(public_path()."/".$announcements->file_path);
                }
            } else {
                $fileName = $announcements->file_path;
            }
        }
        $d = $announcements->update([
            'title' => $request->title,
            'date' => $request->date,
            'file_path' => $fileName,
            'description' => $request->description,
        ]);
        if($d){
            return redirect()->route('announcements.edit',['id' => ($announcements->id)])
            ->with('msg','Announcements berhasil diubah!');
        }else{
            return redirect()->route('announcements.edit',['id' => ($announcements->id)])
            ->with('msg','Announcements gagal diubah!');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request){
        $this->authorize('manage_announcement.delete');
        $data = Announcement::find($request->id);
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
