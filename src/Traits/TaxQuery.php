<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

use Pollen\Query\QueryBuilder\SubQuery;
use Pollen\Query\Traits\Query\SubQuery as SubQueryTrait;

trait TaxQuery
{
    protected ?array $taxQuery = null;

    use SubQueryTrait {
        SubQueryTrait::query as genericQuery;
    }

    public function taxQuery(callable|SubQuery $callback): self
    {
        $this->initQuery('tax');

        return $this->genericQuery($callback);
    }
}
