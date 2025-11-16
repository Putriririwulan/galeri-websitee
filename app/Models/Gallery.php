<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'cover_image',
    ];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCoverImageUrl()
{
    return $this->cover_image 
        ? asset('storage/' . $this->cover_image) 
        : asset('images/default.jpg'); // fallback gambar default
}
}
