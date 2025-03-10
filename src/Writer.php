<?php

namespace Rpungello\LaravelCsv;

use Illuminate\Contracts\Support\Arrayable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Files\TemporaryFile;
use Maatwebsite\Excel\Files\TemporaryFileFactory;

class Writer
{
    public function __construct(protected TemporaryFileFactory $temporaryFileFactory) {}

    public function export($export): TemporaryFile
    {
        return $this->write($export, $this->temporaryFileFactory->makeLocal(null, 'csv'));
    }

    public function write($export, TemporaryFile $temporaryFile): TemporaryFile
    {
        $fh = fopen($temporaryFile->getLocalPath(), 'w');

        if ($export instanceof WithHeadings) {
            fputcsv($fh, $export->headings());
        }

        if ($export instanceof FromQuery) {
            $export->query()->each(fn ($row) => fputcsv($fh, $this->getRowAsArray($export, $row)));
        } elseif ($export instanceof FromArray) {
            foreach ($export->array() as $row) {
                fputcsv($fh, $this->getRowAsArray($export, $row));
            }
        } elseif ($export instanceof FromCollection) {
            $export->collection()->each(fn ($row) => fputcsv($fh, $this->getRowAsArray($export, $row)));
        }

        fclose($fh);

        return $temporaryFile;
    }

    private function getRowAsArray($export, $row): array
    {
        if ($export instanceof WithMapping) {
            return $export->map($row);
        } elseif ($row instanceof Arrayable) {
            return $row->toArray();
        } else {
            return (array) $row;
        }
    }
}
