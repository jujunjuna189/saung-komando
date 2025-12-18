<?php

namespace App\Http\Controllers\Public\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Reservation\ReservationMiniSoccerModel;
use Illuminate\Http\Request;

class ReservationMiniSoccerController extends Controller
{
    public function show(Request $request)
    {
        $query = ReservationMiniSoccerModel::with('facility');

        if ($request->facility_id) {
            $query->where('facility_id', $request->facility_id);
        }

        if ($request->date) {
            $query->where('date', $request->date);
        }

        $model = $query->get();

        return response()->json([
            "status" => "success",
            "message" => "Berhasil mengambil reservasi",
            "data" => $model,
        ]);
    }
}
