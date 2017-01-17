<?php
/**
 * Created by PhpStorm.
 * User: martintomczak
 * Date: 16.01.17
 * Time: 11:18
 */

namespace Framework\Core;

require 'ICore.php';


class MailingFramework implements \Core\ICore
{
    public static function run()
    {
        self::init();
        self::autoload();
        self::dispatch();
    }

    private static function autoload()
    {
        spl_autoload_register(__NAMESPACE__ . "\\MailingFramework::load");
    }

    /**
     * Initialisierung des Frameworks
     */
    private static function init()
    {
         //Definition controller und action z.B.
        // index.php?c=Mailing&c=add

        define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index');

        define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index');


        //Core klassen laden

        require self::CORE_PATH . "controller". self::DS. "Controller.php";

        require self::CORE_PATH . "Loader.php";

        require self::DB_PATH . "Postgres.php";

        require self::CORE_PATH . "model". self::DS. "Model.php";

        // Konfiguration laden

        $GLOBALS['config'] = include self::CONFIG_PATH . "config.php";

        session_start();

    }


    private static function dispatch()
    {
        $controller = CONTROLLER . "Controller";

        $action = ACTION . "Action";

        $controller_instance = new $controller;

        $controller_instance->$action();
    }

    /**
     * @param $classname
     */
    private static function load($classname){

        if (substr($classname, -10) == "Controller") {

            require_once self::CONTROLLER_PATH . "$classname.php";

        }

        elseif (substr($classname, -5) == "Model"){

            require_once  self::MODEL_PATH . "$classname.php";

        }

    }
}