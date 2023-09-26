<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

use Pollen\Query\QueryBuilder\SubQuery;
use Pollen\Query\Traits\Query\SubQuery as SubQueryTrait;

trait MetaQuery
{
    protected ?array $metaQuery = null;

    use SubQueryTrait {
        SubQueryTrait::query as genericQuery;
    }

    public function metaQuery(callable|SubQuery $callback): self
    {
        $this->initQuery('meta');

        return $this->genericQuery($callback);
    }
}
