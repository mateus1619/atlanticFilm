<?php

namespace App\Views;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class View
{
    /**
     * Method to render the view
     *
     * @param string $view
     * @param array $args
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public static function render(string $view, array $args = []): string
    {
        $loader = new FilesystemLoader(__DIR__ . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR);
        $twig = new Environment($loader);

        return $twig->render($view . '.html', $args);
    }
}