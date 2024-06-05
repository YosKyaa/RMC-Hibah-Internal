<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchCategories extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'name',
    ];
    public function researchThemes()
    {
        return $this->hasMany(ResearchThemes::class, 'research_category_id');
    }
}
