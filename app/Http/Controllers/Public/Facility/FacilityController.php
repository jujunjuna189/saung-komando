<?php

namespace App\Http\Controllers\Public\Facility;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Facility\FacilityCategoryModel;
use App\Models\Dashboard\Facility\FacilityModel;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $category = FacilityCategoryModel::all();
        $facility = FacilityModel::with('thumbnails', 'specification')->get();

        $data['category'] = $category;
        $data['facility'] = $facility;

        return view('public.facility.index', $data);
    }

    public function detail(Request $request)
    {
        $category = FacilityCategoryModel::all();
        $facility = FacilityModel::with('thumbnails', 'specification')->get();

        $data['category'] = $category;
        $data['facility'] = $facility;

        return view('public.facility.detail', $data);
    }
}
