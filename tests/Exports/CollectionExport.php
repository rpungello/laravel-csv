<?php

namespace Rpungello\LaravelCsv\Tests\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class CollectionExport implements FromCollection
{
    /**
     * {@inheritDoc}
     */
    public function collection(): Collection
    {
        return collect([
            ['Data 1', 'Data 2'],
            ['Data 3', 'Data 4'],
        ]);
    }
}
