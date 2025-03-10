<?php

namespace Rpungello\LaravelCsv\Tests\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMapping;

class ArrayExportWithMapping implements FromArray, WithMapping
{
    public function array(): array
    {
        return [
            ['col1' => 'Data 1', 'col2' => '2.0', 'col3' => '3.5'],
            ['col1' => 'Data 3', 'col2' => '3.5', 'col3' => '4.0'],
        ];
    }

    /**
     * @inheritDoc
     */
    public function map($row): array
    {
        return [
            $row['col1'],
            $row['col2'] + $row['col3'],
        ];
    }
}
