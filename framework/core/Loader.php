<?php
/**
 * Created by PhpStorm.
 * User: martintomczak
 * Date: 16.01.17
 * Time: 11:57
 */

class Loader
{
    //Helper laden

    public function helper($helper){

        include \Core\ICore::HELPER_PATH . ucfirst($helper)."Helper.php";

        $helper_name =  ucfirst($helper)."Helper";

        return new $helper_name;

    }

    public function lib($lib){

        include \Core\ICore::LIB_PATH . ucfirst($lib).".php";

        $lib_name =  ucfirst($lib);

        return new $lib_name;

    }
}


