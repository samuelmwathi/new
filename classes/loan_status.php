<?php
include_once __DIR__. '/../config/config.php';
class Loan_status{
    private $member_phoneNo;
    private $loan_id;
    public function __construct($member_phoneNo){
        $this->loan_id=$loan_id;
        $this->member_phoneNo=$member_phoneNo;
    }
    public function select(){
        $db=new connect;
        $loan_status=array();
        $result=$db->prepare("SELECT ls.loan_status,ls.loan_amount FROM loan_status ls
         WHERE ls.phone_number='$this->member_phoneNo' ");
        $result->execute();
        return $result;
    }

    public function get_unpaid_loan($member_phoneNo){
        $db=new connect;
        $loan_status=array();
        $result=$db->prepare("SELECT ls.loan_status,ls.loan_amount,ls.repay_date, ls.loan_type FROM loan_status ls
         WHERE ls.phone_number='$this->member_phoneNo' and ls.loan_status=-1 ");
        $result->execute();
        return $result;
    }

}

?>
