<?php

use Pollen\Query\PostQuery;

test('Password: has_password=>true', function () {
    $args = PostQuery::select()
        ->withPassword()
        ->getArguments();

    expect($args)->toMatchArray([
        'has_password' => true,
        'fields' => 'all',
    ]);
});

test('Password: has_password=>false', function () {
    $args = PostQuery::select()
        ->withoutPassword()
        ->getArguments();

    expect($args)->toMatchArray([
        'has_password' => false,
        'fields' => 'all',
    ]);
});

test('Password: post_password', function () {
    $args = PostQuery::select()
        ->withPassword('zxcvbn')
        ->getArguments();

    expect($args)->toMatchArray([
        'post_password' => 'zxcvbn',
        'fields' => 'all',
    ]);
});
