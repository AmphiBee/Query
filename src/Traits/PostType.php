<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait PostType
{
    protected string $postType = 'any';

    public function postType(string|array $postType): self
    {
        $this->postType = $postType;

        return $this;
    }
}
