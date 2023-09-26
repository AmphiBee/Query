<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Tag
{
    protected $tag;

    protected $tagId;

    protected $tag_And;

    protected $tag_In;

    protected $tag_NotIn;

    protected $tagSlug_And;

    protected $tagSlug_In;

    public function tag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    public function tagId(int $tagId): self
    {
        $this->tagId = $tagId;

        return $this;
    }

    public function tagAnd(array $tagAnd): self
    {
        $this->tag_And = $tagAnd;

        return $this;
    }

    public function tagIn(array $tagIn): self
    {
        $this->tag_In = $tagIn;

        return $this;
    }

    public function tagNotIn(array $tagNotIn): self
    {
        $this->tag_NotIn = $tagNotIn;

        return $this;
    }

    public function tagSlugAnd(array $tagSlugAnd): self
    {
        $this->tagSlug_And = $tagSlugAnd;

        return $this;
    }

    public function tagSlugIn(array $tagSlugIn): self
    {
        $this->tagSlug_In = $tagSlugIn;

        return $this;
    }
}
