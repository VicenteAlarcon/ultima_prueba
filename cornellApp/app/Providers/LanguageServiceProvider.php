<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\EnglishTermService;
use App\Services\FrenchTermService;
use App\Services\SpanishTermService;
use App\Services\DeustchTermService;
use App\Services\valenTermService;
class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(LanguageServiceProvider::class, function($app){
            return new EnglishTermService();
        });   
        $this->app->singleton(LanguageServiceProvider::class, function($app){
            return new FrencTermService();
        }); 
          $this->app->singleton(LanguageServiceProvider::class, function($app){
            return new SpanishTermService();
        }); 
          $this->app->singleton(LanguageServiceProvider::class, function($app){
            return new DeustchTermService();
        }); 
          $this->app->singleton(LanguageServiceProvider::class, function($app){
            return new ValenTermService();
        }); 
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}