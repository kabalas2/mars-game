<?php

namespace Core\Routing;


use Controller\Error;

class PageLoader
{
    public function load($urlParametrs)
    {
        $controllerName = 'Controller\\' . ucfirst($urlParametrs['controller']);
        $method = $urlParametrs['method'];
        $param = $urlParametrs['params'];
        if (method_exists($controllerName, $method)) {
            $controller = new $controllerName();
            $controller->$method($param);
        } else {
            $controller = new Error();
            $controller->index();
        }

    }
}