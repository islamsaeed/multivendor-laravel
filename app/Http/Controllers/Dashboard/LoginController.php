<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
  public function login() {

     return view('dashboard.auth.login');
  }

  public function postlogin(AdminLoginRequest $request) {

       //validatiion
       //check , store , update
       $remember_me = $request->has('remember_me') ? true : false;


       if(auth()->guard('admin')->
          attempt([

           'email'=> $request->input('email'),
           'password'=>$request->input('password')],
            $remember_me)) {
             //Notify success('تم الدخول بنجاحطط');
             return redirect()->route('admin.dashboard');
            }
           // notify()->error('خطاء ف البيانات يرجى المحاوله ');

           return redirect()->back()->with(['error' => 'هناك خطاء ف البيانات ']);


  }
  public function logout() {

    $guard = $this->getGuard();
    $guard->logout();

    return  redirect()->route('admin.login');
  }

  private function getGuard() {

     return auth('admin');

  }
}
