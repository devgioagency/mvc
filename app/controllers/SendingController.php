<?php

/**
 * Created by PhpStorm.
 * User: martintomczak
 * Date: 16.01.17
 * Time: 23:46
 */

use Framework\Core\Controller;

class SendingController extends Controller
{

    public function indexAction()
    {

        if(isset($_POST['ajax'])) {

            $data = $_POST;


            if($data['mailingtype'] == 'letter') {

                $dataArray = [
                    'firstname'     => $data['firstname'],
                    'lastname'      => $data['lastname'],
                    'weight'        => $data['weight'],

                ];

                $model = new LetterMailingModel();

                $model->save($dataArray);
            }

            else {

                $dataArray = [
                    'firstname'     => $data['firstname'],
                    'lastname'      => $data['lastname'],
                    'weight'        => $data['firstname'],
                ];

                $model = new PackageMailingModel();

                $model->save($dataArray);
            }

            $helper = $this->getHelper('courier');

            $helper->addSending($model);
        }


    }
}