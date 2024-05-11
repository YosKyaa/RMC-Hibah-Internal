<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainResearchTarget extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'title',
        'description'
    ];
}
