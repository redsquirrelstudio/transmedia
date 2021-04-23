<?php


namespace App\Http\Helpers;

use App\Models\Setting;

class Options
{
    public static function get(string $key): bool
    {
        $setting = Setting::where('key', $key)->first();
        return $setting->enabled ?? false;
    }
}
