<?php

include_once __DIR__. '/../config.php';

class users{
    private $login_id;
  
    public function __construct($login_id){
        $this->login_id=$login_id;
    }
   
    public function select(){
        $db=new connect;
        $users=array();
        $query="SELECT * FROM app_users ";
        // $query="SELECT * FROM users WHERE login_id='$this->login_id'";
        $result=$db->prepare($query);
        $result->execute(); 
        return $result;
    }

}

?>