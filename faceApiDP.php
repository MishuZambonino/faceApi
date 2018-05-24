<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class faceApiDP extends Controller
{
    require_once 'HTTP/Request2.php';
    $request = new Http_Request2('https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect');
    $url = $request->getUrl();
    $headers = array(
        // Request headers
        'Content-Type' => 'application/json',
    
        // NOTE: Replace the "Ocp-Apim-Subscription-Key" value with a valid subscription key.
        'Ocp-Apim-Subscription-Key' => '<Subscription Key>',
    );
    
    $request->setHeader($headers);
    
    $parameters = array(
        // Request parameters
        'returnFaceId' => 'true',
        'returnFaceLandmarks' => 'false',
        'returnFaceAttributes' => 'age,gender',
    );
    
    $url->setQueryVariables($parameters);
    
    $request->setMethod(HTTP_Request2::METHOD_POST);
    
    // Request body
    $request->setBody('{"url": "http://www.example.com/images/image.jpg"}');
    
    try
    {
        $response = $request->send();
        echo $response->getBody();
    }
    catch (HttpException $ex)
    {
        echo $ex;
    }
    
?>
}
