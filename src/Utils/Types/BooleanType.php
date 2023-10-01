<?php

declare(strict_types=1);

namespace Pollen\Query\Utils\Types;

class BooleanType implements ValueTypeContract
{
    final public const BINARY = 'BINARY';

    public function detect(mixed $value): ?string
    {
        return $value === 0 || $value === 1 ? self::BINARY : null;
    }
}
