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
            $query->where('name', 'Pangan')->where('status_id', 'S00');
        })->count();
        $panganCount2 = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Pangan')->where('status_id', '!=', 'S00');
        })->count();

        $energiCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Energi')->where('status_id', 'S00');
        })->count();
        $energiCount2 = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Energi')->where('status_id', '!=', 'S00');
        })->count();

        $kesehatanCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Kesehatan')->where('status_id', 'S00');
        })->count();
        $kesehatanCount2 = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Kesehatan')->where('status_id', '!=', 'S00');
        })->count();

        $transportasiCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Transportasi')->where('status_id', 'S00');
        })->count();
        $transportasiCount2 = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Transportasi')->where('status_id', '!=', 'S00');
        })->count();

        $pertahananCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Pertahanan dan keamanan')->where('status_id', 'S00');
        })->count();
        $pertahananCount2 = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Pertahanan dan keamanan')->where('status_id', '!=', 'S00');
        })->count();

        $majuCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Maju')->where('status_id', 'S00');
        })->count();
        $majuCount2 = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Maju')->where('status_id', '!=', 'S00');
        })->count();

        $keamaritimanCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Kemaritiman')->where('status_id', 'S00');
        })->count();
        $keamaritimanCount2 = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Kemaritiman')->where('status_id', '!=', 'S00');
        })->count();

        $kebencanaanCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Kebencanaan')->where('status_id', 'S00');
        })->count();
        $kebencanaanCount2 = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Kebencanaan')->where('status_id', '!=', 'S00');
        })->count();

        $tiCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Teknologi informasi dan komunikasi')->where('status_id', 'S00');
        })->count();
        $tiCount2 = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Teknologi informasi dan komunikasi')->where('status_id', '!=', 'S00');
        })->count();

        $sosialHumanioraCount = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Sosial humaniora, seni budaya, pendidikan')->where('status_id', 'S00');
        })->count();
        $sosialHumanioraCount2 = Proposal::whereHas('researchTopic.researchTheme.researchCategory', function ($query) {
            $query->where('name', 'Sosial humaniora, seni budaya, pendidikan')->where('status_id', '!=', 'S00');
        })->count();


        return view('dashboard', compact('announcements', 'panganCount', 'energiCount', 'kesehatanCount', 'transportasiCount', 'pertahananCount', 'majuCount', 'keamaritimanCount', 'kebencanaanCount', 'tiCount', 'sosialHumanioraCount', 'panganCount2', 'energiCount2', 'kesehatanCount2', 'transportasiCount2', 'pertahananCount2', 'majuCount2', 'keamaritimanCount2', 'kebencanaanCount2', 'tiCount2', 'sosialHumanioraCount2'));
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
