<?php
/**
 * Created by PhpStorm.
 * User: martintomczak
 * Date: 16.01.17
 * Time: 11:57
 */

class Postgres
{

    private static $instance = null;
    private $conn;

    private function __construct()
    {

        $config = $GLOBALS['config'];

        try {
            $this->conn = new \PDO("pgsql:dbname={$config['db']['database']};host={$config['db']['host']};port={$config['db']['port']}", $config['db']['username'], $config['db']['password']);

        } catch(PDOException  $e ){

            echo "DB-Connectio Error: ".$e->getMessage();
        }

    }

    private function __clone()
    {
        //
    }

    /**
     * @return null|Postgres
     */
    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Postgres();
        }

        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->conn;
    }
}