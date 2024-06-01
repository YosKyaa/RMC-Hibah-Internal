<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposals_id',
        'proposal_doc',
        'doc_type_id',
        'created_by',
    ];
    public function Proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposals_id');
    }
}
