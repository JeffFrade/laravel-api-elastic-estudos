<?php

namespace App\Providers;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $hosts = [
            env('ES_HOST', '')
        ];

        $this->app->bind(Client::class, function () use ($hosts) {
            return ClientBuilder::create()->setHosts($hosts)->build();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $client = app(Client::class);
        $index = ['index' => env('ES_INDEX')];

        if (!$client->indices()->exists($index)) {
            $client->indices()->create($index);
        }
    }
}
