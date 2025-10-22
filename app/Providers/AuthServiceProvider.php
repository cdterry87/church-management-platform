<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        \App\Models\Person::class => \App\Policies\PersonPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
