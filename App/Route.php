<?php

namespace App;

class Route
{

    private static $routes = [];
    public static function get($url, $controllerMethod)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            self::$routes[$url] = $controllerMethod;
    }
    public static function post($url, $controllerMethod)
    {
        if (isset($_POST['method']))
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'POST')
                self::$routes[$url] = $controllerMethod;
    }
    public static function put($url, $controllerMethod)
    {
        if (isset($_POST['method']))
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'PUT')
                self::$routes[$url] = $controllerMethod;
    }
    public static function delete($url, $controllerMethod)
    {
        if (isset($_POST['method']))
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'DELETE')
                self::$routes[$url] = $controllerMethod;
    }

    public static function dispatch($uri)
{
    // Nếu đường dẫn rỗng hoặc chỉ là '/', chuyển về '/'
    if ($uri == '' || $uri == '/') {
        $uri = '/';
    } else {
        // Loại bỏ query string nếu có
        $uri = explode('?', $uri)[0];

        // Cắt dấu / nếu xuất hiện ở cuối URI
        $uri = rtrim($uri, '/');
    }

    // Kiểm tra route có tồn tại không
    if (array_key_exists($uri, self::$routes)) {
        $controllerMethod = self::$routes[$uri];

        // Kiểm tra xem route có phải dạng mảng [Controller::class, 'method'] không
        if (is_array($controllerMethod) && count($controllerMethod) === 2) {
            [$controller, $method] = $controllerMethod;
            
            // Tạo instance của controller và gọi phương thức
            $controllerInstance = new $controller();
            return $controllerInstance->$method();
        } else {
            die("Lỗi: Route không hợp lệ!");
        }
    }

    // Nếu không tìm thấy route
    header("Location: /notfound");
}


}
