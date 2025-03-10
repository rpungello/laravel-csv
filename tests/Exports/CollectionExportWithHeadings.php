<?php

namespace Rpungello\LaravelCsv\Tests\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class CollectionExportWithHeadings extends CollectionExport implements WithHeadings
{
    /**
     * {@inheritDoc}
     */
    public function headings(): array
    {
        return [
            'Heading 1',
            'Heading 2',
        ];
    }
}
