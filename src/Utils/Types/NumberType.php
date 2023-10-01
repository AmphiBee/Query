<?php

declare(strict_types=1);

namespace Pollen\Query\Utils\Types;

class NumberType implements ValueTypeContract
{
    final public const NUMERIC = 'NUMERIC';

    final public const DECIMAL = 'DECIMAL';

    final public const SIGNED = 'SIGNED';

    final public const UNSIGNED = 'UNSIGNED';

    public function detect(mixed $value): ?string
    {
        return match (true) {
            is_int($value) => $value < 0 ? self::SIGNED : self::UNSIGNED,
            is_float($value) => self::DECIMAL,
            is_string($value) && is_numeric($value) => self::NUMERIC,
            default => null,
        };
    }
}
