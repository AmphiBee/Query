<?php

declare(strict_types=1);

namespace Pollen\Query;

use Pollen\Query\QueryBuilder\MetaQueryBuilder;
use Pollen\Query\QueryBuilder\QueryBuilder;

class MetaQuery extends QueryBuilder
{
    public function meta($key)
    {
        return new MetaQueryBuilder($key);
    }
}
