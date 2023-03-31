<?php
    session_start();
    if (!$_SESSION['logged']) {
       $response['error'] = true;
       $response['error-message'] = "session has been expired. Please login again";
       header('content-type: application/json');
       echo json_encode($response);
       exit(0);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $locationText = $_POST['location-text'];
        if(trim($locationText) == ''){
            $response = array('error' => true, 'error-message' => 'location search string not entered');
            echo json_encode($response);
            exit(0);
        }

        // create a new cURL resource
        $curl = curl_init();

        // set the URL and other options
        $api_key = 'AIzaSyDlpLpGQnjDpqtgTvJDRxmfWXsqiX_L-as';
        $locationText = urlencode($locationText);
        $url = 'https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$locationText.'&key='.$api_key.'';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // execute the cURL request
        $response = curl_exec($curl);
        // close the cURL resource
        curl_close($curl);

        // output the response
        $response = json_decode($response);
        if($response){
            $response = array('error'=> false, 'error-message'=> '', 'location-data'=> $response);
            echo json_encode($response);
            exit(0);
        }else{
            $response = array('error'=> true, 'error-message'=> 'No Data Received. Check You Internet Connection');
            echo json_encode($response);
            exit(0);

        }
        
    }
?>