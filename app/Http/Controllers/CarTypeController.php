<?php

namespace App\Http\Controllers;

use App\Models\CarType;
use Illuminate\Http\Request;

class CarTypeController extends Controller
{
    public function index()
    {
        $cars = CarType::paginate(10);
        return view('auth.cars',compact("cars"));
    }

    public function store(Request $request)
    {
        CarType::create(['name'=>$request->name]);
        return redirect()->route('cars.index');
    }

    public function update($carType,Request  $request)
    {
        $carType = CarType::findOrFail($carType);
        $carType->name = $request->name;
        $carType->save();
        return redirect()->route('cars.index');
    }

    public function destroy($id)
    {
        CarType::destroy($id);
        return redirect()->route('cars.index');
    }
}
