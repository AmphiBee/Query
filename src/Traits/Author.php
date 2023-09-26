<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Author
{
    protected $author;

    protected $authorName;

    protected $author_In;

    protected $author_NotIn;

    public function author(int $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function authorName(string $authorName): self
    {
        $this->authorName = $authorName;

        return $this;
    }

    public function authorIn(array $authorIn): self
    {
        $this->author_In = $authorIn;

        return $this;
    }

    public function authorNotIn(array $authorNotIn): self
    {
        $this->author_NotIn = $authorNotIn;

        return $this;
    }
}
