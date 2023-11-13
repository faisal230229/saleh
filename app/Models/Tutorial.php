<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'featured_image', 'primary_content', 'secondary_content', 'secondary_image', 'youtube_link', 'order'
    ];
}
