<?php

namespace Rpungello\LaravelCsv\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Maatwebsite\Excel\Files\TemporaryFileFactory;
use Orchestra\Testbench\TestCase as Orchestra;
use Rpungello\LaravelCsv\LaravelCsvServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Rpungello\\LaravelCsv\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        $this->app->bind(TemporaryFileFactory::class, function () {
            return new TemporaryFileFactory(
                config('excel.temporary_files.local_path', config('excel.exports.temp_path', storage_path('framework/laravel-excel'))),
                config('excel.temporary_files.remote_disk')
            );
        });
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelCsvServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-csv_table.php.stub';
        $migration->up();
        */
    }
}
