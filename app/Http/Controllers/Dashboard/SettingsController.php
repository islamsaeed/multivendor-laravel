<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function editShippingsMethods($type) {
            // free inner outer for shipping  method
           if($type === 'free')
                $shippingSetting = Setting::where('key','free_shipping_label')->first();

           elseif($type === 'inner')
               $shippingSetting = Setting::where('key','local_label')->first();

           elseif($type === 'outer')
               $shippingSetting = Setting::where('key','outer_label')->first();

           else
              $shippingSetting = Setting::where('key','free_shipping_label')->first();

        return view('dashboard.settings.shippings.edit',compact('shippingSetting'));
    }

    public function updateShippingsMethods(Request $request , $id) {

         //validation

         //update database
    }
}
