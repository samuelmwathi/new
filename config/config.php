<?php
//configuration ang connection to data base
class Connect extends PDO{

public function __construct(){
parent::__construct("mysql:host=remotemysql.com;dbname=62ufR36NQc",'62ufR36NQc','Q6jiKEZ2vP',
array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
$this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$this->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
}

}

?>