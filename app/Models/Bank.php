<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'name',
    ];
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'bank_id', 'id');
    }
}
