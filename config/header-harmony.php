<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Headers Presets
    |--------------------------------------------------------------------------
    |
    | You can define preset headers for different APIs or services.
    | Headers will use values from your .env file when needed.
    |
    */

        'openai' => [
            'Authorization' => 'Bearer ' . env('OPENAI_KEY'),
            'Content-Type' => 'application/json',
        ],

        'coinmarketcap' => [
            'X-CMC_PRO_API_KEY' => env('COINMARKETCAP_KEY'),
            'Accept' => 'application/json',
        ],

        'weatherapi' => [
            'key' => env('WEATHER_API_KEY'),
            'Accept' => 'application/json',
        ],

        'test' => [
            'Authorization' => env('TEST'),
            'Content-Type' => 'application/json',
        ],

];
