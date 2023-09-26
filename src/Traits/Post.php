<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Post
{
    protected $postType;

    protected $p;

    protected $name;

    protected $postParent;

    protected $postParent_In;

    protected $postParent_NotIn;

    protected $post_In;

    protected $post_NotIn;

    protected $postName_In;

    public function postType(string|array $postType): self
    {
        $this->postType = $postType;

        return $this;
    }

    public function postId(int $postId): self
    {
        $this->p = $postId;

        return $this;
    }

    public function postSlug(string $postName): self
    {
        $this->name = $postName;

        return $this;
    }

    public function postParent(int $postParent): self
    {
        $this->postParent = $postParent;

        return $this;
    }

    public function whereParentIn(array $postParentIn): self
    {
        $this->postParent_In = $postParentIn;

        return $this;
    }

    public function whereParentNotIn(array $postParentNotIn): self
    {
        $this->postParent_NotIn = $postParentNotIn;

        return $this;
    }

    public function whereIn(array $postIn): self
    {
        $this->post_In = $postIn;

        return $this;
    }

    public function whereNotIn(array $postNotIn): self
    {
        $this->post_NotIn = $postNotIn;

        return $this;
    }

    public function slugIn(array $postSlugIn): self
    {
        $this->postName_In = $postSlugIn;

        return $this;
    }
}
