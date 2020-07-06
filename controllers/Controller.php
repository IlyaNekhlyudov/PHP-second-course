<?php
namespace app\controllers;

use app\exceptions\PageNotFoundException;
use app\services\renderers\IRender;
use app\services\Request;

abstract class Controller
{
    protected $defaultAction = 'Index';
    protected $action;
    protected $useLayout = true;
    protected $layout = 'main';
    /** @var IRender  */
    protected $renderer;

    public function __construct(IRender $renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null)
    {
        $this->action = $action ?: $action = $this->defaultAction;
        $method = "action" . ucfirst($action);

        if(method_exists($this, $method)) {
            $this->$method();
        } else {
            throw new PageNotFoundException("страница не найдена!");
        }
    }

    protected function render($template, $params = []){
        $params['message'] = (new Request())->cookie('Message');
        (new Request())->deleteCookie('Message');

        $content = $this->renderer->render($template, $params);
        if($this->useLayout) {
            return $this->renderer->render(
                "layouts/{$this->layout}",
                ['content' => $content, 'params' => $params] 
            );
        }
        return $content;
    }
}