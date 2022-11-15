<?php

namespace App\Providers;

use App\Repositories\EloquentQuemSouRepository;
use App\Repositories\QuemSouRepository;
use Illuminate\Support\ServiceProvider;

class QuemSouProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QuemSouRepository::class,EloquentQuemSouRepository::class);
    }
}
