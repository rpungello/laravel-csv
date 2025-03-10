<?php

namespace Rpungello\LaravelCsv;

use Maatwebsite\Excel\Files\Filesystem;
use Maatwebsite\Excel\Files\TemporaryFile;

class LaravelCsv
{
    public function __construct(protected Writer $writer, protected Filesystem $filesystem)
    {
    }

    public function store($export, string $filePath, ?string $diskName = null, array $diskOptions = []): int
    {
        $temporaryFile = $this->export($export);

        $exported = $this->filesystem->disk($diskName, $diskOptions)->copy(
            $temporaryFile,
            $filePath
        );

        $temporaryFile->delete();

        return $exported;
    }

    public function export($export): TemporaryFile
    {
        return $this->writer->export($export);
    }
}
