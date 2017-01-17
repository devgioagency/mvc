<?php

class Price
{

    protected $data;

    public function __construct()
    {
        //
    }

    public function setData(Array $data)
    {
        $this->data = $data;
    }

    public function PackageInternational()
    {

        $volumen = $this->data['height'] * $this->data['width']* $this->data['length'];

        if($volumen < 4000) {

            return 6.95;
        }

        else {

            if($volumen < 6000 && $this->data['weight'] <= 2000) {

                return 8.95;
            }

            else if($volumen < 6000 && $this->data['weight'] > 2000) {

                return 10.95;
            }
        }

    }

    public function PackageNational()
    {
        $volumen = $this->data['height'] * $this->data['width']* $this->data['length'];

        if($volumen >= 6000) {

            return 7.95;
        }

        else {

            if($volumen < 6000 && $this->data['weight'] <= 2000) {

                return 3.95;
            }

            else if($volumen < 6000 && $this->data['weight'] > 2000) {

                return 3.95;
            }
        }

    }

    public function LetterNational()
    {

        return $this->data['weight'] <= 100 ? 0.70 : 1.60;
    }

    public function LetterInternational()
    {

        if($this->data['weight'] <= 100) {

            return 0.90;
        }

        elseif ($this->data['weight'] > 100 && $this->data['weight'] < 300) {

            return 2.10;
        }

        return 4.50;

    }
}