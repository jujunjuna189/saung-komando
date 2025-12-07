<?php

namespace App\Http\Controllers\Public\Facility;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Facility\FacilityModel;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function show(Request $request)
    {
        $model = FacilityModel::when(! empty($request->category), function ($q) use ($request) {
            $q->where('category', $request->category);
        })
            ->when(! empty($request->specs), function ($q) use ($request) {
                $specs = $request->specs;
                $q->whereHas('specification', function ($query) use ($specs) {
                    $query->whereIn('value_md', $specs);
                });
                if (count($specs) > 1) {
                    // AND: harus match semua
                    $q->withCount(['specification as match_count' => function ($query) use ($specs) {
                        $query->whereIn('value_md', $specs);
                    }])->having('match_count', '=', count($specs));
                }
            })->with(['thumbnails' => function ($q) {
                $q->orderBy('sort_order', 'asc');
            }, 'specification'])->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengambil fasilitas',
            'data' => $model,
        ]);
    }
}
