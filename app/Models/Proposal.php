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
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function researchType()
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
