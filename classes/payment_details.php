<?php
include_once __DIR__. '/../config/config.php';
class paymants{
    private $member_phoneNo;
    private $current_date;
    private $six_months_back_date;
   
    public function __construct($member_phoneNo){
        $this->member_phoneNo=$member_phoneNo;
        $this->current_date=date('y-m-d');
        $this->six_months_back_date=date("y-m-d",strtotime($this->current_date.'- 6 months'));
    }
    public function select(){
        $db=new connect;
        $users=array();
        $result=$db->prepare("SELECT smpd.net_pay,smp.end_date FROM society_member_payment_details smpd INNER JOIN society_member_payments smp
        on smpd.payment_id=smp.society_payment_id INNER JOIN society_members sm 
        on sm.member_id=smpd.member_id where sm.member_phone='$this->member_phoneNo' and smp.end_date>='$this->six_months_back_date'");
        $result->execute();
        return $result;
    }

}

?>
