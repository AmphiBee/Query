<?php

use Pollen\Query\Utils\ValueTypeDetector;

$dataProvider = [
    ['value' => null, 'expected' => ValueTypeDetector::CHAR, 'message' => 'with null value'],
    ['value' => -5, 'expected' => ValueTypeDetector::SIGNED, 'message' => 'with negative integer value'],
    ['value' => 5, 'expected' => ValueTypeDetector::UNSIGNED, 'message' => 'with positive integer value'],
    ['value' => 0, 'expected' => ValueTypeDetector::BINARY, 'message' => 'with negative binary value'],
    ['value' => 1, 'expected' => ValueTypeDetector::BINARY, 'message' => 'with positive binary value'],
    ['value' => 5.5, 'expected' => ValueTypeDetector::DECIMAL, 'message' => 'with float value'],
    ['value' => '5', 'expected' => ValueTypeDetector::NUMERIC, 'message' => 'with numeric string value'],
    ['value' => '2021-01-01', 'expected' => ValueTypeDetector::DATE, 'message' => 'with date value'],
    ['value' => '12:34:56', 'expected' => ValueTypeDetector::TIME, 'message' => 'with time value'],
    ['value' => '2021-01-01 12:34:56', 'expected' => ValueTypeDetector::DATETIME, 'message' => 'with datetime value'],
    ['value' => 'SomeString', 'expected' => ValueTypeDetector::CHAR, 'message' => 'with other string value'],
    ['value' => 'SomeString', 'type' => ValueTypeDetector::DATETIME, 'expected' => ValueTypeDetector::DATETIME, 'message' => 'with forced type'],
];

foreach($dataProvider as $data) {
    $value = $data['value'];
    $expected = $data['expected'];
    $message = $data['message'];
    $forcedType = $data['type'] ?? null;

    test("MetaQueryBuilder: detect $message", function () use ($value, $expected, $forcedType) {
        expect((new ValueTypeDetector($value, $forcedType))->detect())->toBe($expected);
    });
}
