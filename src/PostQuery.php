<?php

declare(strict_types=1);

namespace Pollen\Query;

use Pollen\Query\Traits\Author;
use Pollen\Query\Traits\Caching;
use Pollen\Query\Traits\Category;
use Pollen\Query\Traits\Comment;
use Pollen\Query\Traits\DateQuery;
use Pollen\Query\Traits\Field;
use Pollen\Query\Traits\MetaQuery;
use Pollen\Query\Traits\MimeType;
use Pollen\Query\Traits\Order;
use Pollen\Query\Traits\Pagination;
use Pollen\Query\Traits\Password;
use Pollen\Query\Traits\Permission;
use Pollen\Query\Traits\Post as PostTrait;
use Pollen\Query\Traits\Search;
use Pollen\Query\Traits\Status;
use Pollen\Query\Traits\Tag;
use Pollen\Query\Traits\TaxQuery;
use Pollen\WordPressArgs\ArgumentHelper;

class PostQuery
{
    use ArgumentHelper, Author, Caching, Category, Comment, DateQuery, Field, MetaQuery, MimeType, Order, Pagination, Password, Permission, PostTrait, Search, Status, Tag, TaxQuery;

    private array $queryBuilder = [];

    public function __construct(array|int $postId = null, $fields = null)
    {
        if (is_int($postId)) {
            $this->postId($postId);
        } elseif (is_array($postId)) {
            $this->whereIn($postId);
        }

        if ($fields) {
            $this->fields($fields);
        }
    }

    public static function find(array|string|int $postId = null): self
    {
        return new static($postId);
    }

    public static function select(?string $fields = 'all'): self
    {
        return new static(null, $fields);
    }

    public function getArguments(): array
    {
        $args = $this->buildArguments();
        unset($args['query_builder']);
        unset($args['query_type']);

        return $args;
    }

    public function get(): \WP_Query
    {
        $args = $this->getArguments();

        return new \WP_Query($args);
    }
}
