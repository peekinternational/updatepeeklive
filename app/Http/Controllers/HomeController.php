<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public function home(){
		$plans = DB::table('payment_plan')->get();
		return view('welcome',compact('plans'));
	}

       public function login(Request $request){
		
		$user = DB::table('users')
		->where('email',$request->input('email'))->where('password',md5($request->input('password')))
		->first();
		if($user){
		  Session::put('userInfo',$user);
		  return redirect('/dashboard');
		}else{
			return redirect()->back();
		}
		
	}
	public function logout(){
		Session::forget('userInfo');
		return redirect('/');
	}
	public function checkout($id){
		$plan = DB::table('payment_plan')->where('id',$id)->first();
		return view('checkout',compact('plan'));
	}
}
