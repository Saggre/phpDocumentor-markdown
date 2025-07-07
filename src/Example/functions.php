<?php

namespace PhpDocumentorMarkdown\Functions;

/**
 * Mock function to demonstrate parameter handling.
 *
 * @param string $param1 Mock parameter 1
 * @param int $param2 Mock parameter 2
 * @return string
 */
function mockFunctionWithParameters(string $param1, int $param2): string
{
    return "Parameter 1: $param1, Parameter 2: $param2";
}

/**
 * Get database configuration.
 *
 * @return array Database configuration array
 * @see config.php
 */
function getDatabaseConfig(): array
{
    return [
        'DB_NAME' => getenv('MYSQL_DATABASE') ?: 'pizza',
        'DB_USER' => getenv('MYSQL_USER'),
        'DB_PASSWORD' => getenv('MYSQL_PASSWORD'),
        'DB_HOST' => getenv('MYSQL_HOST'),
    ];
}
