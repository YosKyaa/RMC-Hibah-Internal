<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'title',
        'file_path',
        'description',
        'users_id',
    ];
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'users_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
