<?php

use Pollen\Query\PostQuery;

test('Category: cat', function () {
    $args = PostQuery::select()
        ->cat(1)
        ->getArguments();

    expect($args)->toMatchArray([
        'cat' => 1,
        'fields' => 'all',
    ]);
});

test('Category: category_name', function () {
    $args = PostQuery::select()
        ->categoryName('sales')
        ->getArguments();

    expect($args)->toMatchArray([
        'category_name' => 'sales',
        'fields' => 'all',
    ]);
});

test('Category: category__in', function () {
    $args = PostQuery::select()
        ->categoryIn([1, 2, 3])
        ->getArguments();

    expect($args)->toMatchArray([
        'category__in' => [1, 2, 3],
        'fields' => 'all',
    ]);
});

test('Category: category__not_in', function () {
    $args = PostQuery::select()
        ->categoryNotIn([1, 2, 3])
        ->getArguments();

    expect($args)->toMatchArray([
        'category__not_in' => [1, 2, 3],
        'fields' => 'all',
    ]);
});
