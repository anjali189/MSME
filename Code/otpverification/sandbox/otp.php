<?php

	class OtpGenSystem{
    	public sendOtp($apiKey,$number){

        // Genererta Random Number for otp
        $otp = mt_rand(100000,999999);
        // Message to Send
        $message = 'Your OTP is '.$otp;
        // Get cURL resource
        $curl=curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER=> 1,
        CURLOPT_URL=> 'http://api.msg91.com/api/sendhttp.php?country=91&sender=TESTIN&route=4&mobiles='.$number.'&authkey='.$apiKey.'&message='.utf8_encode($message),
        ));
        // Send the request & save response to $resp
        $resp=curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        return $otp;
    }
}