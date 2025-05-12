<?php

namespace Facilita\Dummy;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Facilita\Dummy\Commands\DummyCommand;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;

class DummyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('dummy')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_dummy_table')
            ->hasCommand(DummyCommand::class);
    }

    public function boot(){
        Http::macro('dummy', function(string|null $description = 'Dummy API Response', array $aditionalData = []) {
            return Http::baseUrl('https://dummyjson.com/')
                ->acceptJson()
                ->asJson()
                ->withResponseMiddleware(function(ResponseInterface $response) use($description, $aditionalData){
                    Log::info($description, [
                        'status' => $response->getStatusCode(),
                        'headers' => $response->getHeader('X-Frame-Options'),
                        ...$aditionalData
                    ]);
                    return $response;
                });
        });
    }
}
