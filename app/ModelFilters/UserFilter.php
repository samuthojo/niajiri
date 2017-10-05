<?php

namespace App\ModelFilters;

use App\User;

/**
 * Prepare user query filter from query parameters
 */
class UserFilter extends BaseFilter
{

    public function gender($value)
    {
        if (!static::isAll($value)) {
            $this->where('gender', $value);
        }
    }

    public function startCreatedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('created_at', '>=', $value);
        }
    }

    public function endCreatedAt($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('created_at', '<=', $value);
        }
    }

}
