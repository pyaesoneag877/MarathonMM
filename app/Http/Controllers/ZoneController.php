<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index(){
        return view('zone_index',[
            'zones'=>Zone::latest()->filter(request(['search','city']))->paginate(5),
            'cities'=>City::all()
        ]);
    }

    public function destroy(Zone $zone){
        $zone->delete();
        return back();
    }
    
    // public function filter(City $cityId){
    //     return view('zone_index',[
    //         'zones'=>$cityId->zones->last()->paginate(5),
    //         'cities'=>City::latest()->get()
    //     ]);
    // }
    
}
