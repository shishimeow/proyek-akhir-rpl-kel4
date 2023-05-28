<?php

namespace App\Providers;

use App\Models\ReviewSc;
use App\Observers\ReviewScObserver;
use App\Models\ReviewMbkm;
use App\Models\User;
use App\Observers\ReviewMbkmObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot()
    {
        ReviewSc::observe(ReviewScObserver::class);
        ReviewMbkm::observe(ReviewMbkmObserver::class);
        User::observe(UserObserver::class);

        Gate::define('admin', function(User $user){
            return $user->isAdmin;
        });

    }

}
