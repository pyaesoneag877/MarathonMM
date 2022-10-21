<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;

class AuthController extends Controller
{
    public function index(){
        $users=User::latest();
        if(request('search')){
            $users=$users->where('name','LIKE','%'.request('search').'%')
                                ->orWhere('email','LIKE','%'.request('search').'%');
                                
        }
        return view('user.index',[
            'users'=>$users->paginate(5)
        ]);
    }

    public function store(){
  
        $formData = request()->validate([
            'name'=>['required','min:5','max:30'],
            'username'=>['required','min:5','max:30',ValidationRule::unique('users','username')],
            'email'=>['required','email', ValidationRule::unique('users','email')],
            'password'=>['required','min:8','max:30']
        ]);
        $user=User::create($formData);

        auth()->login($user);

        return redirect('/')->with('success','Hello... Welcome Dear, '.$user->name);
    }
    public function destroy(User $user){
        $user->delete();
        return $this->logout();
    }
    public function register(){
        return view('user.create');
    }
    public function login(){
        return view('user.login');
    }
    public function post_login(){
        $formData=request()->validate([
            'username'=>['required','max:30',ValidationRule::exists('users','username')],
            'password'=>['required','min:8','max:25']
        ]);
        
        if(auth()->attempt($formData)){
            return redirect('/')->with('success','Welcome Back');
        }else{
            return redirect()->back()->withErrors([
                "username"=>'User Credentials Wrong'
            ]);
        }
    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Good Bye');
    }
    public function edit(User $user){
        return view('user.edit',[
            'user'=>$user
        ]);
    }
    public function update(User $user){
        $formData = request()->validate([
            'name'=>['required','min:5','max:30'],
            'username'=>['required','min:5','max:30',ValidationRule::unique('users','username')],
            'email'=>['required','email', ValidationRule::unique('users','email')],
            'password'=>['required','min:8','max:30']
        ]);
       
        $user->update($formData);

        return redirect('/user')->with('success','Successfully, '.'"'.$user->name.'" '.'infomation updated' );
    }
    

}
