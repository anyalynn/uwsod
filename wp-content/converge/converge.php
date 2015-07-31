<?php
//Uncomment the endpoint desired.
//Production URL
$url ='https://www.myvirtualmerchant.com/VirtualMerchant/process.do';
//Demo URL
//$url ='https://demo.myvirtualmerchant.com/VirtualMerchantDemo/process.do';
//Configuration parameters.
$ssl_merchant_id = '629595';    /*'629595';*/
$ssl_user_id = 'UWwebpage';   /*'webpayuw629';*/
$ssl_pin = '13775731643585440912091633085065';  /*  '275013';*/
$ssl_show_form = 'true';
$ssl_transaction_type = 'CCSALE';
$ssl_card_number = '';
$ssl_cvv2cvc2_indicator = '1';

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
curl_setopt($ch, CURLOPT_POSTFIELDS, $queryString .
 "&ssl_merchant_id=$ssl_merchant_id".
 "&ssl_user_id=$ssl_user_id".
 "&ssl_pin=$ssl_pin".
 "&ssl_cvv2cvc2_indicator=$ssl_cvv2cvc2_indicator".
 "&ssl_transaction_type=$ssl_transaction_type");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);
$result = curl_exec($ch);
curl_close($ch);
?>