<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait MimeType
{
    protected string|array|null $postMimeType = null;

    public function postMimeType(string|array $value): self
    {
        $this->postMimeType = $value;

        return $this;
    }
}
