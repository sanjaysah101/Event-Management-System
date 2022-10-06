<?php
    // require_once("myfunctions.php");
    // $baseUrl = getBaseUrl();
    require_once("App/conn.php");

    $email = isset($_POST['email'])?$_POST['email']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";

    $sqlUser = "select id from admin where email='$email' and password='$password'";
    $result = $conn->query($sqlUser);
    // Echo $sqlUser;
    if($result->num_rows){
        $rows = $result->fetch_assoc();
        session_start();
        $_SESSION["admin_id"] = $rows["id"];
        print_r($_SESSION["admin_id"]);
        header("location: index.php");
    }else{
        // echo "failed";
        $msg = "Email or Password Does not match";
        header("location: login.php?error=$msg");
    }
?>