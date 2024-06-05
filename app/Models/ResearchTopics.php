<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchTopics extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'name',
        'research_theme_id',
    ];
    public function researchTheme()
    {
        return $this->belongsTo(ResearchThemes::class, 'research_theme_id');
    }
}
