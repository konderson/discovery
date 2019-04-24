<?php
date_default_timezone_set('Asia/Bishkek');
header("Content-Type: text/xml; charset='UTF-8'");

/**
 * Делает запрос на проверку реквизита абонента
 */
function checkAbonentRequest($xml){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//curl_setopt($ch, CURLOPT_URL, "http://212.112.101.182/TerminalService.asmx?op=ValidateRequisiteJson");
    curl_setopt($ch, CURLOPT_URL, "http://217.29.30.220/umai/");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    $result=curl_exec($ch);

    file_put_contents("logs.log", date("Y-m-d H:i:s")."Запрос серверу на проверку реквезита  ".$xml."\n",FILE_APPEND);
    file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ сервера на проверку реквезита  ".$result."\n",FILE_APPEND);
//return json_decode($result);
    return $result;


}

/**
 * Делает запрос на проведение платежа
 */
function payRequest($xml){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_URL, "http://217.29.30.220/umai/pay.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    $result=curl_exec($ch);


    file_put_contents("logs.log", date("Y-m-d H:i:s")."Запрос серверу на проведение  ".$xml."\n",FILE_APPEND);
    file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ сервера на проведение  ".$result."\n",FILE_APPEND);
    //file_put_contents("logs.log", $result,FILE_APPEND);

    return $result;
}

/**
 *Делает запрос на подтверждение статуса платежа
 */
function checktransactionRequest($xml){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_URL, "http://217.29.30.220/umai/check_pay.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    $result=curl_exec($ch);


    file_put_contents("logs.log", date("Y-m-d H:i:s")."Запрос серверу на подтверждение транзакции  ".$xml."\n",FILE_APPEND);
    file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ сервера на подтверждение транзакции  ".$result."\n",FILE_APPEND);
    //file_put_contents("logs.log", $result,FILE_APPEND);

    return $result;


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

    $connection= pg_connect("host=localhost dbname=kts user=postgres password=postgres");
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
    $pg_connection= pg_connect("host=localhost dbname=kts user=postgres password=postgres");
    if(!$pg_connection){

        exit();
    }
    $query="SELECT guid FROM umaiguid where guid='$guid'";
    $result=pg_query($pg_connection,$query);
    if(!$result)
    {
        print "Error on execute query";
        pg_close($pg_connection);
        exit;
    }
    $row=pg_fetch_row($result);


    if($row[0]==0){

        return false;

    }
    else{

        return true;

    }


}
/**
 * Делает запрос на уникальность pid в базе данных
 */

function checkPID($pid){
    $pg_connection= pg_connect("host=localhost dbname=kts user=postgres password=postgres");
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

    $pg_connection= pg_connect("host=localhost dbname=kts user=postgres password=postgres");
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

    $pg_connection= pg_connect("host=localhost dbname=kts user=postgres password=postgres");
    if(!$pg_connection){

        exit();
    }



    $query = "SELECT guid FROM umaiguid WHERE pid='$pid'";
    $getID = pg_query($pg_connection,$query);
    $row=pg_fetch_row($getID);
    $userID = $row[0];
    echo $userID;
    return $userID;
}


/**
 * Возвращает статус проверки лицевого счета абонента
 * 1 - Л/С найден, 0 - Л/С не найден , -1 - Сервис временно недоступен
 **/
function getStatusCode($xml){
    $doc = new DOMDocument();
    $doc->loadXML($xml);
    $resolt= $doc->getElementsByTagName('ValidateRequisiteJsonResult')->item(0)->nodeValue;

    $result = explode('statusCode', $resolt, 2);
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





// Пришла на проверку реквизита
if($ktscommand=='check'){
    file_put_contents("logs.log", 'Cтатус проведение'.$ktscommand."\n",FILE_APPEND);

    // Пришел запрос на проверку реквизита
    // Получаем данные для запроса

    $account=$_GET['account'];
    $service_id=$_GET['service_id'];
    $service_id=getServiseName($service_id);

    // Формируем XML
    $xml='<?xml version="1.0" encoding="utf-8"?>
	<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
		<soap:Body>
			<ValidateRequisiteJson xmlns="KioskSystems">
				<terminalId>6</terminalId>
				<type>'.$$service_id.'</type>
				<requisite>0104244-4</requisite>
			</ValidateRequisiteJson>
		</soap:Body>
	</soap:Envelope>
	';
    // Отправляет запрос , получаем результат
    $result=checkAbonentRequest($xml);



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

    else if($status==-1){

        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>-1</result><comment>Сервис временно недоступен</comment></response>';
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

    // Формируем XML для записи
    $xml='<?xml version="1.0" encoding="utf-8"?>
	<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
	  <soap:Body>
		<MakePaymentByServiceType xmlns="KioskSystems">
		<terminalId>6</terminalId>
		  <serviceType>Комтранском</serviceType>
		  <guid>'.$guid.'</guid>
		  <requisite>'.$account.'</requisite>
		  <amount>'.$sum.'</amount>
		  <comission>0</comission>
		  <user_comment>" "</user_comment>
		  <user_tin>" "<user_tin>
		</MakePaymentByServiceType>
	  </soap:Body>
	</soap:Envelope>
	';

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
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>1</result><osmp_txn_id>'.$pid.'</osmp_txn_id><comment>Ошибка провайдера!</comment></response>';
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
    $xml='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <GetStatus xmlns="KioskSystems">
      <guid>'.$guid.'</guid>
    </GetStatus>
  </soap:Body>
</soap:Envelope>
';
    $result=checktransactionRequest($xml);
    $check_status=checkTrantransactionStatus($result);
    file_put_contents("logs.log",date("Y-m-d H:i:s")."Проверка статуса $check_status \n",FILE_APPEND);
    /**
     *Платеж прошел успешно .Добавляем в транзакцию
     */
    if($check_status==='Accepted'){
        file_put_contents("logs.log",date("Y-m-d H:i:s")."Платеж успешно проведен \n",FILE_APPEND);
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>0</result><osmp_txn_id>'.$pid.'</osmp_txn_id><comment>Платеж успешно проведен</comment></response>';
        file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ KTS  ".$kts_response."\n",FILE_APPEND);
        echo($kts_response);
        exit();

    }
    else{
        $kts_response='<?xml version="1.0" encoding="UTF-8"?><response><result>-1</result><osmp_txn_id>'.$pid.'</osmp_txn_id><comment>Ошибка платеж не найден</comment></response>';
        file_put_contents("logs.log", date("Y-m-d H:i:s")."Ответ KTS  ".$kts_response."\n",FILE_APPEND);
        echo($kts_response);
        exit();
    }


}

?>