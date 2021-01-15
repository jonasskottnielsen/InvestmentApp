<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{    
    public function index () 
    {
        return view('pages.apicall');
    }
    function lookup_cvr($cvr){
        // validate cvr
        if (!validate_cvr_number($cvr)){
            return "Validation of the cvr number failed";
        }
        // cvr_lookup
        cvr_get_apicall($cvr);
        // weather lookup
        
    }
    function cvrLookupForLocation ($cvr){
            // Start cURL
            $ch = curl_init();
        
            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, 'http://cvrapi.dk/api?country=dk&search=' . $cvr);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Projekt');
        
            // Parse result
            $json = curl_exec($ch);

            // Close connection 
            curl_close($ch);
            // decode json result
            $result = json_decode($json, true);
            // if the response contains an error something went wrong and it was not found.
            if (isset($result['error'])){
                // set 404 because of an not found error - more error handling could have been done
                header("HTTP/1.1 404 NOT FOUND");
            } else {
                // if no error is found, continue to get weather data for the given location.
                getLocationData($result['address']);
            }
    }
    function getLocationData($location)
    {
        $degree = 'C';
        $baseUri = 'https://vejr.eu/api.php';

        // Set params
        $params = [
            'location' => $location,
            'degree' => $degree
        ];

        // Combine the url.
        $url = $baseUri . '?' . http_build_query($params);
       // echo $url;
        // Set curl handler
        $ch = curl_init();

        // Set curl options for the handler
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Projekt');
        // disable cURL library built in security -> introduces huge security risks :(
        // It won't work without
        // TODO: modify php.ini - CA cert 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute the curl handler and fetch JSON response
        $json = curl_exec($ch);

        // Close curl handler
        curl_close($ch);
        // Decode the JSON
        $result = json_decode($json, true);
        // format to look like the requested output
        $jsonAttributeName['succes'] = 'true';
        $jsonAttributeName['data'] = array($result['CurrentData']);
        $jsonRespons = $jsonAttributeName;
        // set header 
        header("HTTP/1.1 200 OK");
        header('Content-type: application/json');
        echo json_encode($jsonRespons, JSON_PRETTY_PRINT);
    }
}

