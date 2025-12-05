<?php

namespace App\Models\Dashboard\Gallery;

use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'title',
        'category',
        'type',
        'link',
        'sort_order',
    ];
}
