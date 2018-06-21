<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function get_countries()
    {
        return config('countries');
    }

    public function get_states(Request $request)
    {
        $countryName = $request->input('country');

        $country = collect(config('countries'))->first(function ($country) use ($countryName) {
            return $country['name'] === $countryName;
        });

        //obtain specific country states
        if ($country) {
            $states = config('states')->filter(function ($state) use ($country) {
                                        return $state['countryCode'] === $country['code'];
                                    })->sort();
            return $states;
        }

        //no states found
        else {
            return [];
        }

    }
}
