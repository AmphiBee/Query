<?php

declare(strict_types=1);

namespace Pollen\Query\Traits\Query;

use Pollen\Query\QueryBuilder\SubQuery as SubQueryAbstract;

trait SubQuery
{
    protected ?string $queryType = null;

    public function initQuery(string $type): self
    {
        $this->queryType = $type;

        return $this;
    }

    public function query(callable|SubQueryAbstract $callback): self
    {
        $queryField = $this->queryType.'Query';

        if (! $this->{$queryField}) {
            $this->{$queryField} = ['relation' => 'AND'];
        }

        if (! isset($this->queryBuilder[$this->queryType])) {
            $class = '\\Pollen\\Query\\'.ucfirst($this->queryType).'Query';
            $this->queryBuilder[$this->queryType] = new $class();
        }

        if ($callback instanceof SubQueryAbstract) {
            $subQuery = $callback->get();
            if (isset($subQuery['state']) && $subQuery['state']) {
                $state = $subQuery['state'];
                unset($subQuery['state']);
                $this->{$queryField}[$state] = $subQuery;
            } else {
                unset($subQuery['state']);
                $this->{$queryField} = array_merge($this->{$queryField}, [$subQuery]);
            }
        } else {
            $callback($this->queryBuilder[$this->queryType]);
            $this->{$queryField} = array_merge($this->{$queryField}, $this->queryBuilder[$this->queryType]->get());
        }

        return $this;
    }
}
