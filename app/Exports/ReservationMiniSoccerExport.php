<?php

namespace App\Exports;

use App\Models\Dashboard\Reservation\ReservationMiniSoccerModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservationMiniSoccerExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ReservationMiniSoccerModel::select(
            'id',
            'facility_id',
            'name',
            'telp',
            'date',
            'time_in',
            'time_out',
            'note',
            'status',
            'created_at',
            'updated_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Facility ID',
            'Nama',
            'Telp',
            'Tanggal',
            'Jam Mulai',
            'Jam Selesai',
            'Catatan',
            'Status',
            'Created At',
            'Updated At'
        ];
    }
}