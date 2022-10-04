<?php 
  
     session_start();
     $userId = $_SESSION["user_id"];
     
     if(!isset($_SESSION["user_id"])){
       header("location: ".$loginUrl);
       die;
    //    print_r($_SESSION["admin_id"]);
     }else{
       $id = $_SESSION["user_id"];
       $sql = "select * from users where id = '$id'";
       $eventQuery = "select * from events";
       $result = $conn->query($sql);
       $eventResult = $conn->query($eventQuery);

       $userQuery = "select * from users";
       $userResult = $conn->query($userQuery);
       $participantsQuery = "select * from participants";
       $participantsResult = $conn->query($participantsQuery);
       
   
       if($result->num_rows){
         // print_r($result);
         $row = $result->fetch_assoc();
       }
       if($eventResult->num_rows){
         // print_r($result);
         $eventRow = $result->fetch_assoc();
       }
     }
     $userName = $row["full_name"];
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo $baseUrl.'vendors/feather/feather.css'; ?>">
  <link rel="stylesheet" href="<?php echo $baseUrl.'vendors/ti-icons/css/themify-icons.css'; ?>">
  <link rel="stylesheet" href="<?php echo $baseUrl.'vendors/css/vendor.bundle.base.css'; ?>">
  <link rel="stylesheet" href="<?php echo $baseUrl.'vendors/datatables.net-bs4/dataTables.bootstrap4.css'; ?>">
  <link rel="stylesheet" href="<?php echo $baseUrl.'vendors/ti-icons/css/themify-icons.css'; ?>">
  <link rel="stylesheet" href="<?php echo $baseUrl.'js/select.dataTables.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo $baseUrl.'css/vertical-layout-light/style.css'; ?>">
  <link rel="stylesheet" href="<?php echo $baseUrl.'vendors/font-awesome/css/font-awesome.min.css'; ?>">
</head>
<body>
    <!-- Scroller Container Start-->
    <div class="container-scroller">