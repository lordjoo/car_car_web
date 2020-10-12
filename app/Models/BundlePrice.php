<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundlePrice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo(CarType::class,'car_type_id','id');
    }

}
