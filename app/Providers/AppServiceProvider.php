<?php

namespace App\Providers;

use App\Modules\_BaseRepository\BaseRepositoryInterface;
use App\Modules\_BaseRepository\BaseRepository;
use App\Modules\Profile\Models\User;
use App\Modules\Profile\Repositories\ProfileRepository;
use App\Modules\Profile\Repositories\ProfileRepositoryInterface;
use App\Modules\Profile\Services\ProfileService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProfileRepositoryInterface::class, function($app){
            return new ProfileRepository($app->make(User::class));
        });

        $this->app->bind(ProfileService::class, ProfileService::class);
        
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        // $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
