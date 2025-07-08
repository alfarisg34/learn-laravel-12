<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'picture',
        'desc',
        'category_id',
        'status',
        'deactivate_at',
        'last_edited_by',
        'rating',
        'location_id',
        'location_name',
    ];

    protected $casts = [
        'status' => 'boolean',
        'deactivate_at' => 'datetime',
    ];

    /** The user who last edited this product (optional) */
    public function editor()
    {
        return $this->belongsTo(User::class, 'last_edited_by');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}