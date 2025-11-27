<?php

namespace App\Http\Controllers\Dashboard\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Promotion\PromotionModel;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function show(Request $request)
    {
        $model = PromotionModel::with('facility')->get();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil mengambil promotion',
            "data" => $model,
        ]);
    }

    public function create(Request $request)
    {
        $model = new PromotionModel();
        $model->fill($request->all());
        $model->save();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil mengambil promotion',
            "data" => $model,
        ]);
    }

    public function update(Request $request)
    {
        $model = PromotionModel::find($request->id);
        $model->fill($request->except('id'));
        $model->save();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil mengubah promotion',
            "data" => $model,
        ]);
    }

    public function delete(Request $request)
    {
        $model = PromotionModel::find($request->id);
        $model->delete();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil menghapus promotion',
            "data" => $model,
        ]);
    }
}
