<?php

declare(strict_types=1);

namespace Pollen\Query\Utils\Types;

class NullableType implements ValueTypeContract
{
    final public const CHAR = 'CHAR';

    public function detect(mixed $value): ?string
    {
        return is_null($value) ? self::CHAR : null;
    }
}
