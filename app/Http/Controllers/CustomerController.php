<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers=Customer::latest();
        if(request('search')){
            $customers=$customers->where('name','LIKE','%'.request('search').'%')
                                ->orWhere('phone_no','LIKE','%'.request('search').'%');
                                
        }
        return view('customer_index',
        [
            'customers'=>$customers->paginate(5)
        ]);
    }


    public function destroy(Customer $customer){
        $customer->delete();
        return back();
    }
}
