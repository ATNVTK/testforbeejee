<?php

namespace core;

class Application

{

    protected static $app;
    public static $request;
    public static $db;
    /** @var User */
    public $user;


    public static function get_app()
    {
        if (!self::$app){
            self::$app = new Application();
        }
        return self::$app;
    }
    public function bootstrap()
    {
        self::$request = new Request();
        self::$db = new Db();
        $this->user = new User();
    }
    public function __construct()
    {
        spl_autoload_register(['static','loadClass']);
        $this->bootstrap();
    }

    public static function loadClass ($className)
    {
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        if (file_exists(__DIR__ . '/../' . $className.'.php')) {
            require_once __DIR__ . '/../' . $className . '.php';
        }
    }
    public function run()
    {
        list($controllerName, $actionName, $param) = self::$request->resolve();
        $this->runAction($controllerName, $actionName);
    }
    public function runAction($controllerName, $actionName)
    {
        $controllerName = ucfirst($controllerName) . 'Controller';
        if (class_exists(($controllerName), true)) {
            $controller = new $controllerName;
            $actionName = 'action' . ucfirst($actionName);
            if (method_exists($controller, $actionName)) {
                echo $controller->$actionName();
            }
        }
        else {

        }
    }
}