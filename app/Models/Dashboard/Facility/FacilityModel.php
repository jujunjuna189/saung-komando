<?php

namespace App\Models\Dashboard\Facility;

use Illuminate\Database\Eloquent\Model;

class FacilityModel extends Model
{
    protected $table = 'facility';
    protected $guarded = ['id'];

    public function specification()
    {
        return $this->hasMany(FacilitySpecificationModel::class, 'facility_id', 'id');
    }

    public function thumbnails()
    {
        return $this->hasMany(FacilityThumbnailModel::class, 'facility_id', 'id');
    }
}
