<?php

namespace App\Providers;
use App\Policies\DespesaPolicy;
use App\Models\Despesa;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Despesa::class => DespesaPolicy::class,
    ];


}
