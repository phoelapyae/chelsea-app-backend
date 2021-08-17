<?php

if (!function_exists('active_segment')) {
    function active_segment($index, $path)
    {
        return request()->segment($index) === $path ? 'active' : '';
    }
}

if (!function_exists('show_segment')) {
    function show_segment($index, $path)
    {
        return request()->segment($index) === $path ? 'show' : '';
    }
}

if (!function_exists('active_path')) {

    function active_path($path = null)
    {
        $path = is_null($path)
            ? config('app.admin_prefix')
            : config('app.admin_prefix') . '/' . $path;

        return request()->is($path) ? 'active' : '';
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file, $imagePath)
    {
        $imageDir = public_path() . $imagePath;
        $name = time() . str_random(6) . '.' . $file->getClientOriginalExtension();
        $file->move($imageDir, $name);
        return $name;
    }
}

if (!function_exists('getImage')) {
    function getImage($imagePath)
    {
        return public_path() . $imagePath;
    }
}

if (!function_exists('str_random')) {
    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int  $length
     * @return string
     *
     * @throws \RuntimeException
     */
    function str_random($length = 16)
    {
        return \Str::random($length);
    }
}
