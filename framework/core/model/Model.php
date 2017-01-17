<?php
/**
 * Created by PhpStorm.
 * User: martintomczak
 * Date: 16.01.17
 * Time: 11:57
 */


abstract class Model
{
    protected $db;
    protected $data = [];

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $db = \Postgres::getInstance();

        $this->db = $db->getConnection();

    }

    /**
     * @param array $list
     * @return $this|bool
     */
    public function save(Array $list)
    {

        $field_list = '';

        $value_list = '';

        foreach ($list as $k => $v) {

            if (in_array($k, $this->fields)) {

                $field_list .=  $k .',';

                $value_list .= "'" . $v . "'" . ',';

            }

        }

        $field_list = rtrim($field_list, ',');

        $value_list = rtrim($value_list, ',');

        $sql = "INSERT INTO {$this->table} ({$field_list}) VALUES ($value_list)";

        $stmt = $this->db->prepare($sql);

        if($stmt->execute() === true) {

            $this->data = [
                'id'     => $this->db->lastInsertId($this->table."_id_seq"),
                'data'   => $list,
            ];

            return $this;

        } else {

            return false;

        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $sth = $this->db->prepare("SELECT * FROM {$this->table}");
        $sth->execute();

        return $sth->fetch(PDO::FETCH_BOTH);
    }
}