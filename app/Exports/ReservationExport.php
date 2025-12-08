<?php

namespace App\Exports;

use App\Models\Dashboard\Reservation\ReservationModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservationExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ReservationModel::select(
            'id',
            'facility_id',
            'name',
            'telp',
            'total_guest',
            'check_in',
            'check_out',
            'note',
            'extra_bed',
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
            'Total Guest',
            'Check In',
            'Check Out',
            'Note',
            'Extra Bed',
            'Status',
            'Created At',
            'Updated At'
        ];
    }
}
