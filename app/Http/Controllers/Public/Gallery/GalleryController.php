<?php

namespace App\Http\Controllers\Public\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Gallery\GalleryModel;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = GalleryModel::where('category', 'gallery')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('public.gallery.index', compact('galleries'));
    }
}
