<?php

namespace Rpungello\LaravelCsv\Tests\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Rpungello\LaravelCsv\Tests\Exports\CollectionExport;

class CollectionExportWithHeadings extends CollectionExport implements WithHeadings
{
    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        return [
            'Heading 1',
            'Heading 2',
        ];
    }
}
