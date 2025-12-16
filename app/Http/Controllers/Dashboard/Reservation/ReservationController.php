<?php

namespace App\Http\Controllers\Dashboard\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Reservation\ReservationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function show(Request $request)
    {
        $query = ReservationModel::with('facility');

        if ($request->facility_id) {
            $query->where('facility_id', $request->facility_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->filter_month && $request->filter_month !== 'Semua') {

            // Ambil tahun dan bulan
            [$year, $month] = explode('-', $request->filter_month);

            // Filter berdasarkan year & month dari check_in
            $query->whereYear('check_in', $year)
                ->whereMonth('check_in', $month);
        } else {
            $nowYear = date('Y');
            $nowMonth = date('m');

            $query->whereYear('check_in', $nowYear)
                ->whereMonth('check_in', $nowMonth);
        }

        $model = $query
            ->orderBy('is_pinned', 'desc')
            ->orderBy('check_in', 'asc')
            ->get();

        return response()->json([
            "status" => 'success',
            "message" => 'Berhasil mengambil reservasi',
            "data" => $model,
        ]);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach (json_decode($request->facility_id) as $val) {
                $model = new ReservationModel();
                $model->fill($request->except('facility_id'));
                $model->facility_id = $val;
                $model->save();
            }

            DB::commit();
            return response()->json([
                "status" => 'success',
                "message" => 'Berhasil membuat reservasi',
                "data" => $model,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
        }
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

    public function pin(Request $request)
    {
        $model = ReservationModel::find($request->id);

        if (! $model) {
            return response()->json([
                'status' => 'error',
                'message' => 'Reservation not found',
                'debug' => $request->all()
            ], 404);
        }

        $model->is_pinned = $request->is_pinned;
        $model->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah status pin',
            'data' => $model,
        ]);
    }
}
