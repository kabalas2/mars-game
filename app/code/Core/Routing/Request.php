<?php

namespace Core\Routing;

class Request
{

    private $post;
    private $get;
    private $serve;

    public function __construct()
    {
        $this->serve = $_SERVER;
        $this->post = $_POST;
        $this->get = $_GET;
    }

    public function getRoute()
    {
        $urlParametrs = [
            'controller' => null,
            'method' => 'index',
            'params' => null
        ];

        if (isset($this->serve['PATH_INFO'])) {
            $path = trim(strtolower($this->serve['PATH_INFO']), '/');
            $path = explode('/', $path);
            if (isset($path[0]) && $path[0]) {
                $urlParametrs['controller'] = $path[0];
                if (isset($path[1])) {
                    $urlParametrs['method'] = $path[1];
                    if (isset($path[2])) {
                        $urlParametrs['params'] = $path[2];
                    }
                }
            } else {
                $urlParametrs['controller'] = 'home';
            }
        } else {
            $urlParametrs['controller'] = 'home';
        }

        return $urlParametrs;
    }

}
