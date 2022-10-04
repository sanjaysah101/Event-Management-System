<?php
    // require_once("myfunctions.php");
    // $baseUrl = getBaseUrl();
    require_once("../conn.php");

    $email = isset($_POST['email'])?$_POST['email']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";

    $sqlUser = "select * from users where email='$email' and password='$password'";
    $result = $conn->query($sqlUser);
    // Echo $sqlUser;
    if($result->num_rows){
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["id"];
        
        // print_r($_SESSION["user_id"]);
        header("location: ../../index.php");
        // header("location: ".$_SERVER["HTTP_REFERER"]."index.php");
        // echo $baseUrl;
    }else{
        // echo "failed";
        $msg = "Email or Password Does not match";
        // echo $_SERVER["HTTP_REFERER"];
        header("location: ".$_SERVER["HTTP_REFERER"]."?error=$msg");
        die;
    }
?>