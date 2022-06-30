<?php
include_once __DIR__. '/../config/config.php';
class Loan_status{
    private $member_phone;
    private $loan_id;
    public function __construct($member_phone){
        $this->loan_id=$loan_id;
        $this->member_phoneNo=$member_phone;
    }
    public function select(){
        $db=new connect;
        $loan_status=array();
        $result=$db->prepare("SELECT ls.loan_status,ls.loan_amount FROM loan_status ls
         WHERE ls.phone_number='+254777659523' ");
        $result->execute();
        return $result;
    }

}

?>
