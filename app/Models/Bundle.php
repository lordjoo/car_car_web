<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function prices()
    {
        return $this->hasMany(BundlePrice::class);
    }

    public function carPrices()
    {
        return $this->hasMany(BundlePrice::class);
    }

    public function printPrices()
    {
        if ($this->prices()->count()) {
            echo "<ul>";
            foreach ($this->prices()->get() as $p){
                echo "<li>"."سيارة ".$p->car()->first()->name . " " . $p->price . "شيكل " ."</li>";
            }
            echo "</ul>";
        } else {
            echo "برجاء اضافة اسعار الباقة";
        }
    }
    public function printPricesJSON()
    {
        if ($this->prices()->count()) {
            $json = [];
            foreach ($this->prices()->get() as $p){
                $jso = [];
                $jso['name'] = $p->car()->first()->name;
                $jso['id'] = $p->id;
                $jso['price'] = $p->price;
                $json[] = $jso;
            }
            return $json;
        } else {
            return [];
        }
    }


}
