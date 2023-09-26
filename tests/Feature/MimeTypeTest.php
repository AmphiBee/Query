<?php

use Pollen\Query\PostQuery;

it('Mimetype: string', function () {
    $args = PostQuery::select()
        ->postMimeType('image/gif')
        ->getArguments();

    expect($args)->toMatchArray([
        'post_mime_type' => 'image/gif',
        'fields' => 'all',
    ]);
});

it('Mimetype: array', function () {
    $args = PostQuery::select()
        ->postMimeType(['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/tiff', 'image/x-icon'])
        ->getArguments();

    expect($args)->toMatchArray([
        'post_mime_type' => ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/tiff', 'image/x-icon'],
        'fields' => 'all',
    ]);
});
