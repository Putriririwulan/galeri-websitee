<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'content',
        'image',
        'cards_section_title',
        'cards_section_empty_message'
    ];
}
