<?php

namespace App\Providers;

use App\Assets\Language;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $view->with('totalNotViewedReports', Report::countNotViewed());
        });

        View::composer('*', function ($view) {
            $view->with('totalOpenedQuestions', Question::countOpened());
        });

        View::composer('*', function ($view) {
            $view->with('allLanguages', Language::get());
        });

        View::composer('*', function ($view) {
            $view->with('currentLanguage', Language::getCurrent());
        });


        View::composer('*', function ($view) {
            $view->with('authHasNewAnswers', QuestionAnswer::checkIfAuthHasNewAnswers());
        });

        View::composer('*', function ($view) {
            $view->with('countedAuthNewAnswers', QuestionAnswer::countAuthNewAnswers());
        });

        View::composer('*', function ($view) {
            $view->with('authHasCompany',
                Auth::check()
                    ? Auth::user()->hasCompany()
                    : false
            );
        });
    }
}
