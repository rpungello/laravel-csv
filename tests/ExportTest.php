<?php

use Rpungello\LaravelCsv\Facades\LaravelCsv;
use Rpungello\LaravelCsv\Tests\Exports\ArrayExport;

it('can export from arrays', function () {
    $export = new ArrayExport;
    $tempFile = LaravelCsv::export($export);
    $results = array_map('str_getcsv', file($tempFile->getLocalPath()));
    expect($results)->toBeArray()
        ->and($results)->toHaveCount(3)
        ->and($results[0])->toBe(['Column 1', 'Column 2'])
        ->and($results[1])->toBe(['Data 1', 'Data 2'])
        ->and($results[2])->toBe(['Data 3', 'Data 4']);
});
