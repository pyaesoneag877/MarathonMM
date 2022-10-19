<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $cities=City::latest();
        if(request('search')){
            $cities=$cities->where('name','LIKE','%'.request('search').'%')
                                ->orWhere('name_mm','LIKE','%'.request('search').'%');
                                
        }
        return view('city_index',[
            'cities'=>$cities->paginate(5)            
        ]);
    }

    public function destroy(City $city){
        $city->delete();
        return back();
    }

    public function search(City $city){
        return view('zone_index', [
            'zones'=>$city->zones,
            'cities'=>City::latest()->get()
        ]);
    }

}
