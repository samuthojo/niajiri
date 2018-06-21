<?php
/**
 * Check if current path match provided path
 */
if (!function_exists('isActivePath')) {

    function isActivePath($path = null)
    {
        $active = '';
        if (isset($path) && !empty($path)) {
            $path = url($path);
            $request_path = \Request::fullUrl();
            if ($request_path === $path) {
                $active = 'active';
            }
        }
        return $active;
    }

}

if (!function_exists('display_url')) {
    function display_url($url = null)
    {
        if(is_set($url) && !(starts_with('http://', $url) || starts_with('https://', $url))){
            $url = 'http://'.$url;
        }

        return $url;
    }
}

