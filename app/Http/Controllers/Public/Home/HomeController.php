<?php

namespace App\Http\Controllers\Public\Home;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Facility\FacilityCategoryModel;
use App\Models\Dashboard\Facility\FacilityModel;
use App\Models\Dashboard\Facility\FacilitySpecificationModel;
use App\Models\Dashboard\Gallery\GalleryModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = FacilityCategoryModel::all();
        $facility = FacilityModel::with('thumbnails', 'specification')->get();

        $capacities = FacilitySpecificationModel::where('icon', 'assets/icon/person.png')
            ->select('value')
            ->distinct()
            ->get();

        $bedrooms = FacilitySpecificationModel::where('icon', 'assets/icon/bedroom.png')
            ->where('value', 'not like', '%- KT%')
            ->select('value')
            ->distinct()
            ->get();

        $sliders = GalleryModel::where('category', 'slider')
            ->orderBy('sort_order', 'asc')
            ->get();

        $hero = GalleryModel::where('category', 'hero')
            ->orderBy('id', 'desc')
            ->first();

        $data['category'] = $category;
        $data['facility'] = $facility;
        $data['capacities'] = $capacities;
        $data['bedrooms'] = $bedrooms;
        $data['sliders'] = $sliders;
        $data['hero'] = $hero;

        return view('public.home.index', $data);
    }

    public function search(Request $request)
    {
        $query = FacilityModel::with('thumbnails', 'specification');

        if ($request->has('capacity') && $request->capacity != '') {
            $query->whereHas('specification', function ($q) use ($request) {
                $q
                    ->where('icon', 'assets/icon/person.png')
                    ->where('value', $request->capacity);
            });
        }

        if ($request->has('bedroom') && $request->bedroom != '') {
            $query->whereHas('specification', function ($q) use ($request) {
                $q
                    ->where('icon', 'assets/icon/bedroom.png')
                    ->where('value', $request->bedroom);
            });
        }

        $facilities = $query->get();

        return response()->json($facilities);
    }
}
