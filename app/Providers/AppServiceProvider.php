<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Semester\SemesterRepository;
use App\Repositories\Semester\SemesterRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(SemesterRepositoryInterface::class, SemesterRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
