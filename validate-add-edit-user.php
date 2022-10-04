<?php
    require_once("myfunctions.php");
    require_once("../App/conn.php");
    // echo "<pre>";
    // print_r(trim($_POST["fullname"]));
    // echo "</pre>";
    // $id = "1";
    $id = isset($_POST["Id"])?trim($_POST["Id"]):"";
    // echo $id;
    // print_r($_POST);
    $fullname = isset($_POST["fullname"])?trim($_POST["fullname"]):"";
    $gender = isset($_POST["gender"])?trim($_POST["gender"]):"";
    $email = isset($_POST["email"])?trim($_POST["email"]):"";
    $confirmEmail = isset($_POST["confirmEmail"])?trim($_POST["confirmEmail"]):"";
    $mobileNumber = isset($_POST["mobileNumber"])?trim($_POST["mobileNumber"]):"";
    $whatsAppNumber = isset($_POST["whatsAppNumber"])?trim($_POST["whatsAppNumber"]):"";
    $organizationName = isset($_POST["organizationName"])?trim($_POST["organizationName"]):"";
    $organizationLocation = isset($_POST["organizationLocation"])?trim($_POST["organizationLocation"]):"";
    $address = isset($_POST["address"])?trim($_POST["address"]):"";
    $postalCode = isset($_POST["postalCode"])?trim($_POST["postalCode"]):"";
    $state = isset($_POST["state"])?trim($_POST["state"]):"";
    $country = isset($_POST["country"])?trim($_POST["country"]):"";
    $password = isset($_POST["password"])?trim($_POST["password"]):"";
    $confirmPassword = isset($_POST["cPassword"])?trim($_POST["cPassword"]):"";
    
    // echo $email;
    // echo $confirmEmail;
    // echo ($email == $confirmEmail);
    $err = "1";
    // $success = "";
    $checkUserQuery = "SELECT * FROM users WHERE email = '$email'";
    if(!$conn->query($checkUserQuery)->num_rows){
        
        // if($email != $confirmEmail){
        //     $err .= "Email and Confirm Email did not match.<br>";
        //     // echo $err;
        // }
        // if($password != $confirmPassword){
        //     $err .= "Password and confirm password did not match.<br>";
        //     // echo $err;
        // }
        if(strlen($password)<8){
            $err .= "Password length must be equal or greater than 8 char.<br>";
            // echo $err;
        }

        if($err == ""){
            $insertUserQuery = "INSERT INTO `users` (`id`, `full_name`, `email`, `gender`, `email_verified_at`, `password`, `mobile_number`, `whatsapp_number`, `address`, `postal_code`, `state`, `country`, `organization_name`, `organization_location`, `created_at`, `updated_at`) VALUES ('', '$fullname', '$email', '$gender', NULL, '$password', '$mobileNumber', '$whatsAppNumber', '$address', '$postalCode', '$state', '$country', '$organizationName', '$organizationLocation', now(), now());";
            
            echo $insertUserQuery;
            if($conn->query($insertUserQuery)){
                $success = "User Created Successfully";
                // echo $success;
                header("location: users/add-user.php?success=$success");
            }else{
                $err = "Something went wrong. Please try again";
                header("location: users/add-user.php?error=$err");
            }
        }else{
            // echo $err;
            header("location: users/add-user.php?error=$err");
        }

        

        // if($conn->query($insertUserQuery)){
        //     $succss = "User Add Successfully";
        //     echo $succss;
        // }
        // echo $err;
        
    }else{
        $updateQuery = "UPDATE `users` SET
            `full_name` = '$fullname',
            `gender` = '$gender',
            `mobile_number` = '$mobileNumber',
            `whatsapp_number` = '$whatsAppNumber',
            `address` = '$address',
            `postal_code` = '$postalCode',
            `state` = '$state',
            `country` = '$country',
            `organization_name` = '$organizationName',
            `organization_location` = '$organizationLocation',
            `updated_at` = now()
            WHERE `users`.`id` = '$id';";
        echo $updateQuery;
        if($conn->query($updateQuery)){
            $success = "User Updated Successfully";
            header("location: users/add-user.php?success=$success&userId=$id");
        }
        // $err = "User already exit";
        // header("location: users/add-user.php?error=$err");
    }


    // $baseUrl = getBaseUrl();
    // echo "<pre>";
    // print_r($_POST);
    
?>