<?php
date_default_timezone_set( 'Asia/Bishkek' );
$begin_date=$_SERVER["argv"][1];
$end_date=$_SERVER["argv"][2];
$connection=pg_connect("host=kts.kg dbname=kts user=postgres password=ivjkmpjdfntkm57");
if(!$connection)
{

    print "Can not connect to DB\n";
    exit;
}


print "connect to DB\n";


$query1="update transactions set service_id=536 where transaction_date>='$begin_date' and transaction_date<'$end_date' and transaction_status=1 and service_id in (402)AND (trim(transaction_dst)) LIKE'31%'";
$result1=pg_query($connection,$query1);
$row=pg_fetch_row($result1);


?>