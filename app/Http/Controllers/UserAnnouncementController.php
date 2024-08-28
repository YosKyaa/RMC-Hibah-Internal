<?php

namespace App\Http\Controllers;
use App\Models\Announcement;
use Illuminate\Http\Request;

class UserAnnouncementController extends Controller
{
   public function index()
   {
   $announcements = Announcement::orderBy('created_at', 'desc')->get();
       return view('announcements.user.index', compact('announcements'));
   }
}
