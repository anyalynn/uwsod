<?php
//Uncomment the endpoint desired.
//Production URL
$url ='https://www.myvirtualmerchant.com/VirtualMerchant/process.do';
//Demo URL
//$url ='https://demo.myvirtualmerchant.com/VirtualMerchantDemo/process.do';
//Configuration parameters.
$ssl_merchant_id = '206188';    /*'629595';*/
$ssl_user_id = 'OrthoWeb';   /*'webpayuw629';*/
$ssl_pin = 'Q1R8T04N985W9V6ADYIW7MAF6J8EB79JF96FXLPL6WFE19SF1EHU1R3XK0N48E6O';  /*  '275013';*/
$ssl_show_form = 'true';
$ssl_transaction_type = 'CCSALE';
$ssl_card_number = '';
$ssl_cvv2cvc2_indicator = '1';

$captcha;
if(isset($_POST['g-recaptcha-response'])){
       $captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
  echo '<h2>Please check the the captcha form.</h2>';
  exit;
}
$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfbQg4TAAAAAFE-DzhekhONvtYR62gGmvb6rHJu&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
if($response.success==true)
{
   
	//Declares base URL in the event that you are using the VMpayment form.
	if($ssl_show_form == 'true')
	{
		 echo "<html><head><base href='" . $url .
		"'></base></head>";
	}
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
	 "&ssl_merchant_id=$ssl_merchant_id".
 	"&ssl_user_id=$ssl_user_id".
 	"&ssl_pin=$ssl_pin".
    "&ssl_amount=50.00".
    "&ssl_country=United States".            
 	"&ssl_cvv2cvc2_indicator=$ssl_cvv2cvc2_indicator".
 	"&ssl_transaction_type=$ssl_transaction_type");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	$result = curl_exec($ch);
	curl_close($ch);
}
?>