<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory , Constants;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function seatStyle(){
        return $this->belongsTo(VehicleSeatStyle::class , "vehicle_seat_style_id");
    }
}
