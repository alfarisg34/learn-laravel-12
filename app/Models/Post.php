<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'picture',
        'desc',
        'last_edited_by',
    ];

    // Relationship to User
    public function editor()
    {
        return $this->belongsTo(User::class, 'last_edited_by');
    }
}
