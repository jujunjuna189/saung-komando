<?php

namespace App\Http\Controllers\Dashboard\Facility;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Facility\FacilityCategoryModel;
use Illuminate\Http\Request;

class FacilityCategoryController extends Controller
{
    public function show(Request $request)
    {
        $model = FacilityCategoryModel::all();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil mengambil kategori fasilitas',
            "data" => $model,
        ]);
    }
}
