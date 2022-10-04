<?php
    require_once("../../myfunctions.php");
    require_once("../conn.php");
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
    // $confirmEmail = isset($_POST["confirmEmail"])?trim($_POST["confirmEmail"]):"";
    $mobileNumber = isset($_POST["mobileNumber"])?trim($_POST["mobileNumber"]):"";
    $whatsAppNumber = isset($_POST["whatsAppNumber"])?trim($_POST["whatsAppNumber"]):"";
    $organizationName = isset($_POST["organizationName"])?trim($_POST["organizationName"]):"";
    $organizationLocation = isset($_POST["organizationLocation"])?trim($_POST["organizationLocation"]):"";
    $address = isset($_POST["address"])?trim($_POST["address"]):"";
    $postalCode = isset($_POST["postalCode"])?trim($_POST["postalCode"]):"";
    $state = isset($_POST["state"])?trim($_POST["state"]):"";
    $country = isset($_POST["country"])?trim($_POST["country"]):"";
    $password = isset($_POST["password"])?trim($_POST["password"]):"";
    // $confirmPassword = isset($_POST["cPassword"])?trim($_POST["cPassword"]):"";
    
    // echo ($email == $confirmEmail);
    $err = "";
    // $success = "";
    echo $password;
    
    if($email != "" || $mobileNumber != ""){
        // echo $checkUserQuery;
        if($email != ""){
            $checkUserQuery = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        }
        if($mobileNumber != ""){
            $checkUserQuery = "SELECT * FROM users WHERE  mobile_number = '$mobileNumber' and password = '$password'";
        }
        if(!$conn->query($checkUserQuery)->num_rows){
            echo $email;
            
            // if($email != $confirmEmail){
                //     $err .= "Email and Confirm Email did not match.<br>";
                //     echo $err;
                // }
                // if($password != $confirmPassword){
                    //     $err .= "Password and confirm password did not match.<br>";
                    //     echo $err;
                    // }

            echo $email . "<br>" .$mobileNumber;
            if(strlen($password)<8){
                $err .= "Password length must be equal or greater than 8 char.<br>";
                // echo $err;
                header("location: ".$_SERVER["HTTP_REFERER"]."?error=$err");
                die;
            }
    
            if($err == ""){
                $insertUserQuery = "INSERT INTO `users` (`id`, `full_name`, `email`, `gender`, `email_verified_at`, `password`, `mobile_number`, `whatsapp_number`, `address`, `postal_code`, `state`, `country`, `organization_name`, `organization_location`, `created_at`, `updated_at`) VALUES ('', '$fullname', '$email', '$gender', NULL, '$password', '$mobileNumber', '$whatsAppNumber', '$address', '$postalCode', '$state', '$country', '$organizationName', '$organizationLocation', now(), now());";
                
                echo $insertUserQuery;
                if($conn->query($insertUserQuery)){
                    $success = "Your Account Created Successfully";
                    echo $success;
    
                    $sqlUser = "select * from users where email='$email' and password='$password'";
                    $result = $conn->query($sqlUser);
                    // Echo $sqlUser;
                    if($result->num_rows){
    
    
                        if(!isset($_SESSION["user_id"])){
                            session_start();
                            $row = $result->fetch_assoc();
                            $_SESSION["user_id"] = $row["id"];
                            // header("location: ".$loginUrl);
                            echo $success."     ".$eventId;
                            header("location: ../../events/all-events.php");
                            die;
                        //    print_r($_SESSION["admin_id"]);
                        }
                        
                        // print_r($_SESSION["user_id"]);
                        // header("location: ../../attendance.php?success=$success&eventId=$eventId");
                        // header("location: ".$_SERVER["HTTP_REFERER"]."index.php");
                        // echo $baseUrl;
                    }
    
    
    
    
    
    
    
    
                    // header("location: users/add-user.php?success=$success");
                    // header("location: ".$_SERVER["HTTP_REFERER"]."?success=$success");
                    // header("location: ".$_SERVER["HTTP_REFERER"]."?success=$success");
                    die;
                }else{
                    $err = "Something went wrong. Please try again";
                    // $err;
                    // header("location: users/add-user.php?error=$err");
                    header("location: ".$_SERVER["HTTP_REFERER"]."?error=$err");
                    die;
                }
            }

        }
        else{
            $err = "Account Already Exist";
            header("location: ".$_SERVER["HTTP_REFERER"]."?error=$err");
            die;
        }
        
    }
    else{
        $err = "Email or Mobile number can't be empty <br> One must be filled";
        // header("location: users/add-user.php?error=$err");
        header("location: ".$_SERVER["HTTP_REFERER"]."?error=$err");
    }
    

    
?>