<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'user_id',
        'research_type_id',
        'research_topic_id',
        'research_title',
        'tktk_type_id',
        'main_research_target_id',
        'document',
        'reviewer_id',
        'notes',
        'status_id',
        'review_notes',
        'account_bank_detail',
        'review_date_start',
        'review_date_end',
        'presentation_date',
        'approval_reviewer',
        'approval_reviewer_notes',
        'approval_vice_rector_1',
        'approval_vice_rector_2',
        'updated_by'
    ];
}
