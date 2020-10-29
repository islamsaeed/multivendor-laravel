<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Requests\ShippingsRequest;
use DB;
class SettingsController extends Controller
{
    public function editShippingsMethods($type) {
            // free inner outer for shipping  method
           if($type === 'free')
                  $shippingSetting = Setting::where('key','free_shipping_label')->first();

           elseif($type === 'inner')
                 $shippingSetting = Setting::where('key','local_shipping_label')->first();

           elseif($type === 'outer')
                $shippingSetting = Setting::where('key','outer_label')->first();

           else
              $shippingSetting = Setting::where('key','free_shipping_label')->first();

        return view('dashboard.settings.shippings.edit',compact('shippingSetting'));
    }

    public function updateShippingsMethods(ShippingsRequest $request , $id) {

         //validation

         //update database

        try {

            $shipping_method = Setting::find($id);

            DB::beginTransaction();

            $shipping_method->update([
            'plain_value' => $request->plain_value
            ]);
            $shipping_method->value = $request->value;
            $shipping_method->save();
              DB::commit();

            return  redirect()->back()->with(['success'=>'تم التحديث بنجاح  ']);

        } catch (\Exception $ex) {
            //throw $ex;
            return  redirect()->back()->with(['error'=>'هنا خطاء ما  يرجى المحاوله فيما بعد']);
            DB::rollback();
        }

    }
}
