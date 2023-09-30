<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

use Pollen\Query\QueryBuilder\SubQuery;
use Pollen\Query\Traits\Query\SubQuery as SubQueryTrait;

trait DateQuery
{
    /**
     * @var array<string|array>
     */
    protected ?array $dateQuery = null;

    use SubQueryTrait {
        SubQueryTrait::query as genericQuery;
    }

    public function dateQuery(callable|SubQuery $callback): self
    {
        $this->initQuery('date');

        return $this->genericQuery($callback);
    }
}
