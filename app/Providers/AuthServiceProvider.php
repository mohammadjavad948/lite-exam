<?php

namespace App\Providers;

use App\Answer;
use App\Exam;
use App\Policies\AnswerPolicy;
use App\Policies\ExamPolicy;
use App\Policies\QuestPolicy;
use App\Quest;
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
        Exam::class => ExamPolicy::class,
        Quest::class => QuestPolicy::class,
        Answer::class => AnswerPolicy::class,
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
