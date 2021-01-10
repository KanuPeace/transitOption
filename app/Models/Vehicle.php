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

    public function images(){
        return $this->hasMany(VehicleImage::class , 'vehicle_id');
    }

    public function getPrice(){
        return format_money($this->price);
    }

     public function getDefaultImage(){
        $builder = $this->images;
        $image = $builder->where("default" , $this->activeStatus)->first();
        if(empty($image)){
            $image = $builder->first();
        }
        if(empty($image)){
            return my_asset("web/img/offer1.jpg");
        }
        return $image->getImage();
    }


    public function getBookingUrl(){
        return route("trave_guide.booking" , $this->code); 
    }
}
