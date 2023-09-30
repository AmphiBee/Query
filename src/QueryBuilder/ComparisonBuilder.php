<?php

declare(strict_types=1);

namespace Pollen\Query\QueryBuilder;

use Pollen\Query\Utils\ValueTypeDetector;

class ComparisonBuilder
{
    private mixed $value;

    private ?string $compare;

    private ?string $type = null;

    public function __construct(?string $compare, mixed $value)
    {
        $this->compare = $compare;
        $this->value = $value;
        $this->type = (new ValueTypeDetector($value, $this->type))->detect();
    }

    public function withComparison(string $compare, mixed $value): self
    {
        return new self($compare, $value, $this->type);
    }

    public function buildConfig(): array
    {
        $config = [
            'compare' => $this->compare,
            'type' => strtoupper((string) $this->type),
        ];

        if ($this->value !== null) {
            $config['value'] = $this->value;
        }

        return $config;
    }
}
