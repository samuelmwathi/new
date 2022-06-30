<?php
header('Content-Type: application/json');
include_once __DIR__.'/classes/payment_details.php';
include_once __DIR__.'/classes/loan_status.php';
include_once 'menu.php';
//variables decrelation and initialization


 function get_sum($phone_No){
    $phone_No=$phone_No;
    $payment=new paymants($phone_No);
    $result=$payment->select();
    $row_count=$result->rowCount();
    $sum=0;
    $amount_to_creadit=0;
    //get sum of net pay
    if($row_count>0){
        //loop through the row get the net pay and add to sum
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $sum=$sum+$row['net_pay'];
            


          
        }
       return $sum;
    }else
    {
        return 0;
    }
    
}

function get_loan_limit($phoneNumber){
    $sum= get_sum( $phoneNumber);
    $amount_to_creadit=$sum * 40 / 100;
    return $amount_to_creadit;
}
function getAmountToCredit(){
    $sum= get_sum( $phoneNumber);
    $amount_to_creadit=$sum * 40 / 100;
    return $amount_to_creadit;
}



//ussd code    
    include_once __DIR__.'/index.php'; 
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];
    $menu=new menu($phoneNumber);
    $amount_to_creadit=getAmountToCredit();
    header('Content-type: text/plain');
  



    if($text==""){
       echo $menu->main_menu();
    }else{
        $textArray=explode("*",$text);

        switch($textArray[0]){
            case 1: 
                $menu->check_loan_limit_balance();
            break;
            case 2:
                $menu->apply_loan($textArray,$amount_to_creadit,$phoneNumber);
            break;
            case 3:
                $menu->unpaid_loan();
            break; 
            default: echo "END Inavalid option\n";
                
        
        }


    }



        
   

?>
<!-- $amount_to_creadit=get_loan_limit( $phoneNumber);
        $response = "CON Dear customer your borrowing limit stands at KSH:".$amount_to_creadit.",
               select the option below to apply \n"; 
        $response.="1 : Apply for a loan";
    
        
    }
     -->