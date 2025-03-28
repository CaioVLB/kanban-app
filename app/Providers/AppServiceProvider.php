<?php

namespace App\Providers;

use App\Enums\ProfileEnum;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
      /*Storage::disk('private')->buildTemporaryUrlsUsing(function ($path, $expiration, $options) {
          return URL::temporarySignedRoute(
            'files.view',
            $expiration,
            array_merge($options, ['file_id' => $options['id'], 'path' => $path])
          );
        });*/

      Gate::define('impersonate', function (User $user) {
        return $user->profile_id === ProfileEnum::ADMIN;
      });

      Gate::define('leave-impersonating', function (User $user) {
        return session()->has('impersonate') && User::find(session()->get('impersonate'))->profile_id === ProfileEnum::ADMIN;
      });

      Gate::define('access-companies', function (User $user) {
        return $user->profile_id === ProfileEnum::ADMIN;
      });

      Gate::define('access-collaborators', function (User $user) {
        return $user->profile_id === ProfileEnum::ADMIN || $user->profile_id === ProfileEnum::MANAGER;
      });
    }
}
