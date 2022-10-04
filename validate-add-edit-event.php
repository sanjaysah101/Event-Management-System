<?php
    require_once("myfunctions.php");
    require_once("../App/conn.php");
    session_start();
    // echo "<pre>";
    // print_r(trim($_POST["fullname"]));
    // echo "</pre>";
    $eventId = isset($_POST["eventId"])?trim($_POST["eventId"]):"";
    // echo "<pre>";
    // print_r($_POST);
    // echo $eventId;
    $eventName = isset($_POST["eventName"])?trim($_POST["eventName"]):"";
    $venue = isset($_POST["venue"])?trim($_POST["venue"]):"";
    $category = isset($_POST["category"])?trim($_POST["category"]):"";
    $organized_by = isset($_POST["organized_by"])?trim($_POST["organized_by"]):"";
    $event_Reg_start_date = isset($_POST["event_Reg_start_date"])?trim($_POST["event_Reg_start_date"]):"";
    $event_Reg_end_date = isset($_POST["event_Reg_end_date"])?trim($_POST["event_Reg_end_date"]):"";
    $event_start_date = isset($_POST["event_start_date"])?trim($_POST["event_start_date"]):"";
    $event_end_date = isset($_POST["event_end_date"])?trim($_POST["event_end_date"]):"";
    $event_start_time = isset($_POST["event_start_time"])?trim($_POST["event_start_time"]):"";
    $event_end_time = isset($_POST["event_end_time"])?trim($_POST["event_end_time"]):"";
    $entryFee = isset($_POST["entryFee"])?trim($_POST["entryFee"]):"";
    $maxSlot = isset($_POST["maxSlot"])?trim($_POST["maxSlot"]):"";
    $description = isset($_POST["description"])?trim($_POST["description"]):"";
    $status = isset($_POST["status"])?trim($_POST["status"]):"";

    $createdBy = $_SESSION["admin_id"];
    
    // echo $email;
    // echo $confirmEmail;
    // echo ($email == $confirmEmail);
    $err = "";
    // $success = "";
    $checkUserQuery = "SELECT * FROM events WHERE event_id = '$eventId'";
    if(!$conn->query($checkUserQuery)->num_rows){

        if($eventId == ""){
            $err = "Event Id can't be empty";
            header("location: events/add-event.php?error=$err");
        }

        
        $createEventQuery = "INSERT INTO `events` (`event_id`, `name`, `description`, `venue`, `category`, `organized_by`, `image`, `start_date`, `start_time`, `end_date`, `end_time`, `registration_starting_date_time`, `registration_closing_date_time`, `entry_fee`, `maximum_slot`, `created_at`, `created_by`) VALUES ('$eventId', '$eventName', '$description', '$venue', '$category','$organized_by', '', '$event_start_date', '$event_start_time', '$event_end_date', '$event_end_time', '$event_Reg_start_date', '$event_Reg_end_date', '$entryFee', '$maxSlot', now(), '$createdBy');";
        
        echo $createEventQuery;
        if($conn->query($createEventQuery)){
            $success = "Event Created Successfully";
            echo $success;
            header("location: events/add-event.php?success=$success");
        }else{
            $err = "Something went wrong. Please try again";
            header("location: events/add-event.php?error=$err");
        }
        
    }else{
        $updateQuery = "UPDATE `events` SET 
            name = '$eventName',
            description = '$description',
            `venue` = '$venue',
            `category` = '$category',
            `organized_by` = '$organized_by',
            `start_date` = '$event_start_date',
            `start_time` = '$event_start_time',
            `end_date` = '$event_end_date',
            `end_time` = '$event_end_time',
            `registration_starting_date_time` = '$event_Reg_start_date',
            `registration_closing_date_time` = '$event_Reg_end_date',
            `entry_fee` = '$entryFee',
            `maximum_slot` = '$maxSlot',
            `status` = '$status',
            `updated_at` = now() 
            WHERE `events`.`event_id` = '$eventId';";
        echo $updateQuery;
        if($conn->query($updateQuery)){
            $success = "Event Updated Successfully";
            header("location: events/add-event.php?success=$success&eventId=$eventId");
        }
    }
    echo $err;

    // $baseUrl = getBaseUrl();
    // echo "<pre>";
    // print_r($_POST);
    
?>