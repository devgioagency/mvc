<?php

/**
 * Created by PhpStorm.
 * User: martintomczak
 * Date: 16.01.17
 * Time: 12:32
 */


class CourierHelper
{

    protected $modeltype = null;
    protected $model = null;

    /**
     * @param Model $model
     */
    public function addSending(Model $model)
    {

        if($model instanceof LetterMailingModel) {

            $this->modeltype = 'letter';
        }

        if($model instanceof PackageMailingModel) {

            $this->modeltype = 'package';
        }

        $this->model = $model;
    }


    // Funktion zum Berechnen des Gesampreises aller Sendungen
    /**
     * @return int
     */
    public function getAllPrice()
    {
        $libPrice = new \Loader();

        $price = $libPrice->lib('price');

        $i = 0;

        foreach($this->model->getAll() AS $value) {

            $data = $price->setData($value);

            if($value['sending_type'] == 'international' && $this->modeltype == 'letter') {

                $i+= $data->LetterInternational();
            }

            else if ($value['sending_type'] == 'national' && $this->modeltype == 'letter') {

                $i+= $data->LetterNational();
            }

            else if($value['sending_type'] == 'international' && $this->modeltype == 'package') {

                $i+= $data->PackageInternational();
            }

            else if($value['sending_type'] == 'national' && $this->modeltype == 'package') {

                $i+= $data->PackageNational();
            }

        }

        return $i;
    }

    public function getNationalMailing()
    {
        // to do
    }

    public function getInternationalMailing()
    {
        //to do
    }

    public function getAllMailing()
    {
        return $this->getInternationalMailing() + $this->getNationalMailing();
    }

    public function getPackageWeight()
    {
        //to do
    }

    public function getLetterWeight()
    {
        // to do
    }

    public function getPackageByDate($date)
    {
        // to do
    }
}