<?php


namespace App\Http\Helpers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;

class Options
{
    public static function get(string $key): bool
    {
        if(!Schema::hasTable('setting')){
            return false;
        }
        $setting = Setting::where('key', $key)->first();
        return $setting->enabled ?? false;
    }
}
