<?php
header('Access-Control-Allow-Origin:*');
header('Content-type: json');
//Uncomment the endpoint desired.
//Production URL

//$url ='https://www.eProcessingNetwork.com/cgi-bin/wo/order.pl';

//Configuration parameters.
/*
$ePNAccount = '09141028';    //'629595';
$ReturnApprovedURL = 'http://uwsod.staging.wpengine.com/alumni-friends/';
$ReturnDeclinedURL = 'http://uwsod.staging.wpengine.com/alumni-friends/';
$ItemQty1 = '1';
$ItemDesc1 = $_POST['ItemDesc'];
$ItemCost1 = $_POST['ItemCost'];
$ItemQty2 = $_POST['ItemQty2'];
$ItemDesc2 = $_POST['ItemDesc2'];
$ItemCost2 = '0.00';
$BillEmail = '';
*/
$captcha;
if(isset($_POST['g-recaptcha-response'])){
       $captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
  //echo '<h2>Please check the the captcha form.</h2>';
  //exit;
  echo json_encode(array("status"=>"error"));
}else{
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfbQg4TAAAAAFE-DzhekhONvtYR62gGmvb6rHJu&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
if($response.success==true)
{
   /* echo "<html><head><base href='" . $url .
		"'></base></head>";
   
	//Dynamically builds POST request based on the information being passed into the script.
	$queryString = "";
	foreach($_REQUEST as $key => $value)
	{
 		if($queryString != "")
 		{
 			$queryString .= "&";
 		}
 		$queryString .= $key . "=" . urlencode($value);
	}
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 
	 "&ePNAccount = $ePNAccount".
 	"&ReturnApprovedURL=$ReturnApprovedURL".
 	"&ReturnDeclinedURL=$ReturnDeclinedURL".
 	"&ItemQty1=$ItemQty1".
 	"&ItemDesc1=$ItemDesc1".
	"&ItemCost1=$ItemCost1".
	"&ItemQty2=$ItemQty2".
	"&ItemDesc2=$ItemDesc2".
	"&ItemCost2=$ItemCost2".
	"&BillEmail=$BillEmail");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	$result = curl_exec($ch);
	curl_close($ch); */
	 echo json_encode(array("status"=>"successful"));
}else{
	echo json_encode(array("status"=>"error"));
}
}
?>