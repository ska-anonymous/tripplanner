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
        $form_data = $_POST;
        // use extract function to get all the values in its corresponding key as variable
        extract($_POST);
     
        require_once('db_connect.php');
        // first check if whishlist already contains this place
        $sql = "SELECT * FROM `wishlist` WHERE place_id='$place_id'";
        $qry = $pdo->prepare($sql);
        $qry->execute();
        if($qry->rowCount()){
            $response = array('error'=>true, 'error-message'=> 'This Place is already added to wishlist');
            echo json_encode($response);
            exit(0);
        }

        // now insert data to database
        $sql = "INSERT INTO `wishlist`(`place_name`, `place_address`, `place_icon`, `place_rating`, `place_business_status`, `place_id`, `place_types`) VALUES ('$place_name','$place_address','$place_icon','$place_rating','$place_business_status','$place_id',:place_types)";
        $qry = $pdo->prepare($sql);
        $qry->bindParam(':place_types', $place_types);
        $qry->execute();
        if($qry->rowCount()){
            $response = array('error'=>false, 'error-message'=>'');
            echo json_encode($response);
            exit(0);
        }else{
            $response = array('error'=>true, 'error-message'=> $qry->errorInfo());
            echo json_encode($response);
            exit(0);
        }
        
        
    }

?>