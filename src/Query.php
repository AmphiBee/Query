<?php

declare(strict_types=1);

namespace Pollen\Query;

use Pollen\Query\QueryBuilder\DateQueryBuilder;
use Pollen\Query\QueryBuilder\MetaQueryBuilder;

class Query
{
    public static function meta(string $key)
    {
        return new MetaQueryBuilder($key);
    }

    public static function date(string $key)
    {
        return new DateQueryBuilder($key);
    }
}
