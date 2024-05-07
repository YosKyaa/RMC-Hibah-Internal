<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all();
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $announcement = new Announcement();
        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $announcement->image = $path;
        }

        $announcement->save();

        return redirect()->route('announcements.index');
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
    public function edit($id)
    {
        $announcement = Announcement::find($id);
        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $announcement = Announcement::find($id);
        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $announcement->image = $path;
        }

        $announcement->save();

        return redirect()->route('announcements.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        Storage::delete($announcement->image);
        $announcement->delete();

        return redirect()->route('announcements.index');
    }
}
