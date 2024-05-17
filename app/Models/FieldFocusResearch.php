<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldFocusResearch extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'research_theme',
        'research_topic',
        'category_research_id'
    ];
}
