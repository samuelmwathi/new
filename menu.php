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
        to apply";
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

        $comparedate=date("y-m-d",strtotime(2009-10-6));
        $current_date=date('y-m-d');
       
        if ($this->repayDate == $comparedate){
            switch($loanType){
                case 3: 
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
            ///else if they is date in the data base do the following 
        }else{
            $currentday=date('y-m-d');
            $repayDate=date($this->repayDate);

            if($repayDate > $currentday ){
                switch($loanType){
                    case 3: 
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

            }else{
                $response="END Dear Customer you have an over due loan that was to be paid by ".$this->repayDate. $comparedate.
                ". Repay the loan to continue enjoying our loan services";
                echo $response;
            }



            




        }
         //one month loan -----end------//   
      }else if($textArray[1]==2 && $level==2){

        $comparedate=date("y-m-d",strtotime(2009-10-6));
       
        if ($this->repayDate == $comparedate){
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
            ///else if they is date in the data base do the following 
        }else{
            $currentday=date('y-m-d');
            $repayDate=date($this->repayDate);
           if(!($repayDate > $currentday)){
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

            }else{
                $response="END Dear Customer you have an over due loan that was to be paid by ".$this->repayDate.
                ". Repay the loan to continue enjoying our loan services";
                echo $response;
            }



            




        }
       //3 month loan ----end-----//

    }
    elseif($level==3){
        if($textArray[2] <100 || $textArray[2] > $availableLoanToBorrow ){
            $response="END Dear customer please enter loan amount within your loan bracket, Thank you!";
            echo $response;
        }else{
            $response="CON Please select account to credit\n";
            $response.="1 :".$phoneNumber;
            echo $response;
        }
        
    }
    elseif($level==4){
        //connect to database
    $conn=mysqli_connect(hostname:"remotemysql.com",
    username: "62ufR36NQc",
    password:"Q6jiKEZ2vP",
    database:"62ufR36NQc");

    $t=time();
    // echo($t . "<br>");
    // echo(date("Y-m-d",$t));



    $current_date=date('y-m-d');
    $loanType=$textArray[1];
    if($loanType==1){
        $db_repaydate=date("y-m-d",strtotime($current_date.'+ 1 months'));
    }else{
        $db_repaydate=date("y-m-d",strtotime($current_date.'+ 3 months'));;
    }
    
    $processingDate=date($current_date,$t);
    
    $loanApplied=$textArray[2];
    $memberid=2;
            //check if a customer has an existing loan if yes update the database else create a new recode in the data base
        $comparedate=date("y-m-d",strtotime(2009-10-6));
        if ($this->repayDate == $comparedate ){
            $sqlsmt=("INSERT INTO `loan_status` (loan_id, member_id, phone_number, loan_amount, repay_date,
    loan_status, loan_type, processing_date)
    VALUES (NULL, '3', '$phoneNumber', ' $loanApplied', '$db_repaydate', '-1', '$loanType', '$processingDate');");
     $execute=mysqli_query($conn,$sqlsmt);
     if($execute){
        echo "END successful";
     }
    }else{
            $sql =(" UPDATE `loan_status` as ls SET `loan_amount`= ($loanApplied+$this->customerCurrentLoan) WHERE ls.phone_number='+254723595220' 
            and ls.loan_status='-1';");
             $execute=mysqli_query($conn,$sql);
             if($execute){
                echo "END Dear customer please wait as your request is being processed";
        
             }
        }

        //recode to the database 
    }

}

public function check_loan_limit_balance($availableLoanToBorrow){

    $response= "END Dear customer your loan limit is KSH:"
    .$this->amount_to_creadit." your current loan is at KSH:" .$this->customerCurrentLoan
    .", You are allowed to borrow KSH: ". ($this->amount_to_creadit-($this->customerCurrentLoan))." to reach your loan limit";
    echo $response;
    //check loan limit balance

}

public function back($textArray){

// comming soon 
}
}






?>