<?php
include_once __DIR__.'/classes/payment_details.php';
include_once __DIR__.'/classes/loan_status.php';
class menu{
protected $text;
private $phoneNumber;
protected $session_id;
protected $customerCurrentLoan;
private $amount_to_creadit;



public function __construct($phoneNumber,$customerCurrentLoan,$amount_to_creadit){
$this->phoneNumber=$phoneNumber;
$this->customerCurrentLoan=$customerCurrentLoan;
$this->amount_to_creadit=$amount_to_creadit;

}

 

public function main_menu(){
    $response = "CON select option\n";
    $response.="1 : My loan limit\n";
    $response.="2 : Apply for a loan\n";
    $response.="3 : My loans";
    return $response;
}
public function unpaid_loan($customerCurrentLoan){
    if($customerCurrentLoan>0){
        echo "END Dear customer you have unpaid loan of KSH:".$customerCurrentLoan."
        reply with the option below to  repay\n 1 : repay loan";
    }else{
        echo "END Dear customer you dont have an unpiad loan, check your loan limit
        to apply for a loan/////
        select the option below to apply\n 1 : Apply for a loan";
    }


}
 
public function apply_loan($textArray,$availableLoanToBorrow,$phoneNumber){

    $level = count($textArray);

    if($level == 1){
        $response ="CON Get a Loan to be repaid within\n";
        $response.="1 : (1)Month \n";
        $response.="2 : (3)Months \n";
        echo $response;
    } else if($textArray[1]==1 && $level==2){
        $response="CON Enter amount between KSH: 100 and KSH:".$amount_to_credit;
        echo $response;

    }else if($textArray[1]==2 && $level==2){
        $response="CON Enter amount between KSH: 100 and KSH:".$amount_to_credit;
        echo $response;


    }
    elseif($level==4){
        $response="CON Please select account to credit\n";
        $response.="1 :".$phoneNumber;
        echo $response;
    }
    elseif($level==5){
        echo "END Dear customer please wait as your loan is being processed, Thank you!";
    }

}

public function check_loan_limit_balance(){
    $loanbalance=$this->amount_to_creadit-$this->customerCurrentLoan;
    $response= "END Dear customer your loan limit is KSH:"
    .$this->amount_to_creadit." your current loan is at KSH:" .$this->customerCurrentLoan
    .", You are allowed to borrow KSH: ".$loanbalance." to reach your loan limit";
    echo $response;
    //check loan limit balance

}

public function repay_loan($textArray){
// comming soon 
}







}






?>