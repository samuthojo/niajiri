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
