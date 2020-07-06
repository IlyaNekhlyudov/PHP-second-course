<?php


namespace app\services;


class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;

    protected $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";

    //controller/action?id = .........

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    protected function parseRequest()
    {
        if (preg_match_all($this->pattern, $this->requestString, $matches)) {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function get(string $name)
    {
        return $_GET[$name];
    }

    public function post(string $name)
    {
        return $_POST[$name];
    }

    public function session(string $name, $params = null)
    {
        session_start();
        $name = htmlspecialchars($name);
        if (isset($params)) {
            if ($params == 'delete') {
                $_SESSION[$name] = null;
            } else {
                $_SESSION[$name] = "{$params}";
            }
        } else {
            return $_SESSION[$name];
        }
    }

    public function cookie(string $name, $params = null, $path = "")
    {
        $name = htmlspecialchars($name);
        if ($params) {
            setcookie($name, $params, ['path' => '/']);
        } else {
            return $_COOKIE[$name];
        }
    }

    public function deleteCookie($name)
    {
        $name = htmlspecialchars($name);
        unset($_COOKIE[$name]);
        return setcookie($name, null, -1, '/');
    }

    public function getRefererPage()
    {
        return $_SERVER["HTTP_REFERER"];
    }

    public function redirect($path = null, $message = null)
    {
        if ($path) {
            // anti ajax )) На самом деле итак не успеваю с ДЗ. Поэтому так выкрутился.
            // Да и самому было интересно подумать, как передать сообщение на другую страницу.  
            $this->cookie('Message', $message);
            // ---
            header("Location: {$path}");
        } else {
            header("Location: /");
        }
    }

    public function method(): string
    {

    }

    public function isAjax(): bool
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
            && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }
}