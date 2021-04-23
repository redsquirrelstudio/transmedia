<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;

class SettingsController extends Controller
{
    public function toggle(string $key): RedirectResponse
    {
        $setting = Setting::where('key', $key)->first();
        if ($setting){
            $setting->enabled = !$setting->enabled;
            $setting->save();
        }
        return redirect('/admin');
    }
}
