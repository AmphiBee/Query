<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Status
{
    protected $postStatus;

    public function postStatus($status): self
    {
        $this->postStatus = $status;

        return $this;
    }
}
