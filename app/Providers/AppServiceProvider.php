<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Gate;
use App\Models\Student;
use App\Models\User;

# this is the entry point for your configuration 

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
        //
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);

        # define new gate of the student creator 
        Gate::define('delete-student', function (User $user, Student $student) {
            return $user->id === $student->creator_id;
        });

    }
}
