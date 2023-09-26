<?php

use Pollen\Query\QueryBuilder\MetaQueryBuilder;

$builder = new MetaQueryBuilder('some_key', null);

test('MetaQueryBuilder: detectValueType with null value', function () use ($builder) {
    expect($builder->detectValueType(null))->toBe($builder::CHAR);
});

test('MetaQueryBuilder: detectValueType with negative integer value', function () use ($builder) {
    expect($builder->detectValueType(-5))->toBe($builder::SIGNED);
});

test('MetaQueryBuilder: detectValueType with positive integer value', function () use ($builder) {
    expect($builder->detectValueType(5))->toBe($builder::UNSIGNED);
});

test('MetaQueryBuilder: detectValueType with negative binary value', function () use ($builder) {
    expect($builder->detectValueType(0))->toBe($builder::BINARY);
});

test('MetaQueryBuilder: detectValueType with positive binary value', function () use ($builder) {
    expect($builder->detectValueType(1))->toBe($builder::BINARY);
});

test('MetaQueryBuilder: detectValueType with float value', function () use ($builder) {
    expect($builder->detectValueType(5.5))->toBe($builder::DECIMAL);
});

test('MetaQueryBuilder: detectValueType with numeric string value', function () use ($builder) {
    expect($builder->detectValueType('5'))->toBe($builder::NUMERIC);
});

test('MetaQueryBuilder: detectValueType with date value', function () use ($builder) {
    expect($builder->detectValueType('2021-01-01'))->toBe($builder::DATE);
});

test('MetaQueryBuilder: detectValueType with time value', function () use ($builder) {
    expect($builder->detectValueType('12:34:56'))->toBe($builder::TIME);
});

test('MetaQueryBuilder: detectValueType with datetime value', function () use ($builder) {
    expect($builder->detectValueType('2021-01-01 12:34:56'))->toBe('DATETIME');
});

test('MetaQueryBuilder: detectValueType with other string value', function () use ($builder) {
    expect($builder->detectValueType('SomeString'))->toBe('CHAR');
});

test('MetaQueryBuilder: detectValueType with forced type', function () use ($builder) {
    $builder->ofType($builder::DATETIME);
    expect($builder->detectValueType('SomeString'))->toBe($builder::DATETIME);
});
