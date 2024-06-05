<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchThemes extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'name',
        'research_category_id',
    ];
    public function researchCategory()
    {
        return $this->belongsTo(ResearchCategories::class, 'research_category_id');
    }

    public function researchTopics()
    {
        return $this->hasMany(ResearchTopics::class, 'research_theme_id');
    }

}
