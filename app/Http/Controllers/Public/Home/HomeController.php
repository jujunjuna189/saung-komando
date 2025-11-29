<?php

namespace App\Http\Controllers\Public\Home;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Facility\FacilityCategoryModel;
use App\Models\Dashboard\Facility\FacilityModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = FacilityCategoryModel::all();
        $facility = FacilityModel::with('thumbnails', 'specification')->get();

        $data['category'] = $category;
        $data['facility'] = $facility;

        return view('public.home.index', $data);
    }
}
