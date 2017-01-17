<?php

/**
 * Created by PhpStorm.
 * User: martintomczak
 * Date: 16.01.17
 * Time: 14:12
 */


class PackageMailingModel extends Model
{
    protected $table = 'mailing';

    protected $fields = ['firstname','lastname','weight','width','height','length','day_of_entry','customs_duty','tacking_id','country','mailing_type','sending_type'];

}