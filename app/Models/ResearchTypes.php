<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchTypes extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'title',
        'total_founds'
    ];
}
