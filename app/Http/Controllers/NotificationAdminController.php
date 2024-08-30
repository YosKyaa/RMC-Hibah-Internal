<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class NotificationAdminController extends Controller
{
    public function getTotalNullReviewers()
    {
        $totalNullReviewers = Proposal::whereNull('reviewer_id')->where('status_id', '!=', 'S00')->count();
        return response()->json(['totalNullReviewers' => $totalNullReviewers]);
    }

    public function getTotalS05Proposals()
    {
        $totalS05Proposals = Proposal::where('status_id', 'S05')->count();
        return response()->json(['totalS05Proposals' => $totalS05Proposals]);
    }

    public function getTotalNullAdminFundFinalization()
    {
        $totalNullAdminFundFinalization = Proposal::whereNull('approval_admin_fundfinalization')->where('status_id', 'S07')->count();
        return response()->json(['totalNullAdminFundFinalization' => $totalNullAdminFundFinalization]);
    }
}
