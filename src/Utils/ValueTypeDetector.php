<?php

declare(strict_types=1);

namespace Pollen\Query\Utils;

class ValueTypeDetector
{

    final public const NUMERIC = 'NUMERIC';

    final public const BINARY = 'BINARY';

    final public const CHAR = 'CHAR';

    final public const DATE = 'DATE';

    final public const DATETIME = 'DATETIME';

    final public const DECIMAL = 'DECIMAL';

    final public const SIGNED = 'SIGNED';

    final public const TIME = 'TIME';

    final public const UNSIGNED = 'UNSIGNED';

    public function __construct(protected mixed $value, protected ?string $type = null) {

    }

    public function detect(): string
    {
        $defaultType = 'CHAR';

        if (is_array($this->value)) {
            $this->value = $this->value[0];
        }

        if (!is_null($this->type)) {
            return $this->type;
        }

        if (is_null($this->value)) {
            return $defaultType;
        }

        if ($this->value === 0 || $this->value === 1) {
            return self::BINARY;
        }

        if (is_int($this->value) && $this->value < 0) {
            return self::SIGNED;
        }

        if (is_int($this->value) && $this->value >= 0) {
            return self::UNSIGNED;
        }

        if (is_float($this->value)) {
            return self::DECIMAL;
        }

        if (is_string($this->value) && is_numeric($this->value)) {
            return self::NUMERIC;
        }

        if (is_string($this->value) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $this->value)) {
            return self::DATE;
        }

        if (is_string($this->value) && preg_match('/^\d{2}:\d{2}:\d{2}$/', $this->value)) {
            return self::TIME;
        }

        if (is_string($this->value) && preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $this->value)) {
            return self::DATETIME;
        }

        return $defaultType;
    }
}
