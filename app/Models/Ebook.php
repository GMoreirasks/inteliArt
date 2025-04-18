<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    // Permite mass assignment nesses campos:
    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'purchase_link',
    ];
}
