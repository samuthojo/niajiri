<?php
/**
 * Check if value isset and not empty
 */
if (!function_exists('is_set')) {

    function is_set($value = null)
    {
        return isset($value) && !empty($value);
    }

}


/**
 * Display an object field value or N/A
 */
if (!function_exists('display_or_na')) {

    function display_or_na($value = null, $field = null)
    {
        if (is_set($value)) {
            if(is_object($value) && is_set($field)){
                $value = object_get($value, $field, 'N/A');
            }
            return $value;
        } else {
            return 'N/A';
        }
    }

}

/**
 * Display value as a currency
 */
if (!function_exists('display_currency')) {

    function display_currency($value = null)
    {
        if (is_set($value)) {
            return config('app.currency.display') . number_format($value, 2);
        } else {
            return config('app.currency.display') . ' 0.0';
        }
    }

}

/**
 * Display decimal in as formatted decimal
 */
if (!function_exists('display_decimal')) {

    function display_decimal($value = null)
    {
        if (is_set($value)) {
            return number_format($value, 2);
        } else {
            return '0';
        }
    }
}

/**
 * Display value as integer
 */
if (!function_exists('display_int')) {

    function display_int($value = null)
    {
        if (is_set($value)) {
            return number_format($value, 0);
        } else {
            return '0';
        }
    }
}

/**
 * Display value as boolean
 */
if (!function_exists('display_boolean')) {

    function display_boolean($value = null, $yesLabel = 'Yes', $falseLabel = 'No')
    {
        if (is_set($value)) {
            return $value ? $yesLabel : $noLabel;
        } else {
            return $falseLabel;
        }
    }
}

/**
 * Display value as formatted date or N/A
 */
if (!function_exists('display_date')) {

    function display_date($value = null)
    {
        if (is_set($value)) {
            return $value->format(config('app.datepicker_parse_format'));
        } else {
            return 'N/A';
        }
    }

}
