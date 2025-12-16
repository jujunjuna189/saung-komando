<?php

namespace App\Http\Controllers\Public\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Reservation\ReservationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        if ($request->date_start && $request->date_end) {
            $start = Carbon::parse($request->date_start)->startOfDay();
            $end   = Carbon::parse($request->date_end)->endOfDay();
        } elseif ($request->filter_month) {
            [$year, $month] = explode('-', $request->filter_month);

            $base = Carbon::createFromDate($year, $month, 1);

            $start = $base->copy()
                ->subMonths(2)
                ->startOfMonth()
                ->startOfDay();

            $end = $base->copy()
                ->addMonths(2)
                ->endOfMonth()
                ->endOfDay();
        } else {

            $start = Carbon::now()
                ->subMonths(2)
                ->startOfMonth()
                ->startOfDay();

            $end = Carbon::now()
                ->addMonths(2)
                ->endOfMonth()
                ->endOfDay();
        }

        $query->where(function ($q) use ($start, $end) {
            $q->where('check_in', '<=', $end)
                ->where('check_out', '>=', $start);
        });

        $model = $query
            ->orderBy('is_pinned', 'desc')
            ->orderBy('check_in', 'asc')
            ->get();

        return response()->json([
            "status" => "success",
            "message" => "Berhasil mengambil reservasi",
            "data" => $model,
            "meta" => [
                "date_start" => $start->toDateString(),
                "date_end" => $end->toDateString(),
            ]
        ]);
    }
}
