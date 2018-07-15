<?php

namespace App\Providers;

use App\Http\ViewComposers\ShoppingSundayInfoComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'shopping-sunday/index', ShoppingSundayInfoComposer::class
        );
    }
}