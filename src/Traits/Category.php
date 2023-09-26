<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Category
{
    protected $cat;

    protected $categoryName;

    protected $categoryAnd;

    protected $category_In;

    protected $category_NotIn;

    public function cat(int $cat): self
    {
        $this->cat = $cat;

        return $this;
    }

    public function categoryName(string $categoryName): self
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    public function categoryAnd(array $categoryAnd): self
    {
        $this->categoryAnd = $categoryAnd;

        return $this;
    }

    public function categoryIn(array $categoryIn): self
    {
        $this->category_In = $categoryIn;

        return $this;
    }

    public function categoryNotIn(array $categoryNotIn): self
    {
        $this->category_NotIn = $categoryNotIn;

        return $this;
    }
}
