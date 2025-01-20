<?php
    require_once('config.php');
    session_start();


    $response = 0;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password' AND status = '1'");
    if (mysqli_num_rows($query) > 0) {

        $response = 1;
    }else{
        $response = 2;
    }
echo json_encode($response);

?>