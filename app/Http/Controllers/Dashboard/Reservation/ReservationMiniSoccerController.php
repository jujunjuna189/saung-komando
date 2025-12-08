<?php

namespace App\Http\Controllers\Dashboard\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Facility\FacilityModel;
use App\Models\Dashboard\Reservation\ReservationMiniSoccerModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationMiniSoccerController extends Controller
{
    public function show(Request $request)
    {
        $query = ReservationMiniSoccerModel::with('facility');

        if ($request->facility_id) {
            $query->where('facility_id', $request->facility_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->filter_start && $request->filter_end) {
            // Parse dengan Carbon
            $start = Carbon::parse($request->filter_start)->startOfDay(); // jam 00:00:00
            $end = Carbon::parse($request->filter_end)->endOfDay();       // jam 23:59:59

            // Filter antara start dan end
            $query->whereBetween('date', [$start, $end]);
        } elseif ($request->filter_month && $request->filter_month !== 'Semua') {
            [$year, $month] = explode('-', $request->filter_month);

            $query->whereYear('date', $year)
                ->whereMonth('date', $month);
        } else {
            $nowYear = date('Y');
            $nowMonth = date('m');

            $query->whereYear('date', $nowYear)
                ->whereMonth('date', $nowMonth);
        }

        $model = $query
            ->orderBy('time_in', 'asc')
            ->get();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil mengambil sewa mini soccer',
            "data" => $model,
        ]);
    }

    public function create(Request $request)
    {
        $minisoccer = FacilityModel::where('is_mini_soccer', 1)->first();
        $model = new ReservationMiniSoccerModel();
        $model->fill($request->except('facility_id'));
        $model->facility_id = $minisoccer->id;
        $model->save();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil membuat sewa mini soccer',
            "data" => $model,
        ]);
    }

    public function update(Request $request)
    {
        $model = ReservationMiniSoccerModel::find($request->id);
        $model->fill($request->except('id'));
        $model->save();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil mengubah sewa mini soccer',
            "data" => $model,
        ]);
    }

    public function delete(Request $request)
    {
        $model = ReservationMiniSoccerModel::find($request->id);
        $model->delete();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil menghapus sewa mini soccer',
            "data" => $model,
        ]);
    }
}
