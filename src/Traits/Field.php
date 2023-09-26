<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Field
{
    protected $fields = 'all';

    public function fields($value): self
    {
        if ($value === '*') {
            $this->fields = 'all';
        } elseif (in_array($value, ['all', 'ids', 'id=>parent'])) {
            $this->fields = $value;
        }

        return $this;
    }

    public function getFields()
    {
        return $this->fields;
    }
}
