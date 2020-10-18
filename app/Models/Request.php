<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bundle()
    {
        return $this->belongsTo(Bundle::class);
    }

    public function car()
    {
        return $this->belongsTo(CarType::class,'car_type_id','id');
    }

    public function array()
    {
        return json_encode([
            'name'=>$this->name,
            'id'=>$this->id,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'total'=>$this->total,
            'bundle'=>$this->bundle()->first()->name,
            "car"=>$this->car()->first()->name,
            "state"=>$this->state,
            "address"=>$this->address,
            "day"=>$this->day,
            "time"=>$this->time,
        ]);
    }


}
