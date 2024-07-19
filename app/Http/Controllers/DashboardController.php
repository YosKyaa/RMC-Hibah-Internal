<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Proposal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all('*');

        $panganCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Pangan');
        })->count();
        $energiCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Energi');
        })->count();

        $kesehatanCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Kesehatan');
        })->count();

        $transportasiCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Transportasi');
        })->count();

        $pertahananCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Pertahanan dan keamanan');
        })->count();

        $majuCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Maju');
        })->count();

        $keamaritimanCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Kemaritiman');
        })->count();

        $kebencanaanCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Kebencanaan');
        })->count();

        $tiCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Teknologi informasi dan komunikasi');
        })->count();

        $sosialHumanioraCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Sosial humaniora, seni budaya, pendidikan');
        })->count();


        return view('dashboard', compact('announcements', 'panganCount', 'energiCount', 'kesehatanCount', 'transportasiCount', 'pertahananCount', 'majuCount', 'keamaritimanCount', 'kebencanaanCount', 'tiCount', 'sosialHumanioraCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
