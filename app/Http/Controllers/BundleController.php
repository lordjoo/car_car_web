<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\BundlePrice;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    public function index()
    {
        $bundles = Bundle::paginate(15);
        return view('auth.bundles',compact('bundles'));
    }

    public function store (Request  $request)
    {
        Bundle::create([
            'name'=>$request->name,
            "desc"=>$request->desc,
        ]);
        return redirect()->route('bundles.index');
    }

    public function addPrice(Request $request)
    {
        $bundle = Bundle::findOrFail($request->id);
        $bundle->carPrices()->create([
            'car_type_id'=>$request->car_type,
            "price"=>$request->price
        ]);
        return redirect()->route('bundles.index');
    }

    public function getPrices($id)
    {
        $bundle = Bundle::findOrFail($id);
        return response()->json($bundle->printPricesJSON());
    }

    public function delPrices($id)
    {
        $p = BundlePrice::findOrFail($id);
        $p->delete();
        return response()->json(['status'=>true]);
    }

}
