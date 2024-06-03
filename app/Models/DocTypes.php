<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];
    public function documents()
    {
        return $this->hasMany(Documents::class, 'doc_type_id');
    }
}
