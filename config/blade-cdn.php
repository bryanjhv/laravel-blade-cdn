<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CDN URL prefix
    |--------------------------------------------------------------------------
    |
    | Sometimes you want to use a common CDN for all the assets you use,
    | so you see repeated URL fragments in your aliases. Here you can set
    | that common prefix, and omit what you set in the aliases CDN URL.
    |
    */

    'prefix' => '',

    /*
    |--------------------------------------------------------------------------
    | Asset Aliases
    |--------------------------------------------------------------------------
    |
    | Here you can define asset aliases to easily access them from within
    | the directive. The alias should map to an array, with the first
    | element being the local asset path relative to public folder, and the
    | second being the CDN URL for the same asset.
    |
    */

    'aliases' => [

        'bootstrap-css' => [
            'css/bootstrap.min.css',
            '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
        ],
        'bootstrap-js' => [
            'js/bootstrap.min.js',
            '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
        ],
        'jquery' => [
            'js/jquery.min.js',
            '//code.jquery.com/jquery-2.1.4.min.js',
        ],

    ],

];
