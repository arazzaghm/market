<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use App\Models\Question;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\PostPolicy;
use App\Policies\QuestionPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
        Question::class => QuestionPolicy::class,
        Category::class => CategoryPolicy::class,
        Company::class => CompanyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
