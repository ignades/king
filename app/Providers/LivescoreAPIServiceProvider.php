<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Wrapper\LiveScoreAPI;
use Illuminate\Support\Facades\Config;

class LivescoreAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {    
        $api_key = Config::get('livescore.api_key');
        $api_secret = Config::get('livescore.api_secret');
        $api = new LiveScoreAPI($api_key,$api_secret);
        $api->liveMatches();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Publishes config file.
        $this->publishes([
            __DIR__.'/config/livescore.php' => config_path('livescore.php'),
        ]);
    }
}
