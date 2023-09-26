<?php

declare(strict_types=1);

namespace Pollen\Query\Traits;

trait Order
{
    protected array|string|null $orderby = null;

    public function orderBy(array|string $orderby, array|string $order = 'DESC'): self
    {
        if (! $this->orderby) {
            $this->orderby = [];
        }
        $this->orderby[$orderby] = $order;

        return $this;
    }

    public function latest()
    {
        $this->orderby['post_date'] = 'DESC';

        return $this;
    }

    public function oldest()
    {
        $this->orderby['post_date'] = 'ASC';

        return $this;
    }

    public function inRandomOrder()
    {
        $this->orderby = 'rand';

        return $this;
    }
}
