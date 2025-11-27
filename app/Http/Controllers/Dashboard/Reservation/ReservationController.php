<?php

namespace App\Http\Controllers\Dashboard\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Reservation\ReservationModel;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function show(Request $request)
    {
        $model = ReservationModel::all();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil mengambil reservasi',
            "data" => $model,
        ]);
    }

    public function create(Request $request)
    {
        $model = new ReservationModel();
        $model->fill($request->all());
        $model->save();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil mengambil reservasi',
            "data" => $model,
        ]);
    }

    public function update(Request $request)
    {
        $model = ReservationModel::find($request->id);
        $model->fill($request->except('id'));
        $model->save();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil mengubah reservasi',
            "data" => $model,
        ]);
    }

    public function delete(Request $request)
    {
        $model = ReservationModel::find($request->id);
        $model->delete();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil menghapus reservasi',
            "data" => $model,
        ]);
    }
}
