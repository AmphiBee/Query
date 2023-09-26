<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Pagination
{
    protected $nopaging;

    protected $postsPerPage;

    protected $postsPerArchivePage;

    protected $offset;

    protected $paged;

    protected $page;

    protected $ignoreStickyPosts;

    public function noPaging(bool $noPaging = true): self
    {
        $this->nopaging = $noPaging;

        return $this;
    }

    public function limit(int $postsPerPage): self
    {
        $this->postsPerPage($postsPerPage);

        return $this;
    }

    public function take(int $postsPerPage): self
    {
        $this->postsPerPage($postsPerPage);

        return $this;
    }

    public function postsPerPage(int $postsPerPage): self
    {
        $this->postsPerPage = $postsPerPage;

        return $this;
    }

    public function postsPerArchivePage(int $postsPerArchivePage): self
    {
        $this->postsPerArchivePage = $postsPerArchivePage;

        return $this;
    }

    public function skip(int $offset): self
    {
        $this->offset($offset);

        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function paged(int $paged): self
    {
        $this->paged = $paged;

        return $this;
    }

    public function page(int $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function ignoreStickyPosts(bool $ignoreStickyPosts = true): self
    {
        $this->ignoreStickyPosts = $ignoreStickyPosts;

        return $this;
    }
}
