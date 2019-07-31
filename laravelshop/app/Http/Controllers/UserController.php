<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;
use Hash;
use DB; 
use App\Http\Requests\RegisterRequest;
class UserController extends Controller
{
    
    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }
    
    public function handleProviderCallback($social)
    {
        $user = Socialite::driver($social)->user();
        // dd($user);
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        return redirect('/');
        // $user->token;
    }

    private function findOrCreateUser($user)
    {
    	$authUser = User::where('social_id', $user->id)->first();
    	if($authUser){
    		return $authUser;
    	}else{
    		User::create([
    			'name' => $user->name,
    			'email' => $user->email,
    			'password' => '123456',
    			'social_id' => $user->id 
    		]);
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }

    public function getLogin()
    {
    	return view('layouts.signin');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email','password');
        if(Auth::attempt($data,$request->has('rememberme'))){
            session()->flash('messages', 'Đăng nhập thành công');
            return redirect('/');
        }else{
            session()->flash('error', 'Tài khoản đăng nhập hoặc mật khẩu không đúng');
            return redirect('/');
        }
    }

    public function getRegister()
    {
        return view('layouts.signup');
    }


    public function postRegister(RegisterRequest $request)
    {   
    	$data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        Auth::login($user);
        return redirect('/')->with('messages','Đăng ký tài khoản thành công');
    }

    public function getDashboard()
    {
        $users = DB::table('users')->count();
        $images = DB::table('images')->count();
        $categories = DB::table('category')->count();
        $products = DB::table('product')->count();
        $producttypes = DB::table('producttype')->count();
        $bills = DB::table('bills')->count();
        $slides = DB::table('slide')->count();

        return view('admin.dashboard', compact('users', 'images', 'products', 'producttypes', 'bills', 'categories', 'slides'));
    }

    
}
