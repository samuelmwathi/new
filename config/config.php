<?php
//configuration ang connection to data base
class Connect extends PDO{

public function __construct(){
    $conn=mysqli_connect(hostname:"remotemysql.com",
    username: "62ufR36NQc",
    password:"Q6jiKEZ2vP",
    database:"62ufR36NQc");
}

}

?>