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
}
