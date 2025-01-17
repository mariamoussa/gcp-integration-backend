<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paths to Apply CORS
    |--------------------------------------------------------------------------
    |
    | Specify the paths where CORS should be applied. Use `*` to allow all
    | paths, or specify particular paths like `api/*` for APIs.
    |
    */
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    /*
    |--------------------------------------------------------------------------
    | Allowed HTTP Methods
    |--------------------------------------------------------------------------
    |
    | Specify the HTTP methods that are allowed for CORS requests. Use `[*]`
    | to allow all methods.
    |
    */
    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Define the origins that are allowed to make CORS requests. Use `[*]`
    | to allow any origin. Be cautious with this setting in production.
    |
    */
    'allowed_origins' => ['http://localhost:3000'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins Patterns
    |--------------------------------------------------------------------------
    |
    | Similar to `allowed_origins`, but allows the use of wildcard patterns.
    |
    */
    'allowed_origins_patterns' => [],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Define the headers that are allowed in a CORS request. Use `[*]`
    | to allow any headers.
    |
    */
    'allowed_headers' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | Define the headers that should be exposed in the response. If no
    | headers are specified, the default CORS headers will apply.
    |
    */
    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | Specify the number of seconds a preflight request can be cached. A
    | value of 0 disables caching.
    |
    */
    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | Indicate whether the server supports credentials in a CORS request.
    | Set to `true` if cookies or authentication tokens need to be sent.
    |
    */
    'supports_credentials' => false,

];
