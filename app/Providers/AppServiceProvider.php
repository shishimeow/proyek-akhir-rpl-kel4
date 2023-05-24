<?php

namespace App\Providers;

use App\Models\ReviewSc;
use App\Observers\ReviewScObserver;
use App\Models\ReviewMbkm;
use App\Observers\ReviewMbkmObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot()
    {
        ReviewSc::observe(ReviewScObserver::class);
        ReviewMbkm::observe(ReviewMbkmObserver::class);
    }

}
