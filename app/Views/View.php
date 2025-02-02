<?php

namespace App\Views;

use Twig\Environment;

class View
{
    public function __construct(protected Environment $twig)
    {
        //
    }

    public function render(string $view, array $data = []): string
    {
        return $this->twig->render($view, $data);
    }
}