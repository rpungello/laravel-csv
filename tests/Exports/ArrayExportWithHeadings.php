<?php

namespace Rpungello\LaravelCsv\Tests\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class ArrayExportWithHeadings extends ArrayExport implements WithHeadings
{
    public function headings(): array
    {
        return [
            'Heading 1',
            'Heading 2',
        ];
    }
}
