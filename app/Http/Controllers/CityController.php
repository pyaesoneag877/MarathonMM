<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

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

    public function create(){
        return view('city_create');
    }

    public function store(){
  
        $formData = request()->validate([
            'name'=>['required','min:5','max:30',ValidationRule::unique('cities','name')],
            'name_mm'=>['required','min:5','max:30',ValidationRule::unique('cities','name_mm')]
        ]);
        $city=City::create($formData);

        return redirect('/city')->with('success','Successfully, new city '.'"'.$city->name.'" '.'created' );
    }

    public function edit(City $city){
        return view('city_edit',[
            'city'=>$city
        ]);
    }

    public function update(City $city){
        $formData = request()->validate([
            'name'=>['required','min:5','max:30',ValidationRule::unique('cities','name')],
            'name_mm'=>['required','min:5','max:30',ValidationRule::unique('cities','name_mm')]
        ]);
       
        $city->update($formData);

        return redirect('/city')->with('success','Successfully, '.'"'.$city->name.'" '.'city updated' );
    }

    public function destroy(City $city){
        $city->delete();
        return back();
    }

}
