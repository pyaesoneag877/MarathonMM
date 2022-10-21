<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;

class CustomerController extends Controller
{
    public function index(){
        return view('customer.index',
        [
            'customers'=>Customer::latest()->filter(request(['search','city','zone']))->paginate(5),
            'zones'=>Zone::all(),
            'cities'=>City ::all()
        ]);
    }
    public function destroy(Customer $customer){
        $customer->delete();
        return back();
    }
    public function create(){
        return view('customer.create',[
            'zones'=>Zone::all(),
            'cities'=>City::all()
        ]);
    }
    public function store(){
        $formData = request()->validate([
            'name'=>['required','min:5','max:20'],
            'phone_no'=>['required','min:5','max:20',ValidationRule::unique('customers','phone_no')],
            'city_id'=>['required',ValidationRule::exists('cities','id')],
            'zone_id'=>['required',ValidationRule::exists('zones','id')],
            'address'=>['required','min:5']
        ]);
        $customer=Customer::create($formData);

        return redirect('/')->with('success','Successfully, new customer '.'"'.$customer->name.'" '.'created' );
    }
    public function edit(Customer $customer){
        return view('customer.edit',[
            'customer'=>$customer,
            'zones'=>Zone::all(),
            'cities'=>City::all()
        ]);
    }

    public function update(Customer $customer){
        $formData = request()->validate([
            'name'=>['required','min:5','max:20'],
            'phone_no'=>['required','min:5','max:20',ValidationRule::unique('customers','phone_no')],
            'city_id'=>['required',ValidationRule::exists('cities','id')],
            'zone_id'=>['required',ValidationRule::exists('zones','id')],
            'address'=>['required','min:5']
        ]);
        
        $customer->update($formData);

        return redirect('/')->with('success','Successfully, '.'"'.$customer->name.'" '.'infomation updated' );
    }

}
