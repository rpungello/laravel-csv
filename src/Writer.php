<?php

namespace Rpungello\LaravelCsv;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Files\TemporaryFile;
use Maatwebsite\Excel\Files\TemporaryFileFactory;

class Writer
{
    protected TemporaryFileFactory $temporaryFileFactory;

    public function __construct()
    {
        $this->temporaryFileFactory = new TemporaryFileFactory(sys_get_temp_dir());
    }

    public function export($export): TemporaryFile
    {
        return $this->write($export, $this->temporaryFileFactory->makeLocal(null, 'csv'));
    }

    public function write($export, TemporaryFile $temporaryFile): TemporaryFile
    {
        $fh = fopen($temporaryFile->getLocalPath(), 'w');

        if ($export instanceof FromQuery) {
            $export->query()->each(fn ($row) => fputcsv($fh, (array) $row));
        } elseif ($export instanceof FromArray) {
            foreach ($export->array() as $row) {
                fputcsv($fh, $row);
            }
        } elseif ($export instanceof FromCollection) {
            $export->collection()->each(fn ($row) => fputcsv($fh, (array) $row));
        }

        fclose($fh);

        return $temporaryFile;
    }
}
