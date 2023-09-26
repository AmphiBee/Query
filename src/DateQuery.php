<?php

declare(strict_types=1);

namespace Pollen\Query;

use Pollen\Query\QueryBuilder\DateQueryBuilder;
use Pollen\Query\QueryBuilder\QueryBuilder;

class DateQuery extends QueryBuilder
{
    public function date(string $key = null)
    {
        return new DateQueryBuilder($key);
    }

    public function inclusive()
    {
        $current = &$this->stack[$this->depth];
        $current['inclusive'] = true;

        return $this;
    }
}
