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
        // Kiểm tra routes đã được khởi tạo chưa
        if (!isset(self::$routes) || !is_array(self::$routes)) {
            die("Lỗi: Routes chưa được khởi tạo!");
        }

        // Nếu đường dẫn rỗng hoặc chỉ là '/', chuyển về '/'
        if ($uri == '' || $uri == '/') {
            $uri = '/';
        } else {
            // Loại bỏ query string nếu có
            if (strpos($uri, '?') !== false) {
                $uri = explode('?', $uri)[0];
            }
            // Cắt dấu / nếu xuất hiện ở cuối URI
            $uri = rtrim($uri, '/');
        }

        // Kiểm tra route có tồn tại không
        if (array_key_exists($uri, self::$routes)) {
            $controllerMethod = self::$routes[$uri];

            // Kiểm tra xem route có phải dạng mảng [Controller::class, 'method'] không
            if (is_array($controllerMethod) && count($controllerMethod) === 2) {
                [$controller, $method] = $controllerMethod;
            } elseif (is_string($controllerMethod)) {
                [$controller, $method] = explode("@", $controllerMethod);
            } else {
                die("Lỗi: Route không hợp lệ!");
            }

            // Kiểm tra controller và method có tồn tại không
            if (!class_exists($controller)) {
                die("Lỗi: Controller không tồn tại!");
            }

            $controllerInstance = new $controller();

            if (!method_exists($controllerInstance, $method)) {
                die("Lỗi: Method không tồn tại trong controller!");
            }

            return $controllerInstance->$method();
        } else {
            // Xử lý route có tham số {id}
            $uriParts = explode('/', trim($uri, '/'));
            $part1 = '/' . $uriParts[0]; // Phần đầu tiên của URI (ví dụ: /users)
            $part2 = $uriParts[1] ?? null; // Phần thứ hai của URI (ví dụ: id)

            foreach (self::$routes as $route => $controllerMethod) {
                if (strpos($route, '{id}') !== false) {
                    // Thay thế {id} bằng regex để so khớp
                    $pattern = str_replace('{id}', '(\d+)', $route);
                    if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {
                        $id = $matches[1]; // Lấy giá trị của {id}
                        // Xử lý cả hai định dạng: chuỗi hoặc mảng
                        if (is_array($controllerMethod) && count($controllerMethod) === 2) {
                            [$controller, $method] = $controllerMethod;
                        } elseif (is_string($controllerMethod)) {
                            [$controller, $method] = explode("@", $controllerMethod);
                        } else {
                            die("Lỗi: Route không hợp lệ!");
                        }
                        // Kiểm tra controller và method có tồn tại không
                        if (!class_exists($controller)) {
                            die("Lỗi: Controller không tồn tại!");
                        }
                        $controllerInstance = new $controller();
                        if (!method_exists($controllerInstance, $method)) {
                            die("Lỗi: Method không tồn tại trong controller!");
                        }
                        return $controllerInstance->$method($id);
                    }
                }
            }

            // Nếu không tìm thấy route
            // header("Location: /notfound");
            // exit;
        }

    }
}