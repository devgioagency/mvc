<?php
/**
 * Created by PhpStorm.
 * User: martintomczak
 * Date: 16.01.17
 * Time: 11:56
 */

namespace Framework\Core;

use Core\ICore;

class Controller implements ICore {

    protected $var = [];

    /**
     * @param $file
     */
    public function view($file)
    {

        if(isset($this->var['name']) && isset($this->var['value'])) {

            $v[$this->var['name']] = $this->var['value'];
        }

        include self::VIEW_PATH . $file . ".html";
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->var['name']  = $name;
        $this->var['value'] = $value;
    }

    /**
     * @param $helperName
     * @return mixed
     */
    public function getHelper($helperName)
    {
        $helper = new \Loader();

        return $helper->helper($helperName);
    }

    public function getLib($name)
    {
        $helper = new \Loader();

        return $helper->lib($name);
    }

}