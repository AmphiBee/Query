<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Comment
{
    protected $commentCount;

    public function commentCount(int|array $count): self
    {
        $this->commentCount = $count;

        return $this;
    }
}
