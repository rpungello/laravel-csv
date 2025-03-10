<?php

use Rpungello\LaravelCsv\Facades\LaravelCsv;
use Rpungello\LaravelCsv\Tests\Exports\ArrayExport;
use Rpungello\LaravelCsv\Tests\Exports\ArrayExportWithHeadings;
use Rpungello\LaravelCsv\Tests\Exports\CollectionExport;
use Rpungello\LaravelCsv\Tests\Exports\CollectionExportWithHeadings;

it('can export from arrays', function () {
    $export = new ArrayExport;
    $tempFile = LaravelCsv::export($export);
    $results = array_map('str_getcsv', file($tempFile->getLocalPath()));
    expect($results)->toBeArray()
        ->and($results)->toHaveCount(2)
        ->and($results[0])->toBe(['Data 1', 'Data 2'])
        ->and($results[1])->toBe(['Data 3', 'Data 4']);
});

it('can export from collections', function () {
    $export = new CollectionExport;
    $tempFile = LaravelCsv::export($export);
    $results = array_map('str_getcsv', file($tempFile->getLocalPath()));
    expect($results)->toBeArray()
        ->and($results)->toHaveCount(2)
        ->and($results[0])->toBe(['Data 1', 'Data 2'])
        ->and($results[1])->toBe(['Data 3', 'Data 4']);
});

it('can export from arrays with headings', function () {
    $export = new ArrayExportWithHeadings;
    $tempFile = LaravelCsv::export($export);
    $results = array_map('str_getcsv', file($tempFile->getLocalPath()));
    expect($results)->toBeArray()
        ->and($results)->toHaveCount(3)
        ->and($results[0])->toBe(['Heading 1', 'Heading 2'])
        ->and($results[1])->toBe(['Data 1', 'Data 2'])
        ->and($results[2])->toBe(['Data 3', 'Data 4']);
});

it('can export from collections with headings', function () {
    $export = new CollectionExportWithHeadings;
    $tempFile = LaravelCsv::export($export);
    $results = array_map('str_getcsv', file($tempFile->getLocalPath()));
    expect($results)->toBeArray()
        ->and($results)->toHaveCount(3)
        ->and($results[0])->toBe(['Heading 1', 'Heading 2'])
        ->and($results[1])->toBe(['Data 1', 'Data 2'])
        ->and($results[2])->toBe(['Data 3', 'Data 4']);
});
