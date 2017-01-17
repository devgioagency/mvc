<?php
/**
 * Created by PhpStorm.
 * User: martintomczak
 * Date: 16.01.17
 * Time: 12:10
 */

use Framework\Core\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        $this->view('index');

    }
}