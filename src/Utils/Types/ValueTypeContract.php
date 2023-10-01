<?php

declare(strict_types=1);

namespace Pollen\Query\Utils\Types;

interface ValueTypeContract
{
    public function detect(mixed $value): ?string;
}
