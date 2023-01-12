<?php

namespace Core\Model;

use Core\Config;
use Core\Errors\MySqliError;

class dbMysql {

    private $db;

    public function __construct() {
        $this->db = new \mysqli(
            Config::get('db/host'), 
            Config::get('db/username'), 
            Config::get('db/password'), 
            Config::get('db/dbname')
        );

        if ($this->db->connect_errno) {
            MySqliError::dbError($this->db->connect_error);
        }
    }

    public function query($sql) {
        $result = $this->db->query($sql
        );
        if (!$result) {
            MySqliError::dbError($this->db->error);
        }
        return $result;
    }
}