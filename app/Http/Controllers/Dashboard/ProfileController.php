<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function editprofile() {



        $admin = Admin::find(auth('admin')->user()->id);
       return view('dashboard.profile.edit',compact('admin'));

    }

    public function updateprofile(ProfileRequest $request) {
        //validate
        //update
        try {

        $admin=Admin::find(auth('admin')->user()->id);


        if ($request->filled('password')) {

              $request->merge(['password' => bcrypt($request->password)]);
        }

        unset($request['id']);
        unset($request['password_confirmation']);



           $admin->update($request->all());

            return  redirect()->back()->with(['success'=>'تم التحديث بنجاح  ']);



        } catch (\Exception $ex) {
            //throw $ex;
            return  redirect()->back()->with(['error'=>'هنا خطاء ما  يرجى المحاوله فيما بعد']);


        }
    }


   
}
