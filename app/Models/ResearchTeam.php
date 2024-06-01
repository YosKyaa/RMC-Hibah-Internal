<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchTeam extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'proposals_id',
        'user_id',

    ];

}
