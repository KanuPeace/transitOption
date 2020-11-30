<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    use HasFactory , Constants;
    protected $guarded = [];

    public function getImage(){
        return route("read_file" , encrypt($this->companyVehicleImagePath."/".$this->image));
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class , 'vehicle_id');
    }
}
