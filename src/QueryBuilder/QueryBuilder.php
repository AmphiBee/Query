<?php

declare(strict_types=1);

namespace Pollen\Query\QueryBuilder;

use Closure;

class QueryBuilder
{
    /**
     * @var array<string|array>
     */
    protected array $query = ['relation' => 'AND'];

    /**
     * @var array<string|array>
     */
    protected array $stack = [];

    protected int $depth = 0;

    /**
     * @var array<string>
     */
    protected array $lastRelation = [];

    public function __construct()
    {
        $this->stack = [&$this->query];
    }

    public function where(Closure|SubQuery $callbackOrKey): self
    {
        return $this->addCondition('AND', $callbackOrKey);
    }

    public function andWhere(Closure|SubQuery $callbackOrKey): self
    {
        return $this->addCondition('AND', $callbackOrKey);
    }

    public function orWhere(Closure|SubQuery $callbackOrKey): self
    {
        return $this->addCondition('OR', $callbackOrKey);
    }

    protected function addCondition(string $relation, Closure|SubQuery $callbackOrKey): self
    {
        $current = &$this->stack[$this->depth];

        // Update last relation at current depth
        $this->lastRelation[$this->depth] = $relation;

        if ($callbackOrKey instanceof SubQuery) {
            $subQuery = $callbackOrKey->get();

            if (isset($subQuery['state']) && $subQuery['state']) {
                $state = $subQuery['state'];
                unset($subQuery['state']);
                $current[$state] = $subQuery;
            } else {
                unset($subQuery['state']);
                $current[] = $subQuery;
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

    /**
     * @return array<array|string>
     */
    public function get(): array
    {
        return $this->query;
    }
}
