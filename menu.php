<?php
include_once __DIR__.'/classes/payment_details.php';
include_once __DIR__.'/classes/loan_status.php';
class menu{
protected $text;
private $phoneNumber;
protected $session_id;



public function __construct($phoneNumber){
$this->$phoneNumber=$phoneNumber;
}

public function main_menu(){
    $response = "CON select option\n";
    $response.="1 : See your loan limit\n";
    $response.="2 : Apply for a loan\n";
    $response.="3 : See your balance";
    return $response;
}
function unpaid_loan(){
    $result=new Loan_status($this->$phoneNumber);
    $rowCount=$result->rowCount();
    if($rowCount>0){
        $row=$result->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $unpaidloan=$row['loan_amount'];
        echo "End Dear customer you have unpaid loan of KSH:".$unpaidloan."
        reply with the option below to  repay\n 1 : repay loan";
    }else{
        echo "End Dear customer you dont have an unpiad loan,
        select the option below to apply\n 1 : Apply for a loan";
    }


}
 
function apply_loan($textArray,$amount_to_credit,$phoneNumber){

    $level = count($textArray);

    if($level == 1){
        $response ="CON Get a Loan to be repaid within\n";
        $response.="1 : (1)Month \n";
        $response.="2 : (3)Months \n";
        echo $response;
    } else if($textArray[1]==1 && $level==2){
        echo "CON Please enter your id number:";


    }else if($textArray[1]==2 && $level==3){
        echo "CON Please enter your id number:";


    }
    elseif($level==3){
        $response="CON Enter amount between KSH: 100 and KSH:".$amount_to_credit;
    }
    elseif($level==4){
        $response="CON Please select account to credit\n";
        $response.="1 :".$phoneNumber;
        echo $response;
    }
    elseif($level==5){
        echo "END please wait asyour loan is being processed, Thank you";
    }

}

function check_loan_limit_balance($loan_limit_balance){
    //check loan limit balance
if($loan_limit_balance>100){
    echo "End dear customer your loan limit is 10,000
    ,your current loan is 6,000. You are allowed to borrow 4000 to reach your loan limit";
}

}
function repay_loan($textArray){
// comming soon 
}







}






?>