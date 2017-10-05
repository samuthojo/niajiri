<?php

namespace App\Traits;

/**
 * Extends a eloquent query builder with english sentence adjoin(s) sugars
 */
trait Sugarize
{
    /**
     * Scope a query with `who` sugar
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWho($query)
    {
        return $query;
    }

    /**
     * Scope a query with `which` sugar
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhich($query)
    {
        return $query;
    }

    /**
     * Scope a query with `are` sugar
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAre($query)
    {
        return $query;
    }

    /**
     * Scope a query with `is` sugar
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIs($query)
    {
        return $query;
    }

    /**
     * Scope a query with `expect` sugar
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpect($query)
    {
        return $query;
    }

    /**
     * Scope a query with `to` sugar
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTo($query)
    {
        return $query;
    }
}
