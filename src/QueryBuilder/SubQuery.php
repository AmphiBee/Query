<?php

declare(strict_types=1);

namespace Pollen\Query\QueryBuilder;

abstract class SubQuery
{
    protected $compare = 'LIKE';

    const EQUAL = '=';

    const NOT_EQUAL = '!=';

    const GREATER = '>';

    const GREATER_EQUAL = '>=';

    const LESS = '<';

    const LESS_EQUAL = '<=';

    const LIKE = 'LIKE';

    const NOT_LIKE = 'NOT LIKE';

    const IN = 'IN';

    const NOT_IN = 'NOT IN';

    const BETWEEN = 'BETWEEN';

    const NOT_BETWEEN = 'NOT BETWEEN';

    const EXISTS = 'EXISTS';

    const NOT_EXISTS = 'NOT EXISTS';

    const REGEXP = 'REGEXP';

    const NOT_REGEXP = 'NOT REGEXP';

    const RLIKE = 'RLIKE';
}
