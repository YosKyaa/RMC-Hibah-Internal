<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalTeams extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'proposals_id',
        'researcher_id',
    ];
    public function Proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposals_id');
    }
    public function researcher() {
        return $this->belongsTo(User::class, 'researcher_id');
    }
}
