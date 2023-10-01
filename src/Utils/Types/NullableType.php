<?php

declare(strict_types=1);

namespace Pollen\Query\Utils\Types;

final class NullableType implements ValueTypeContract
{
    public const CHAR = 'CHAR';

    public function detect(mixed $value): ?string
    {
        return is_null($value) ? self::CHAR : null;
    }
}
