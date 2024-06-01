<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    public $incrementing = false;  // UUID tidak menggunakan auto increment
    protected $keyType = 'string'; // UUID adalah string

    use HasFactory;
    public $fillable = [
        'id',
        'status',
        'color',
    ];
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'status_id', 'id');
    }
}
