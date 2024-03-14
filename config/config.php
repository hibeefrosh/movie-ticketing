<?php

return [
    'app' => [
        'name' => ' Movie Ticketing',
        'url' => 'http://localhost/movie-ticketing',
    ],
    'database' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'movie-ticketing',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Add other database options if needed
        ],
    ],
    // Add more configuration settings as needed
];
