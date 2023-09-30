<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Status
{
    protected string|array|null $postStatus = null;

    public function postStatus(string|array $status): self
    {
        $this->postStatus = $status;

        return $this;
    }
}
