<?php

declare(strict_types=1);

namespace Pollen\Query;

use Pollen\Query\QueryBuilder\DateQueryBuilder;
use Pollen\Query\QueryBuilder\QueryBuilder;

class DateQuery extends QueryBuilder
{
    public function date(?string $key = null): DateQueryBuilder
    {
        return new DateQueryBuilder($key);
    }

    public function inclusive(): self
    {
        $current = &$this->stack[$this->depth];
        $current['inclusive'] = true;

        return $this;
    }
}
