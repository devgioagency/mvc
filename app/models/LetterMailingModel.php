<?php

/**
 * Created by PhpStorm.
 * User: martintomczak
 * Date: 16.01.17
 * Time: 13:12
 */


class LetterMailingModel extends Model
{
    protected $table = 'mailing';

    protected $fields = ['firstname','lastname','weight','day_of_entry','customs_duty','tacking_id','country','mailing_type','sending_type'];

}