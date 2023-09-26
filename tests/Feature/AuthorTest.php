<?php

use Pollen\Query\PostQuery;

test('Author: author', function () {
    $args = PostQuery::select()
        ->author(1)
        ->getArguments();

    expect($args)->toMatchArray([
        'author' => 1,
        'fields' => 'all',
    ]);
});

test('Author: author_name', function () {
    $args = PostQuery::select()
        ->authorName('taylor')
        ->getArguments();

    expect($args)->toMatchArray([
        'author_name' => 'taylor',
        'fields' => 'all',
    ]);
});

test('Author: author__in', function () {
    $args = PostQuery::select()
        ->authorIn([1, 2, 3])
        ->getArguments();

    expect($args)->toMatchArray([
        'author__in' => [1, 2, 3],
        'fields' => 'all',
    ]);
});

test('Author: author__not_in', function () {
    $args = PostQuery::select()
        ->authorNotIn([1, 2, 3])
        ->getArguments();

    expect($args)->toMatchArray([
        'author__not_in' => [1, 2, 3],
        'fields' => 'all',
    ]);
});
