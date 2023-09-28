<?php

declare(strict_types=1);

namespace Pollen\Query\QueryBuilder;

class MetaQueryBuilder extends SubQuery
{
    protected $type;

    final public const NUMERIC = 'NUMERIC';

    final public const BINARY = 'BINARY';

    final public const CHAR = 'CHAR';

    final public const DATE = 'DATE';

    final public const DATETIME = 'DATETIME';

    final public const DECIMAL = 'DECIMAL';

    final public const SIGNED = 'SIGNED';

    final public const TIME = 'TIME';

    final public const UNSIGNED = 'UNSIGNED';

    protected ?string $state = null;

    public function __construct(
        private readonly mixed $key,
        private mixed $value = null,
    ) {
    }

    public function ofType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function detectValueType($value)
    {
        $defaultType = 'CHAR';

        if (is_array($value)) {
            $value = $value[0];
        }

        if (! is_null($this->type)) {
            return $this->type;
        }

        if (is_null($value)) {
            return $defaultType;
        }

        if ($value === 0 || $value === 1) {
            return self::BINARY;
        }

        if (is_int($value) && $value < 0) {
            return self::SIGNED;
        }

        if (is_int($value) && $value >= 0) {
            return self::UNSIGNED;
        }

        if (is_float($value)) {
            return self::DECIMAL;
        }

        if (is_string($value) && is_numeric($value)) {
            return self::NUMERIC;
        }

        if (is_string($value) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            return self::DATE;
        }

        if (is_string($value) && preg_match('/^\d{2}:\d{2}:\d{2}$/', $value)) {
            return self::TIME;
        }

        if (is_string($value) && preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $value)) {
            return self::DATETIME;
        }

        return $defaultType;
    }

    private function compareWith(string $compare, mixed $value): self
    {
        $this->compare = $compare;
        $this->type = $this->detectValueType($value);
        $this->value = $value;

        return $this;
    }

    public function greaterThan(mixed $value): self
    {
        return $this->compareWith(self::GREATER, $value);
    }

    public function greaterOrEqualTo(mixed $value): self
    {
        return $this->compareWith(self::GREATER_EQUAL, $value);
    }

    public function lessThan(mixed $value): self
    {
        return $this->compareWith(self::LESS, $value);
    }

    public function lessOrEqualTo(mixed $value): self
    {
        return $this->compareWith(self::LESS_EQUAL, $value);
    }

    public function equalTo(mixed $value): self
    {
        return $this->compareWith(self::EQUAL, $value);
    }

    public function notEqualTo(mixed $value): self
    {
        return $this->compareWith(self::NOT_EQUAL, $value);
    }

    public function between(mixed $lowerBoundary, mixed $upperBoundary): self
    {
        return $this->compareWith(self::BETWEEN, [
            $lowerBoundary,
            $upperBoundary,
        ]);
    }

    public function notBetween(mixed $lowerBoundary, mixed $upperBoundary): self
    {
        return $this->compareWith(self::NOT_BETWEEN, [
            $lowerBoundary,
            $upperBoundary,
        ]);
    }

    public function like(string $value): self
    {
        return $this->compareWith(self::LIKE, $value);
    }

    public function notLike(string $value): self
    {
        return $this->compareWith(self::NOT_LIKE, $value);
    }

    public function in(array $value): self
    {
        $this->compare = self::IN;
        $this->value = $value;

        return $this;
    }

    public function notIn(array $value): self
    {
        return $this->compareWith(self::NOT_IN, $value);
    }

    public function state(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function exists(): self
    {
        return $this->compareWith(self::EXISTS, null);
    }

    public function notExists(): self
    {
        return $this->compareWith(self::NOT_EXISTS, null);
    }

    public function get(): array
    {
        $config = [
            'key' => $this->key,
            'compare' => $this->compare,
            'type' => strtoupper((string) $this->type),
            'state' => $this->state,
        ];

        if ($this->value !== null) {
            $config['value'] = $this->value;
        }

        return $config;
    }
}
