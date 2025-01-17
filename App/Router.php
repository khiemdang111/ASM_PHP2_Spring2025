<?php
namespace App;

class Router
{
  private array $routes = [];

  public function add(string $path, array $params): void
  {
    $path = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)', $path); // Chuyển tham số động thành regex
    $path = '/^' . str_replace('/', '\/', $path) . '$/'; // Thêm ký tự regex
    $this->routes[] = [
      'path' => $path,
      'params' => $params
    ];
  }

  public function match(string $path): array|bool
  {
    foreach ($this->routes as $route) {
      if (preg_match($route['path'], $path, $matches)) {
        // Lọc các tham số động từ $matches
        $params = $route['params'];
        foreach ($matches as $key => $value) {
          if (is_string($key)) {
            $params[$key] = urldecode($value);
          }
        }
        return $params;
      }
    }
    return false;
  }

}