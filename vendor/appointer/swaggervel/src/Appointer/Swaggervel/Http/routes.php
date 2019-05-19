<?php

Route::any(config('swaggervel.doc-route') . '/{page?}', [
    'as' => 'swaggervel.definitions',
    'middleware' => config('swaggervel.middleware.docs', []),
    'uses' => 'SwaggervelController@definitions',
]);

Route::get(config('swaggervel.api-docs-route'), [
    'as' => 'swaggervel.ui',
    'middleware' => config('swaggervel.middleware.api', []),
    'uses' => 'SwaggervelController@ui',
]);
