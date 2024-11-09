<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'status',
        'description',
        'image_path',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
