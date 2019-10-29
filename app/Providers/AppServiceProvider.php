<?php

namespace App\Providers;

use App\Models\Question;
use App\Models\Report;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('notViewedReports', function () {
            return Report::countNotViewed();
        });

        Blade::directive('openedQuestions', function () {
            return Question::where('status', Question::STATUS_OPENED)->count();
        });
    }
}
