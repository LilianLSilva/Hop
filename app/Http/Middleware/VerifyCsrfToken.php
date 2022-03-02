<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'api/vehicles/*/inventory',
        'api/vehicles/*/inventory/increase',
        'api/vehicles/*/inventory/decrease',
        'api/starships/*/inventory',
        'api/starships/*/inventory/increase',
        'api/starships/*/inventory/decrease',
    ];
}
