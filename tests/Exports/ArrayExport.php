<?php

namespace Rpungello\LaravelCsv\Tests\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ArrayExport implements FromArray
{
    /**
     * {@inheritDoc}
     */
    public function array(): array
    {
        return [
            ['Data 1', 'Data 2'],
            ['Data 3', 'Data 4'],
        ];
    }
}
