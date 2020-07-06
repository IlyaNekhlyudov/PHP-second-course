<?php


namespace app\services\renderers;


class TwigRenderer implements IRender
{
    public function render($template, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader(VIEWS_DIR . 'twig');
        $twig = new \Twig\Environment($loader, []);

        $template .= ".twig";
        return $twig->render($template, $params);
    }
}