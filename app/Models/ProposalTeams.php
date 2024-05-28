<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalTeams extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'proposal_id',
        'research_team_id',
    ];
    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id');
    }
}
