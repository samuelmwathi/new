<?php
include_once __DIR__.'/classes/payment_details.php';
include_once __DIR__.'/classes/loan_status.php';
class menu{
protected $text;
private $phoneNumber;
protected $session_id;
protected $customerCurrentLoan;
private $amount_to_creadit;
private $repayDate;




public function __construct($phoneNumber,$customerCurrentLoan,$amount_to_creadit,$repayDate){
$this->phoneNumber=$phoneNumber;
$this->customerCurrentLoan=$customerCurrentLoan;
$this->amount_to_creadit=$amount_to_creadit;
$this->repayDate=$repayDate;

}

 

public function main_menu(){
    $response = "CON select option\n";
    $response.="1 : My loan limit\n";
    $response.="2 : Apply for a loan\n";
    $response.="3 : My loans";
    return $response;
}
public function unpaid_loan($repayDate){
   
    if($this->customerCurrentLoan>0){
        $response="END Dear customer you have unpaid loan of KSH:".$this->customerCurrentLoan."
        to be repaid by ".$repayDate;
        echo $response;
    }else{
        $response="END Dear customer you dont have an unpiad loan, check your loan limit
        to apply for a loan/////
        select the option below to apply\n 1 : Apply for a loan";
        echo $response; 
    }


}
 
public function apply_loan($textArray,$availableLoanToBorrow,$loanType,$phoneNumber){

    $level = count($textArray);

    if($level == 1){
        $response ="CON Get a Loan to be repaid within\n";
        $response.="1 : (1)Month \n";
        $response.="2 : (3)Months \n";
        echo $response;
     } else if($textArray[1]==1 && $level==2){
        switch($loanType){
            case 3: 
                 $response="END Dear Customer you are only allowed to topup your loan 
                 if you select payment period that match the current loan";
                 echo $response;
                 break;
            default:{
                $response="END .................. Dear Customer you are only allowed to topup your loan 
                 if you select payment period that match the current loan";
                 echo $response;
            }
                
                 
        }
            
      }else if($textArray[1]==2 && $level==2){

        switch($loanType){
            case 1: 
                $response="END Dear Customer you are only allowed to topup your loan 
                if you select payment period that match the current loan";
                echo $response;
            break;
            default:{
                if($this->amount_to_creadit<=0){
                    $response="END you are not allowed to borrow, Your loan Limit is at KSH:".$this->amount_to_creadit;
                   echo $response;
                   } 
                     else{
                          $response="CON Enter amount between KSH: 100 and KSH:".$availableLoanToBorrow;
                        echo $response;
               }
            }
                  
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

public function check_loan_limit_balance($availableLoanToBorrow){
    $loanbalance=$this->amount_to_creadit-$this->$customerCurrentLoan;
    $response= "END Dear customer your loan limit is KSH:"
    .$this->amount_to_creadit." your current loan is at KSH:" .$this->customerCurrentLoan
    .", You are allowed to borrow KSH: ".$availableLoanToBorrow." to reach your loan limit";
    echo $response;
    //check loan limit balance

}

public function back($textArray){

// comming soon 
}







}






?>