<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Message;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer(['*'], function ($view) {
            if ($view->getName() !== 'auth.login') {
                if(auth()->check()){
                    $mensajes = Message::where('user_id', auth()->user()->id)->get();
                    $view->with('mensajes', $mensajes);
                }
                // $mensajes = Message::where('user_id', auth()->user()->id)->get();
                // $view->with('mensajes', $mensajes);
            }
        });
    }
}
