<?php

use Pollen\Query\PostQuery;

test('Search: s (keyword)', function () {
    $args = PostQuery::select()
        ->search('mon mot clé')
        ->getArguments();

    expect($args)->toMatchArray([
        's' => 'mon mot clé',
        'fields' => 'all',
    ]);
});
