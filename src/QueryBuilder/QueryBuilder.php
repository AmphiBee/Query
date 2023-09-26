<?php

declare(strict_types=1);

namespace Pollen\Query\QueryBuilder;

class QueryBuilder
{
    protected $query;

    protected $stack;

    protected $depth;

    protected $lastRelation;

    public function __construct()
    {
        $this->query = ['relation' => 'AND'];
        $this->stack = [&$this->query];
        $this->depth = 0;
        $this->lastRelation = [];
    }

    public function where($callbackOrKey)
    {
        return $this->addCondition('AND', $callbackOrKey);
    }

    public function andWhere($callbackOrKey)
    {
        return $this->addCondition('AND', $callbackOrKey);
    }

    public function orWhere($callbackOrKey)
    {
        return $this->addCondition('OR', $callbackOrKey);
    }

    protected function addCondition($relation, $callbackOrKey)
    {
        $current = &$this->stack[$this->depth];

        // Update last relation at current depth
        $this->lastRelation[$this->depth] = $relation;

        if ($callbackOrKey instanceof SubQuery) {
            $subquery = $callbackOrKey->get();

            if (isset($subquery['state']) && $subquery['state']) {
                $state = $subquery['state'];
                unset($subquery['state']);
                $current[$state] = $subquery;
            } else {
                unset($subquery['state']);
                $current[] = $subquery;
            }
        } elseif (is_callable($callbackOrKey)) {

            $subQuery = ['relation' => 'AND'];  // Default relation
            $this->depth++;
            $this->stack[$this->depth] = &$subQuery;
            $callbackOrKey($this);
            $this->depth--;

            // Update the relation based on the last relation set at the new depth
            $subQuery['relation'] = $this->lastRelation[$this->depth + 1] ?? 'AND';

            $current[] = $subQuery;
        }

        // Update the relation of the current depth based on the last relation set
        $current['relation'] = $this->lastRelation[$this->depth] ?? 'AND';

        return $this;
    }

    public function get()
    {
        return $this->query;
    }
}
