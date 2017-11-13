<?php

namespace App\ModelFilters;

use App\User;

/**
 * Prepare user query filter from query parameters
 */
class UserFilter extends BaseFilter
{
    public function name($value)
    {
        if (!static::isAll($value)) {
            $this->where('name', $value);
        }
    }

    public function firstName($value)
    {
        if (!static::isAll($value)) {
            $this->where('first_name', $value);
        }
    }

    public function middleName($value)
    {
        if (!static::isAll($value)) {
            $this->where('middle_name', $value);
        }
    }


    public function surname($value)
    {
        if (!static::isAll($value)) {
            $this->where('surname', $value);
        }
    }

    public function email($value)
    {
        if (!static::isAll($value)) {
            $this->where('email', $value);
        }
    }

    public function secondaryEmail($value)
    {
        if (!static::isAll($value)) {
            $this->where('secondary_email', $value);
        }
    }

    public function alternativeMobile($value)
    {
        if (!static::isAll($value)) {
            $this->where('alternative_mobile', $value);
        }
    }

    public function landline($value)
    {
        if (!static::isAll($value)) {
            $this->where('landline', $value);
        }
    }

    public function fax($value)
    {
        if (!static::isAll($value)) {
            $this->where('fax', $value);
        }
    }

    public function physicalAddress($value)
    {
        if (!static::isAll($value)) {
            $this->where('physical_address', $value);
        }
    }

    public function postalAddress($value)
    {
        if (!static::isAll($value)) {
            $this->where('postal_address', $value);
        }
    }

    public function gender($value)
    {
        if (!static::isAll($value)) {
            $this->where('gender', $value);
        }
    }

     public function startDob($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('dob', '>=', $value);
        }
    }

    public function endDob($value)
    {
        $value = static::parseDate($value);
        if (!empty($value)) {
            $this->whereDate('dob', '<=', $value);
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
