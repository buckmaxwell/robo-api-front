<?php
include 'constants.php';

function createJSON($post_data, $url_string){
    $curl_req = curl_init($url_string);
    curl_setopt_array($curl_req, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($post_data)
    ));
    var_dump($curl_req);
    return $curl_req;
}

function login($user, $pass){
    global $noResp, $urlPrefix;
    $post_data = array(
        'username' => $user,
        'password' => $pass 
    );
    $url = $urlPrefix.'/users/login';
    $json = createJSON($post_data, $url);
    // Send the request
    $response = curl_exec($json);
    // Check for errors
    if($response === FALSE){
        echo constants.$noResp;
        die(curl_error($json));
    }
    // Decode the response
    return json_decode($response, TRUE);
}

var_dump(login('admin', 'admin'));

// Print the date from the response
//echo $responseData['token'];
?>

