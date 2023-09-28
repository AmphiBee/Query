<?php

declare(strict_types=1);

namespace Pollen\Query;

use Pollen\Query\QueryBuilder\DateQueryBuilder;
use Pollen\Query\QueryBuilder\MetaQueryBuilder;

class Query
{
    public static function meta($key)
    {
        return new MetaQueryBuilder($key);
    }

    public static function date($key)
    {
        return new DateQueryBuilder($key);
    }
}
