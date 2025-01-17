<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // Trust proxies (Laravel default)
        \App\Http\Middleware\TrustProxies::class,

        // Handle CORS (Custom or Laravel's built-in middleware)
        \Illuminate\Http\Middleware\HandleCors::class,

        // Prevent request size issues
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        // Trim whitespace from input fields
        \App\Http\Middleware\TrimStrings::class,

        // Convert empty input strings to null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // Use the next line if using CSRF protection in web routes
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Authenticate user
        'auth' => \App\Http\Middleware\Authenticate::class,

        // Handle basic HTTP authentication
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,

        // Cache headers middleware
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,

        // Authorize user
        'can' => \Illuminate\Auth\Middleware\Authorize::class,

        // Verify CSRF token
        'csrf' => \App\Http\Middleware\VerifyCsrfToken::class,

        // Encrypt cookies
        'encrypt.cookies' => \App\Http\Middleware\EncryptCookies::class,

        // Force password confirmation
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,

        // Redirect if authenticated
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

        // Scope rate limiting for APIs
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        // Ensure user is verified (for email verification)
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Custom middleware for GCP token validation
        'gcp.token' => \App\Http\Middleware\ValidateGCPAccessToken::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces non-global middleware to always run in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\Authenticate::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];
}
