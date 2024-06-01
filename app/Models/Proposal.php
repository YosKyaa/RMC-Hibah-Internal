<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'users_id',
        'research_types_id',
        'research_topics_id',
        'research_title',
        'tkt_types_id',
        'main_research_targets_id',
        'document',
        'status_id',
        'notes',
        'review_date_start',
        'review_date_end',
        'reviewer_id',
        'presentation_date',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function proposalTeams() {
        return $this->hasMany(ProposalTeams::class,'proposals_id');
    }

    public function researcher()
    {
        return $this->belongsTo(User::class, 'researcher_id');
    }
    public function researchType()
    {
        return $this->belongsTo(ResearchTypes::class, 'research_types_id');
    }

    public function research_types()
    {
        return $this->belongsTo(ResearchTypes::class, 'research_types_id');
    }
    public function researchTopic()
    {
        return $this->belongsTo(ResearchTopics::class, 'research_topics_id');
    }
    public function tktType()
    {
        return $this->belongsTo(TktTypes::class, 'tkt_types_id');
    }



}
