<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Search
{
    protected ?string $s = null;

    public function search(string $keyword): self
    {
        $this->s = $keyword;

        return $this;
    }
}
