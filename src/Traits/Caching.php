<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Caching
{
    protected ?bool $cacheResults = null;

    protected ?bool $updatePostMetaCache = null;

    protected ?bool $updatePostTermCache = null;

    public function cacheResults(bool $value = true): self
    {
        $this->cacheResults = $value;

        return $this;
    }

    public function updateMetaCache($value = true): self
    {
        $this->updatePostMetaCache = (bool) $value;

        return $this;
    }

    public function updateTermCache($value = true): self
    {
        $this->updatePostTermCache = (bool) $value;

        return $this;
    }
}
