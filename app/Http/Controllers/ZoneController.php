<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;

class ZoneController extends Controller
{
    public function index(){
        return view('zone.index',[
            'zones'=>Zone::latest()->filter(request(['search','city']))->paginate(5),
            'cities'=>City::all()
        ]);
    }
    public function destroy(Zone $zone){
        $zone->delete();
        return back();
    }
    public function create(){
        return view('zone.create',[
            'cities'=>City::all()
        ]);
    }
    public function store(){
        $formData = request()->validate([
            'name'=>['required','min:5','max:20',ValidationRule::unique('zones','name')],
            'name_mm'=>['required','min:5','max:20',ValidationRule::unique('zones','name_mm')],
            'city_id'=>['required',ValidationRule::exists('cities','id')]
        ]);
        $zone=Zone::create($formData);

        return redirect('/zone')->with('success','Successfully, new zone '.'"'.$zone->name.'" '.'created' );
    }

    public function edit(Zone $zone){
        return view('zone.edit',[
            'zone'=>$zone,
            'cities'=>City::all()
        ]);
    }

    public function update(Zone $zone){
        $formData = request()->validate([
            'name'=>['required','min:5','max:30',ValidationRule::unique('zones','name')],
            'name_mm'=>['required','min:5','max:30',ValidationRule::unique('zones','name_mm')],
            'city_id'=>['required',ValidationRule::exists('cities','id')]
        ]);
        
        $zone->update($formData);

        return redirect('/zone')->with('success','Successfully, '.'"'.$zone->name.'" '.'zone updated' );
    }
    
    
}
