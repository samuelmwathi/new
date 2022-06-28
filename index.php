<?php
header('Content-Type: application/json');
include_once __DIR__.'/classes/payment_details.php';
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

//ussd code    
    include_once __DIR__.'/index.php'; 
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];

switch($text){
    case "":
    $response = "CON select option\n";
    $response.="1 : See your loan limit\n";
    $response.="2 : Apply for a loan\n";
    $response.="3 : See your balance";
    break;
    case "1":
        $sum= get_sum( $phoneNumber);
            $amount_to_creadit=$sum * 40 / 100;
            $response = "END Dear customer your borrowing limit stands at KSH:".$amount_to_creadit.",\n
            please contact 0723895210 for more information and loan processing.
            Your loan will be processed within the next 24 hours,
            Thanks For Using Our Service";   
            break;

    case "2" :
        $response ="CON Select Option\n";
        $response.="1 : select\n";
        $response.="2 : select\n";
        $response.="9 : Back";
        break;
    case "3": 
        $responce ="CON Your Loan balance 3000";
        $responce.="9: back";
        break;
        case "4": 
            $responce ="CON Your Loan balance 3000";
            $responce.="9: back";
            break;
        
    }
    
//     if ($text == "") {
//         $response = "CON 1: See Amount You Can Borrow\n";
//         $response.="2: See last 6 Months Payment Totals ";
//     } else if ($text=="1") {
//         $sum= get_sum( $phoneNumber);
//         $amount_to_creadit=$sum * 40 / 100;
//          $response = "END Dear customer your borrowing limit stands at KSH:".$amount_to_creadit.",
//          please contact 0723895210 for more information and loan processing.
//           Your loan will be processed within the next 24 hours,Thanks For Using Our Service";
//     } elseif($text=="2"){
//         $sum= get_sum( $phoneNumber);
//         $amount_to_creadit=$sum * 40 / 100;
//         $response = "END Dear customer your 6 Month pay Amounts to KSH:".$amount_to_creadit.",
//                                Thanks For Using Our Service";
// }

    
    // if ($text == "") {
    //     $response = "CON : select option\n";
    //     $response.="1 : See your loan limit\n";
    //     $response.="2 : Apply for a loan\n";
    //     $response.="3 : See your balance";
    // } 
    // else if ($text=="1"){


    // }
    // else if ($text=="1") {
    //     $sum= get_sum( $phoneNumber);
    //     $amount_to_creadit=$sum * 40 / 100;
    //      $response = "END Dear customer your borrowing limit stands at KSH:".$amount_to_creadit.",\n
    //     please contact 0723895210 for more information and loan processing.
    //     Your loan will be processed within the next 24 hours,
    //     Thanks For Using Our Service";
    // } elseif($text=="2"){
    //     $sum= get_sum( $phoneNumber);
    //     $amount_to_creadit=$sum * 40 / 100;
    //     $response="END Your last 6 months Payments Amounts to KSH:".$sum."
    //     Thanks For Using Our Service";
 


    // }
    header('Content-type: text/plain');
    echo $response;

?>
