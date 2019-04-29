<?php
header('Content-Type: text/xml; charset=utf-8');
//$url = 'http://10.150.10.2:8787/TerminalService.asmx?op=ValidateRequisiteJson';
$url = 'http://217.29.30.220/umai/index.php';
$xml ='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <ValidateRequisiteJson xmlns="KioskSystems">
      <terminalId>long</terminalId>
      <type>string</type>
      <requisite>string</requisite>
    </ValidateRequisiteJson>
  </soap:Body>
</soap:Envelope>';
//paste your XML file here

/*$xml = '

<?xml version="1.0" encoding="UTF-8"?>
<Parent>
<Child>
<Name>Roshini</Name>
<Age>5</Age>
</Child>
</Parent>';

// give the path of the Third party site
 */


$xml_post_string = '<?xml version="1.0" encoding="utf-8"?><soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope"><soap12:Body><SearchCollectionPoint xmlns="http://privpakservices.schenker.nu/"><customerID>XXX</customerID><key>XXXXXX-XXXXXX</key><serviceID></serviceID><paramID>0</paramID><address>RiksvŠgen 5</address><postcode>59018</postcode><city>Mantorp</city><maxhits>10</maxhits></SearchCollectionPoint></soap12:Body></soap12:Envelope>';

$headers = array(
    "POST /package/package_1.3/packageservices.asmx HTTP/1.1",
    "Content-Type: application/soap+xml; charset=utf-8",
    "Content-Length: ".strlen($xml_post_string)
);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
curl_close($ch);
file_put_contents("bergbaiTaxiLog.log", "ResponseT:\n".$response."\n", FILE_APPEND);
curl_close($ch);

?>