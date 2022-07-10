<?php

namespace ArtisanBlade;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ArtisanBlade\Commands\ArtisanBladeCommand;

class ArtisanBladeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('artisan-blade')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_artisan-blade_table')
            ->hasCommand(ArtisanBladeCommand::class);
    }
}
