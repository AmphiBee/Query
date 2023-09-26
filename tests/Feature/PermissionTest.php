<?php

use Pollen\Query\PostQuery;

it('Permission: readable', function () {
    $args = PostQuery::select()
        ->userPermission('readable')
        ->getArguments();

    expect($args)->toMatchArray([
        'perm' => 'readable',
        'fields' => 'all',
    ]);
});

it('Permission: editable', function () {
    $args = PostQuery::select()
        ->userPermission('editable')
        ->getArguments();

    expect($args)->toMatchArray([
        'perm' => 'editable',
        'fields' => 'all',
    ]);
});

it('Permission: invalid', function () {
    $args = PostQuery::select()
        ->userPermission('invalid')
        ->getArguments();

    expect($args)->toMatchArray([
        'fields' => 'all',
    ]);
});
