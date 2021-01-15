<?php
use Illuminate\Support\Facades\Http;

if(!function_exists('validate_cvr_number')) {
            function validate_cvr_number($cvr){
                // remove all but numbers
                if (!$cvr===preg_replace('/[^0-9]/', '', $cvr)){
                    return false;
                } else  {
                    return true;
                }
            }
};

if(!function_exists('cvr_get_apicall')) {
    function cvr_get_apicall($cvr) {

        $url = "http://cvrapi.dk/api?country=dk&search=".$cvr;
        $header = [
            'Content-Type' => 'application/json',
            'UserAgent' => "My projekt"
        ];

        //Your code goes here
        $response = http::withHeader($header)->get($url);


        /**
         * evaluate the response
         * if the response is successfull, return an array including the response body ['success': true, 'response': {{Response Body}}]
         * If the response failed, return an array with an error message ['success': false, 'response': {{Response Error Message}}]
         * Optionally, you can take the actual error message from the response.
         */
        if ($response->ok()){
            return $response;
        } else {
            return $response;
        }
    }
}

?>