<?php 
// SELECT smpd.member_id, sm.member_fname, sm.member_phone, 
// smp.end_date,smpd.payment_id,smpd.total_quantity,smpd.rate,smpd.gross_pay 
// FROM society_member_payment_details smpd INNER JOIN society_member_payments smp 
// ON smp.society_payment_id=smpd.payment_id INNER JOIN socientymembers sm ON 
// sm.member_id=smpd.member_id WHERE smp.is_active=1;

// SELECT smpd.net_pay,smp.end_date FROM society_member_payment_details smpd INNER JOIN society_member_payments smp
// on smpd.payment_id=smp.society_payment_id INNER JOIN socientymembers sm 
// on sm.member_id=smpd.member_id where sm.member_idno='3813193';

SELECT smpd.net_pay,smp.end_date FROM society_member_payment_details smpd INNER JOIN society_member_payments smp
on smpd.payment_id=smp.society_payment_id INNER JOIN socientymembers sm 
on sm.member_id=smpd.member_id where sm.member_idno='3813193' and smp.end_date>='2022-05-23'and smp.end_date<'2022-05-24';


?>