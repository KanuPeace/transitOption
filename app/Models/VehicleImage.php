<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    use HasFactory , Constants;
    protected $guarded = [];

    public function getImagePath(){ 
        return $this->companyVehicleImagePath."/".$this->image;
    }

    public function getImage(){
        return readFileUrl("encrypt" ,$this->getImagePath());
    }
    

    public function vehicle(){
        return $this->belongsTo(Vehicle::class , 'vehicle_id');
    }
}
