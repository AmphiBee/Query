<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Password
{
    protected $hasPassword;

    protected $postPassword;

    public function withoutPassword(): self
    {
        $this->hasPassword = false;

        return $this;
    }

    public function withPassword(string $postPassword = null): self
    {
        if ($postPassword !== null) {
            $this->postPassword = $postPassword;
        } else {
            $this->hasPassword = true;
        }

        return $this;
    }
}
