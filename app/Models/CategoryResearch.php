<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryResearch extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'category_name',
    ];
}
