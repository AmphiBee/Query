<?php

declare(strict_types=1);

namespace Pollen\Query;

use Pollen\Query\QueryBuilder\QueryBuilder;
use Pollen\Query\QueryBuilder\TaxQueryBuilder;

class TaxQuery extends QueryBuilder
{
    public function taxonomy(string $taxonomy)
    {
        return new TaxQueryBuilder($taxonomy);
    }
}
