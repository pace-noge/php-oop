<?php

class HttpRequest
{
    public static function uri(): string
    {
        if (isset($_SERVER["REQUEST_URI"])) 
        {
            return strtolower($_SERVER['REQUEST_URI']);
        }
        return "";
    }
} 

echo HttpRequest::uri();


class App
{
    private static $app = null;

    private function __construct()
    {
    }

    public static function get(): App
    {
        if (!self::$app) {
            self::$app = new App();
        }
        return self::$app;
    }

    public function bootstrap(): void
    {
        echo "App is bootstrapping";
    }
}

$app = App::get();
$app->bootstrap();

?>