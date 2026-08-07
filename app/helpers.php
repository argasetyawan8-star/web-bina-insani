<?php

use App\Models\Setting;

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        $setting = Setting::first();

        if (! $setting) {
            return $default;
        }

        return $setting->{$key} ?? $default;
    }

}