<?php
use \app\exceptions\PageNotFoundException;

require $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require ROOT_DIR . "services/Autoloader.php";

include VENDOR_DIR . "autoload.php";

$request = new \app\services\Request();

$controllerName = $request->getControllerName() ?: 'products';
$actionName = $request->getActionName();

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)) {
    /** @var \app\controllers\ProductController $controller */
    $controller = new $controllerClass(
        new \app\services\renderers\TemplateRenderer()
    );
    // try {
    //     $controller->runAction($actionName);
    // } catch (PageNotFoundException $e) {
    //     echo "404";
    // }
    $controller->runAction($actionName);
}