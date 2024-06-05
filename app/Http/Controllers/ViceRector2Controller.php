<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ViceRector2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals2 = Proposal::where('approval_vice_rector_1', true)->get();
        return view('vicerector2.index', compact('proposals2'));
    }

    public function approve(Request $request)
    {
        $data = Proposal::find($request->id);
        if($data) {
            $data->approval_vice_rector_2 = true;
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status!'
            ]);
        }
    }
    public function disapprove(Request $request)
    {
        $data = Proposal::find($request->id);
        if($data) {
            $data->approval_vice_rector_2 = false;
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status!'
            ]);
        }
    }

}
