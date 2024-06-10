<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'name',
    ];
    public function user()
    {
        return $this->hasMany(User::class, 'departments_id');
    }
}
