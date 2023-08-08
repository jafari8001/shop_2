<?php
class Router {
    private $routes = [];

    public function addRoute($url, $handler) {
        $this->routes["/shop_2/index.php/$url"] = $handler;
    }

    public function dispatch($url) {
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'];
        if (isset($this->routes[$path])) {
            $handler = $this->routes[$path];
            $queryParams = [];
            if (isset($parsedUrl['query'])) {
                parse_str($parsedUrl['query'], $queryParams);
            }

            call_user_func($handler, $queryParams);
        } else {
            return [
                "status" => "404",
                "message" => "Page not found",
                "data" => "",
            ];
        }
    }
}

?>