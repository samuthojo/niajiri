<?php

namespace App\Traits;

/**
 * Extends a model with with ability to eager load relations.
 */
trait Withable
{
    /**
     * relations to eager load. Using class must define it.
     * @var array
     */
    // protected $withables = [];

    //------------------------------------------------------------
    //scopes
    //------------------------------------------------------------

    /**
     * Scope a query with model to eager load
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  array|string  $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePopulate($query, $relations = null)
    {
        //obtain dynamic relations
        if (!empty($relations)) {
            $relations = is_string($relations) ? collect([])->push($relations) : collect($relations);
        }

        //obtain relations to eager load
        $model = $query->getModel();
        $withables = $model->withables;

        //merge passed relations
        $withables = collect([])->merge($withables)->merge($relations);
        $withables = $withables->reject(function ($value) {
            return empty($value);
        });
        $withables = $withables->all();

        //eager load relations if available
        $hasWithables = !empty($withables);
        if ($hasWithables) {
            $query->with($withables);
        }

        //try cache query results
        $ttl = config('cache.ttl');
        $shouldCacheQuery = !empty($ttl);
        if ($shouldCacheQuery) {
            $query->remember($ttl);
        }

        return $query;
    }

    /**
     * Begin querying the model allow with ability to eager load `withables`
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function query()
    {
        $query = parent::query();

        //eager load relations if available
        $query->populate();

        return $query;
    }
}
