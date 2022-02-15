<?php
echo '<h1 style="color:CornflowerBlue">router test</h1>';

/* generating path */
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
$pathBase = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__);

$request = str_replace($pathBase, '', $_SERVER['REQUEST_URI']);

$wholePath = $pathBase . $request;
//print_r($req);
/* ---------------------------------------- */

Class TestRouter {

    private array $handlers;
    private $notFoundHandler;
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';

    public function get($path, $handler) {
        $this->addHandler(self::METHOD_GET, $path, $handler);
    }

    public function post() {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }

    public function addNotFoundHandler($handler) {
        $this->notFoundHandler = $handler;
    }

    private function addHandler($method, $path, $handler) {
        $this->handlers[$method . $path] = ['path' => $path, 'method' => $method, 'handler' => $handler];
    }

    public function run() {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestPath = $requestUri['path'];
        $method = $_SERVER['REQUEST_METHOD'];

        $callback = null;
        foreach ($this->handlers as $config) {
            if ($handler['path'] === $requestPath && $method === $handler['method']) {
                $callback = $handler['handler'];
            }
        }

        if (!$callback) {
            header('HTTP/1.0 404 Not Found');
            if (!empty($this->notFoundHandler)) {
                $callback = $this->notFoundHandler;
            }
        }

        call_user_func_array($callback, [array_merge($_GET, $_POST)]);
    }
}

$testing = new TestRouter($wholePath);

echo '<h1 style="color:CornflowerBlue">router test</h1>';