<?php

class router {
    public static function parseRequest() {
        $url = $_GET["route"];
        if ($url == "") {
            header("Location: http://ht7?route=index");
            return;
        }
        echo "url = $url";
        $route = explode("/", $url);
        $controller = $route[0];
        $action = count($route) > 1 ? $route[1] : "index";
        $args = array_slice($route, 2);
        $c = new $controller();
        $c->$action(...$args);
    }
}