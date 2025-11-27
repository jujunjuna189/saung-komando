<?php

namespace App\Models\Dashboard\Promotion;

use App\Models\Dashboard\Facility\FacilityModel;
use Illuminate\Database\Eloquent\Model;

class PromotionModel extends Model
{
    protected $table = 'promotion';
    protected $guarded = ['id'];

    public function facility()
    {
        return $this->hasOne(FacilityModel::class, 'id', 'facility_id');
    }
}
