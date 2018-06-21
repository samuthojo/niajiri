<?php

namespace App\Traits;

trait Countable
{
    /**
     * Scope a query with field to count
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  array|string  $columns
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCounts($query, $columns = null)
    {
        // obtain summary
        if (!empty($columns)) {
            $columns = is_string($columns) ? collect([])->push($columns) : collect($columns);
        }

        //merge count sql expressions with columns to select
        $columns = collect([\DB::raw('count(*) as count')])->merge($columns);
        $columns = $columns->reject(function ($value) {
            return empty($value);
        });
        $columns = $columns->all();

        //select columns to be included in counts
        $query->select($columns);

        return $query;
    }
}
