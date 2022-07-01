<?php
include_once __DIR__.'/classes/payment_details.php';
include_once __DIR__.'/classes/loan_status.php';
class menu{
protected $text;
private $phoneNumber;
protected $session_id;
protected $loanDetails;
private $amount_to_creadit;




public function __construct($phoneNumber,$loanDetails,$amount_to_creadit){
$this->phoneNumber=$phoneNumber;
$this->loanDetails=$loanDetails;
$this->amount_to_creadit=$amount_to_creadit;

}

 

public function main_menu(){
    $response = "CON select option\n";
    $response.="1 : My loan limit\n";
    $response.="2 : Apply for a loan\n";
    $response.="3 : My loans";
    return $response;
}
public function unpaid_loan(){
   
    if($this->customerCurrentLoan>0){
        echo "END Dear customer you have unpaid loan of KSH:".$this->customerCurrentLoan."
        to be repaid by ".$this->loanDetails['repay_date'];
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
        switch($loanDetails['loan_type']){
            case 1: 
                $response="END Dear Customer please select the second option
                to match with option of the current loan ";
                echo $response;
            break;
            default:
            $response="CON Enter amount between KSH: 100 and KSH:".$availableLoanToBorrow;
            echo $response;
        }
            

    }else if($textArray[1]==2 && $level==2){




        switch($loanDetails['loan_type']){
            case 3: 
                $response="END Dear Customer please select the first option
                to match with option of the current loan ";
                echo $response;
            break;
            default:
            $response="CON Enter amount between KSH: 100 and KSH:".$availableLoanToBorrow;
            echo $response;
        }
       

    }
    elseif($level==3){
        $response="CON Please select account to credit\n";
        $response.="1 :".$phoneNumber;
        echo $response;
    }
    elseif($level==4){
        echo "END Dear customer please wait as your loan is being processed, Thank you!";
        //recode to the database 
    }

}

public function check_loan_limit_balance(){
    $loanbalance=$this->amount_to_creadit-$this->$loanDetails['loan_amount'];
    $response= "END Dear customer your loan limit is KSH:"
    .$this->amount_to_creadit." your current loan is at KSH:" .$this->$loanDetails['loan_amount']
    .", You are allowed to borrow KSH: ".$loanbalance." to reach your loan limit";
    echo $response;
    //check loan limit balance

}

public function back($textArray){

// comming soon 
}







}






?>