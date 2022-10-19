<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        $users=User::latest();
        if(request('search')){
            $users=$users->where('name','LIKE','%'.request('search').'%')
                                ->orWhere('email','LIKE','%'.request('search').'%');
                                
        }
        return view('user_index',[
            'users'=>$users->paginate(5)
        ]);
    }

    public function destroy(User $user){
        $user->delete();
        return back();
    }

    public function login(){
        return view('login');
    }
}
