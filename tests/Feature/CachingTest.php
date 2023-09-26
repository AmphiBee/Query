<?php

use Pollen\Query\PostQuery;

test('Caching: cache_results', function () {
    $args = PostQuery::select()
        ->cacheResults()
        ->getArguments();

    expect($args)->toMatchArray([
        'cache_results' => true,
        'fields' => 'all',
    ]);
});

test('Caching: update_post_meta_cache=>false', function () {
    $args = PostQuery::select()
        ->updateMetaCache(false)
        ->getArguments();

    expect($args)->toMatchArray([
        'update_post_meta_cache' => false,
        'fields' => 'all',
    ]);
});

test('Caching: update_post_term_cache=>true', function () {
    $args = PostQuery::select()
        ->updateTermCache(true)
        ->getArguments();

    expect($args)->toMatchArray([
        'update_post_term_cache' => true,
        'fields' => 'all',
    ]);
});
