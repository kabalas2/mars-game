<?php

namespace Core\Routing;


class PageLoader
{
    public function load($urlParametrs)
    {
        $controllerName = 'Controller\\'.ucfirst($urlParametrs['controller']);
        $method = $urlParametrs['method'];
        $param = $urlParametrs['params'];

        $controller  = new $controllerName();
        $controller->$method();

    }
}