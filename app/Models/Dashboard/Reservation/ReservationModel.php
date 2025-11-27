<?php

namespace App\Models\Dashboard\Reservation;

use App\Models\Dashboard\Facility\FacilityModel;
use Illuminate\Database\Eloquent\Model;

class ReservationModel extends Model
{
    protected $table = 'reservation';
    protected $guarded = ['id'];

    public function facility()
    {
        return $this->hasOne(FacilityModel::class, 'id', 'facility_id');
    }
}
