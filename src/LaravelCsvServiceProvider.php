<?php

namespace Rpungello\LaravelCsv;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rpungello\LaravelCsv\Commands\LaravelCsvCommand;

class LaravelCsvServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-csv')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_csv_table')
            ->hasCommand(LaravelCsvCommand::class);
    }
}
