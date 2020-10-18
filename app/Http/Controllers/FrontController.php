<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\BundlePrice;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function reserveView()
    {
        return view('reserve');
    }

    public function reservePost(Request $request)
    {
        $obj = $request->all();
        $d = BundlePrice::find($request->car_type_id);
        $obj['total'] = $d->price;
        $obj['car_type_id'] = $d->car_type_id;
        \App\Models\Request::create($obj);
        return redirect()->route('reserve')->with(['status'=>true]);
    }
}
