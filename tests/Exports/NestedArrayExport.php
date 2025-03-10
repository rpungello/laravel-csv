<?php

namespace Rpungello\LaravelCsv\Tests\Exports;

use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMapping;

class NestedArrayExport implements WithMapping, FromArray
{

    public function array(): array
    {
        return [
            [
                'record_number' => 1234,
                'lines' => [
                    ['line_number' => 'line 1'],
                    ['line_number' => 'line 2'],
                    ['line_number' => 'line 3'],
                ],
            ]
        ];
    }

    public function map($row): array
    {
        return array_map(fn ($line) => array_merge(Arr::only($row, 'record_number'), $line), $row['lines']);
    }
}
