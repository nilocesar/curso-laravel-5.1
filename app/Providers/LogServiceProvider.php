<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Log;
use App\Models\Painel\Carro;

class LogServiceProvider extends ServiceProvider {
    private $carro;
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Carro $carro) {
        $this->carro = $carro;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('geraLog', function($app, $params) {
            return Log::info('Gera Log', $params);
        });
        
        $this->app->bind('geraLog2', function($app, $params) {
            return Log::info('Gera Log', $params);
        });
    }
    
    public function provides() {
        return ['geraLog', 'geraLog2'];
    }

}
