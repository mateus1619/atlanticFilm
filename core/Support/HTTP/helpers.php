<?php

use App\View\View;
use Dotenv\Dotenv;

/**
 * Helper to get env variable
 *
 * @param string $data
 * @return string|null
 */
function env(string $data): ?string
{
    if (empty($data)) return null;

    $dotenv = Dotenv::createMutable(__DIR__ . '/../../../app', '.env.local');
    $dotenv->load();
    return $_ENV[$data];
}

/**
 * Helper to render view
 *
 * @param string $view
 * @param array $args
 * @return string
 */
function view(string $view, array $args): string
{
    return View::render($view, $args);
}