<?php
date_default_timezone_set('Asia/Bishkek');
header('Content-Type: text/xml; charset=utf-8');
/**
 * Делает запрос на проверку реквизита абонента
 */
function checkAbonentRequest($xml){

//$url = 'http://217.29.30.220/umai/index.php';

    $url ='https://testpay.umai.kg/API.asmx?op=ValidatePayment';
    file_put_contents("logs.log", date("Y-m-d H:i:s")."URL  ".$url."\n",FILE_APPEND);
    $ch = curl_init($url);

//curl_setopt($ch, CURLOPT_MUTE, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
//curl_setopt($ch, CURLOPT_USERPWD, "KTS:KTSkts@vM");
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);

    file_put_contents("logs.log", date("Y-m-d H:i:s")."Запрос серверу на проведение  ".$xml."\n",FILE_APPEND);
    file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ сервера на проведение  ".$output."\n",FILE_APPEND);
    curl_close($ch);
    return $output;

}

/**
 * Делает запрос на проведение платежа
 */
function payRequest($xml){
    $url ='https://testpay.umai.kg/API.asmx?op=MakePayment';
    $ch = curl_init($url);
//curl_setopt($ch, CURLOPT_MUTE, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
    curl_setopt($ch, CURLOPT_USERPWD, "KTS:KTSkts@vM");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    file_put_contents("logs.log", date("Y-m-d H:i:s")."Запрос серверу на проведение  ".$xml."\n",FILE_APPEND);
    file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ сервера на проведение  ".$output."\n",FILE_APPEND);
    //file_put_contents("logs.log", $result,FILE_APPEND);
    return $output;
}

/**
 *Делает запрос на подтверждение статуса платежа
 */
function checktransactionRequest($xml){

    $url ='https://testpay.umai.kg/API.asmx?op=GetPaymentStatus';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
    curl_setopt($ch, CURLOPT_USERPWD, "KTS:KTSkts@vM");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    file_put_contents("logs.log", date("Y-m-d H:i:s")."Запрос серверу на подтверждение транзакции  ".$xml."\n",FILE_APPEND);
    file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ сервера на подтверждение транзакции  ".$output."\n",FILE_APPEND);
    //file_put_contents("logs.log", $result,FILE_APPEND);

    return $output;

}

//метод ping
function ping($xml){

    $url ='https://testpay.umai.kg/API.asmx';
    $ch = curl_init($url);
//curl_setopt($ch, CURLOPT_MUTE, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_USERPWD, "KTS:KTSkts@vM");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    file_put_contents("logs.log", date("Y-m-d H:i:s")."Запрос серверу на подтверждение транзакции  ".$xml."\n",FILE_APPEND);
    file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ сервера на подтверждение транзакции  ".$output."\n",FILE_APPEND);
    //file_put_contents("logs.log", $result,FILE_APPEND);

    return $output;
}


/**
 *Делаем запрос пока статус платежа не станет
 */
function confirmRequest($xml){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_URL, "");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    $result=curl_exec($ch);


    //file_put_contents("logs.log", $result,FILE_APPEND);

    return $result;

}

/**
 * Получает имя сервиса по КТС ид сервиса
 */
function  getServiseName($service_id){

    $connection= pg_connect("host=kts.kg dbname=kts user=postgres password=ivjkmpjdfntkm57");
    if(!$connection)
    {
        // print "Can not connect to DB\n";
        exit;
    }
    //print "connect to DB\n";
    $query="SELECT umai_id  FROM umai_service WHERE kts_service=".$service_id;
    $result_db=pg_query($connection,$query);
    if(!$result_db)
    {
        // print "Error on execute query";
        pg_close($connection);
        exit;
    }
    $service_umai=pg_fetch_row($result_db);
    pg_close($connection);

    return $service_umai[0];

}





/**
 * Формирует guid на основе
 **/
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
// 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

// 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

// 16 bits for "time_hi_and_version",
// four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

// 16 bits, 8 bits for "clk_seq_hi_res",
// 8 bits for "clk_seq_low",
// two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

// 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}



/**
 * Делает запрос на уникальность GUID в базе данных
 */
function checkGUID($guid){
    $pg_connection= pg_connect("host=kts.kg dbname=kts user=postgres password=ivjkmpjdfntkm57");
    if(!$pg_connection){

        exit();
    }
    $query="SELECT guid FROM umaiguid where guid='$guid'";
    $result=pg_query($pg_connection,$query);
    if(!$result)
    {

        pg_close($pg_connection);
        exit;
    }


    if(pg_num_rows($result)>0){


        return true;

    }
    else{

        return false;

    }


}


/**
 * Делает запрос на уникальность pid в базе данных
 */

function checkPID($pid){
    $pg_connection= pg_connect("host=kts.kg dbname=kts user=postgres password=ivjkmpjdfntkm57");
    if(!$pg_connection){

        exit();
    }
    $query="SELECT count(*) FROM umaiguid where pid='$pid'";
    $result=pg_query($pg_connection,$query);
    $row=pg_fetch_row($result);


    if($row[0]==0){

        return false;

    }
    else{

        return true;

    }


}




/**
 * Делает запись бд GUID & PID с проверкой на уникальность
вызывается метод пока не guid не будет уникален
 */
function guidOperation($guid, $pid){

    $pg_connection= pg_connect("host=kts.kg dbname=kts user=postgres password=ivjkmpjdfntkm57");
    if(!$pg_connection){

        exit();
    }

    if(checkPID($pid)){//блок выполнится в том случае когда pid  не найден в системе

        $guid=getGUID($pid);
        return $guid;
    } if(checkGUID($guid)){

        $guid=gen_uuid();
        guidOperation($guid,$pid);

    }
    else{
        $query = "INSERT INTO umaiguid (guid, pid) VALUES ('$guid',$pid)";
        if (pg_query($pg_connection,$query)) {

            return $guid;

        } else {


        }
        pg_close($pg_connection);
    }
}

/**
 * Получает guid по значению pid
 */

function getGUID($pid){

    $pg_connection=  pg_connect("host=kts.kg dbname=kts user=postgres password=ivjkmpjdfntkm57");
    if(!$pg_connection){

        exit();
    }



    $query = "SELECT guid FROM umaiguid WHERE pid='$pid'";
    $getID = pg_query($pg_connection,$query);
    $row=pg_fetch_row($getID);
    $userID = $row[0];

    return $userID;
}


/**
 * Возвращает статус проверки лицевого счета абонента
 * 1 - Л/С найден, 0 - Л/С не найден , -1 - Сервис временно недоступен
 **/
function getStatusCode($xml){
    $doc = new DOMDocument();
    $doc->loadXML($xml);
    $resolt= $doc->getElementsByTagName('ValidatePaymentResponse')->item(0)->nodeValue;
    $result = explode('statusCode', $resolt, 4);
    return  ($result[1][3]);
}

/**
 *  Получает статус проведения платежа
 *	Accepted - Платеж прошел
 *  Pending - Платеж находится в ожидании ( находится в обработке)
 *  Sending - Отправка запроса
 *  Error - Платеж не прошел, ошибка провайдера
 */
function getPayStatus($xml){

    $doc = new DOMDocument();
    $doc->loadXML($xml);
    $result= $doc->getElementsByTagName('PaymentStatus')->item(0)->nodeValue;
    file_put_contents("logs.log",'PayStatus'.$result,FILE_APPEND);
    return $result;
}

function checkTrantransactionStatus($xml){

    $doc = new DOMDocument();
    $doc->loadXML($xml);
    $result= $doc->getElementsByTagName('PaymentStatus')->item(0)->nodeValue;
    return $result;

}

// Команда от процессинга
$ktscommand = $_GET['command'];
// ИД поставщика
$terminal_id='kts';
// Уникальный guid
$guid='';
// Результат
$result='';


// команда ping
if($ktscommand=='ping'){
    file_put_contents("logs.log", 'Команда Ping'.$ktscommand."\n",FILE_APPEND);


    $xml = '<?xml version="1.0" encoding="utf-8"?>'.
        '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"'.
        ' xmlns:xsd="http://www.w3.org/2001/XMLSchema"'.
        ' xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
        '<soap:Body>'.
        '<Ping xmlns="KioskSystems">'.
        '<login>test_user</login>'.
        '<passwordMD5>16ec1ebb01fe02ded9b7d5447d3dfc65</passwordMD5>'.
        '<terminalId>98765432101234567</terminalId>'.
        '<signature>93d971afdc8557ec2b8dd043d8e5997c</signature>'.
        '</Ping>'.
        '</soap:Body>'.
        '</soap:Envelope>';
    $result=ping($xml);
    file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ Umai  ".$result."\n",FILE_APPEND);


}

// Пришла на проверку реквизита
if($ktscommand=='check'){

    file_put_contents("logs.log", 'Cтатус проведение'.$ktscommand."\n",FILE_APPEND);

    // Пришел запрос на проверку реквизита
    // Получаем данные для запроса

    $account=$_GET['account'];
    $service_id=$_GET['service_id'];
    file_put_contents("logs.log", 'Сервис Umai '.$service_id."\n",FILE_APPEND);
    $service_id=getServiseName($service_id);
    file_put_contents("logs.log", 'Сервис Umai '.$service_id."\n",FILE_APPEND);
    $login='test_user';
    $passwordMD5='16ec1ebb01fe02ded9b7d5447d3dfc65';
    $terminalId='98765432101234567';
    $sum=10000;
    $hash=$login.$passwordMD5.$terminalId.$service_id.$account.$sum.'20b5c76000b0899ddee41e24d98a6adc21fe17ad343852f8ae096ba868b5309a';
    file_put_contents("logs.log", 'HASH  '.$hash."\n",FILE_APPEND);
    $hash=md5($hash);
    file_put_contents("logs.log", 'MD5  '.$hash."\n",FILE_APPEND);
    // Формируем XML

    $xml ='<?xml version="1.0" encoding="utf-8"?>'.
        '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"'.
        ' xmlns:xsd="http://www.w3.org/2001/XMLSchema"'.
        ' xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
        '<soap:Body>'.
        '<ValidatePayment xmlns="KioskSystems">'.
        '<login>'.$login.'</login>'.
        '<passwordMD5>'.$passwordMD5.'</passwordMD5>'.
        '<terminalId>'.$terminalId.'</terminalId>'.
        '<type>'.$service_id.'</type>'.
        '<requisite>'.$account.'</requisite>'.
        '<amountInCoins>'.$sum.'</amountInCoins>'.
        '<signature>'.$hash.'</signature>'.
        '</ValidatePayment>'.
        '</soap:Body>'.
        '</soap:Envelope>';
    // Отправляет запрос , получаем результат
    $result=checkAbonentRequest($xml);
    file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ Umai  ".$result."\n",FILE_APPEND);


    // Не пришел ответа от сервера или пришел пустой ответ
    if($result==NULL){
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>1</result><comment>Платеж не возможен.</comment></response>';
        file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ KTS  ".$kts_response."\n",FILE_APPEND);
        echo($kts_response);
        exit();
    }

    // Парсим ответ, получаем статус

    $status=getStatusCode($result);
    file_put_contents("logs.log", "Проверка реквизита $status\n",FILE_APPEND);


    if($status == 1){
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>0</result><comment>Платеж возможен</comment></response>';
        file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ KTS  ".$kts_response."\n",FILE_APPEND);
        echo($kts_response);
        exit();
    }

    else if($status == 0){
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>1</result><comment>Лицевой счет не найден</comment></response>';
        file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ KTS  ".$kts_response."\n",FILE_APPEND);
        echo($kts_response);
        exit();
    }

    else {
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>1</result><comment>Платеж не возможен.</comment></response>';
        file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ KTS  ".$kts_response."\n",FILE_APPEND);
        echo($kts_response);
        exit();
    }

}

// Пришла команда проведения платежа
if($ktscommand=='pay'){

    $account=$_GET['account'];
    $sum=$_GET['sum'];
    $service_id=$_GET['service_id'];
    $pid=$_GET['pid'];
    $guid=guidOperation(gen_uuid(),$pid);
    // Процесс записи гида в базу данных
    //setGUID($guid,$pid);
    $service_id=getServiseName($service_id);

    $login='test_user';
    $passwordMD5='16ec1ebb01fe02ded9b7d5447d3dfc65';
    $terminalId='98765432101234567';
    $comissionInCoins='500';
    $sum=$sum*100;
    $pid=$_GET['pid'];
    $hash=$login.$passwordMD5.$terminalId.$service_id.$guid.$account.$sum.$comissionInCoins.$pid.'20b5c76000b0899ddee41e24d98a6adc21fe17ad343852f8ae096ba868b5309a';
    //$hash=$login.$passwordMD5.$terminalId.$service_id.'8f6ad605-c1a8-436c-ac43-632f3ee71d2f'.$account.'10000'.$comissionInCoins.'tst-123-01'.'20b5c76000b0899ddee41e24d98a6adc21fe17ad343852f8ae096ba868b5309a';
    file_put_contents("logs.log", 'HASH  '.$hash."\n",FILE_APPEND);
    $hash=md5($hash);
    file_put_contents("logs.log", 'MD5  '.$hash."\n",FILE_APPEND);

    // Формируем XML для записи
    $xml ='<?xml version="1.0" encoding="utf-8"?>'.
        '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"'.
        ' xmlns:xsd="http://www.w3.org/2001/XMLSchema"'.
        ' xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
        '<soap:Body>'.
        '<MakePayment xmlns="KioskSystems">'.
        '<login>'.$login.'</login>'.
        '<passwordMD5>'$passwordMD5.'</passwordMD5>'.
    '<terminalId>'.$terminalId.'</terminalId>'.
    '<serviceType>'.$service_id.'</serviceType>'.
    '<dealer_guid>'$guid.'</dealer_guid>'.
    '<requisite>'.$account.'</requisite>'.
    '<amountInCoins>'.$sum.'</amountInCoins>'.
    '<comissionInCoins>500</comissionInCoins>'.
    '<billNumber>'.$pid.'</billNumber>'.
    '<user_comment></user_comment>'.
    '<user_tin></user_tin>'.
    '<user_address></user_address>'.
    '<signature>'.$hash.'</signature>'.
    '</MakePayment>'.
    '</soap:Body>'.
    '</soap:Envelope>';

    // Отправляем запрос , получаем ответа от сервера
    $result=payRequest($xml);
    // Парсим ответ, получаем статус о проведении платежа
    $payStatus=getPayStatus($result);
    // Пишем в логах статус для тестов
    file_put_contents("logs.log", $payStatus,FILE_APPEND);
    // Статус не пришел или статус пустой
    if($payStatus==NULL){
        // принят в обработку. Будет следующая попытка проведения!</comment></response>';
        file_put_contents("logs.log", 'NULL \n',FILE_APPEND);
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>-1</result><osmp_txn_id>'.$pid.'</osmp_txn_id><comment> Ошибка провайдера</comment></response>';
        file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ KTS  ".$kts_response."\n",FILE_APPEND);
        echo($kts_response);
        exit();

    }
    // Платеж успешен
    if($payStatus==='Accepted'){
        file_put_contents("logs.log", "$payStatus\n",FILE_APPEND);
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>0</result><osmp_txn_id>'.$pid.'</osmp_txn_id><comment>Платеж принят в обработку и подтвержден!</comment></response>';
        file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ KTS  ".$kts_response."\n",FILE_APPEND);
        echo($kts_response);
        exit();
    }
    // Платеж не прошел
    else if($payStatus==='Error'){
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>-1</result><osmp_txn_id>'.$pid.'</osmp_txn_id><comment>Ошибка провайдера!</comment></response>';
        file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ KTS  ".$kts_response."\n",FILE_APPEND);
        echo($kts_response);
        exit();
    }
    // Платеж находится в обработке
    else if ($payStatus==='Processing' ||
        $payStatus==='Sending' ||
        $payStatus==='Pending') {
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>-1</result><osmp_txn_id>'.$pid.'</osmp_txn_id><comment>Ошибка провайдера!</comment></response>';
        file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ KTS  ".$kts_response."\n",FILE_APPEND);
        echo($kts_response);
        exit();

    }
}

/**
/ Этап потверждения транзакции
/
 */
if($ktscommand==="check_transaction") {
    file_put_contents("logs.log","CHECK_TRANSACTION_BLOCK\n",FILE_APPEND);
    $pid=$_GET['pid'];
    $guid=getGUID($pid);
    file_put_contents("logs.log",date("Y-m-d H:i:s")."PID $pid  GUID $guid \n",FILE_APPEND);
    $xml ='<?xml version="1.0" encoding="utf-8"?>'.
        '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"'.
        ' xmlns:xsd="http://www.w3.org/2001/XMLSchema"'.
        ' xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
        '<soap:Body>'.
        '<GetPaymentStatus xmlns="KioskSystems">'.
        '<login>test_user</login>'.
        '<passwordMD5>16ec1ebb01fe02ded9b7d5447d3dfc65</passwordMD5>'.
        '<terminalId>98765432101234567</terminalId>'.
        '<dealer_guid>8f6ad605-c1a8-437c-ac43-632f3ee71d2f</dealer_guid>'.
        '<signature>cd175813f48171db3f1f85a47ba48d07</signature>'.
        '</GetPaymentStatus>'.
        '</soap:Body>'.
        '</soap:Envelope>';
    $result=checktransactionRequest($xml);
    $check_status=checkTrantransactionStatus($result);
    file_put_contents("logs.log",date("Y-m-d H:i:s")."Проверка статуса $check_status \n",FILE_APPEND);
    /**
     *Платеж прошел успешно .Добавляем в транзакцию
     */
    if($check_status==='Accepted'){
        file_put_contents("log.log",date("Y-m-d H:i:s")."Платеж успешно проведен \n",FILE_APPEND);
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>0</result><osmp_txn_id>'.$pid.'</osmp_txn_id><comment>Платеж успешно проведен!</comment></response>';
        file_put_contents("logs.log",date("Y-m-d H:i:s")."ответ $kts_response \n",FILE_APPEND);
        echo($kts_response);
        exit();

    }
    else{
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>-2</result><osmp_txn_id>'.$pid.'</osmp_txn_id><comment>Ошибка провайдера!</comment></response>';
        file_put_contents("logs.log",date("Y-m-d H:i:s")."ответ $kts_response \n",FILE_APPEND);
        echo($kts_response);
        exit();
    }



}

?>