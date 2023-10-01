<?php

declare(strict_types=1);

namespace Pollen\Query\Utils;

use Pollen\Query\Utils\Types\BooleanType;
use Pollen\Query\Utils\Types\CharType;
use Pollen\Query\Utils\Types\DatetimeType;
use Pollen\Query\Utils\Types\NullableType;
use Pollen\Query\Utils\Types\NumberType;
use Pollen\Query\Utils\Types\ValueTypeContract;

class ValueTypeDetector
{
    /**
     * @var array<ValueTypeContract>
     */
    private array $detectors = [];

    public function __construct(protected mixed $value, protected ?string $type = null)
    {
        $detectorClasses = [
            BooleanType::class,
            DatetimeType::class,
            NullableType::class,
            NumberType::class,
        ];

        foreach ($detectorClasses as $detectorClass) {
            $this->detectors[] = new $detectorClass();
        }
    }

    public function detect(): string
    {
        if (is_array($this->value)) {
            $this->value = $this->value[0];
        }

        if (! is_null($this->type)) {
            return $this->type;
        }

        return $this->detectType();
    }

    private function detectType(): ?string
    {
        $type = array_reduce(
            $this->detectors,
            function ($carry, $detector) {
                return $carry ?? $detector->detect($this->value);
            },
            null
        );

        return $type ?? CharType::CHAR;
    }
}
