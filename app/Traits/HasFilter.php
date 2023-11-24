<?php

namespace App\Traits;

use App\Filters\BaseFilter;

trait HasFilter
{
    public function scopeFilter($query, BaseFilter $filters)
    {
        return $filters->apply($query);
    }
}
