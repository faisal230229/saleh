<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'thumbnail', 'content', 'order'
    ];
}
