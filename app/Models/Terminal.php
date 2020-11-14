<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory , Constants;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

}
