<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use App\Models\Zone;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        // $customers=Customer::latest();
        // if(request('search')){
        //     $customers=$customers->where('name','LIKE','%'.request('search').'%')
        //                         ->orWhere('phone_no','LIKE','%'.request('search').'%');
                                
        // }
        return view('customer_index',
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
}
