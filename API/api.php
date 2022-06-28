<?php 
 header('Content-Type: application/json');
 include_once __DIR__.'/../classes/users.php';
 
    $api=new users('sam38');
    $result=$api->select();
    $row_count=$result->rowCount();
    
    if($row_count>0){
        $result_arr= array();
        $result_arr['data']=array();
    
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $row_result=array(
                'user_id'              =>$user_id,
                'login_id'             =>$login_id,
                'user_type'            =>$user_type,
                'password'             =>$password,
                'salt'                 =>$salt,
                'password_status'      =>$password_status,
                'verification_token'   =>$verification_token,
                'user_active'          =>$user_active,
                'isactive'             =>$is_active,
                'user_app_landing_page'=>$user_app_landing_page
            );
            array_push($result_arr['data'],$row_result);
        }
        //convert to json
        echo json_encode($result_arr);
    }
    








?>