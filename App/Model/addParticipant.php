<?php
    // $id = $_SESSION[""];
    require_once("../conn.php");
    $userId = isset($_GET["userId"])?$_GET["userId"]:"";
    $eventId = isset($_GET["eventId"])?$_GET["eventId"]:"";
    // echo $userId;
    // echo $eventId;
    
    $userEmail = isset($_POST["userId"])?$_POST["userId"]:"";
    $userNumber = isset($_POST["userNumber"])?$_POST["userNumber"]:"";
    // $eventId = isset($_POST["eventId"])?$_POST["eventId"]:"";
    if(isset($_POST["eventId"])){
        $eventId = $_POST["eventId"];
        // echo "post";
    }
  

    if($userEmail != "" || $userNumber != ""){
        $getUserIdQuery = "SELECT id from users where email = '$userEmail' or mobile_number = '$userNumber'";
        // echo $getUserIdQuery;
        // echo "<br>";
        // $result = $conn->query($getUserIdQuery);
        // echo $getUserIdQuery;
        // echo "<pre>";
        // print_r($result);
        $getUserIdResult = $conn->query($getUserIdQuery);
        if($getUserIdResult->num_rows){
            $row = $getUserIdResult->fetch_assoc();
            $userId = $row["id"];
            echo $userId;
        }else{
            if($userEmail != ""){
                $msg = "$userEmail not registered";
                echo $msg."To Redirect";
                // header("location: ".$_SERVER["HTTP_REFERER"]."?msg=$msg");
                header("location: ../../attendance.php?msg=$msg");
                die;
            }
            if($userNumber != ""){
                $msg = "$userNumber not registered";
                echo $msg."To Redirect";
                header("location: ../../attendance.php?phone=true&msg=$msg");
                die;
            }
            // header("location: ".$_SERVER["HTTP_REFERER"]."?msg=$msg");
            die;
            
        }
    }

    $getParticipantsQuery = "select * from participants where user_id = '$userId' and event_id = '$eventId'";
    
    date_default_timezone_set('Asia/Kolkata');
    
    
    $currentDateTime = new DateTime();
    $currentDateTime =  $currentDateTime->format('Y-m-d H:i:s');
    
    // echo $getParticipantsQuery;
    // $msg = "";

    // if(!isset($_SESSION["user_id"])){
    //     echo "User not login";
    //     die;
    // }

    if($userId == "" && $eventId ==""){
        $msg = urlencode("Unauthorizze access");
        echo $msg;
        // header("location: ".$_SERVER["HTTP_REFERER"]."?msg=$msg");
        die;
    }else{
        $getParticipantResult = $conn->query($getParticipantsQuery);
        if(!$getParticipantResult->num_rows){
            // echo $userId;
            // echo $eventId;
            $participateInsertQuery = "INSERT INTO `participants` (`user_id`, `event_id`) VALUES ('$userId', '$eventId');";
            echo $participantsQuery;
            
            $validateEventQuery = "select start_date_time, end_date_time, registration_starting_date_time, registration_closing_date_time, maximum_slot from events where event_id = '$eventId'";

            $result = $conn->query($validateEventQuery);
            if($result->num_rows){
                // echo $validateEventQuery;
                $row = $result->fetch_assoc();
                $start_date_time = $row["start_date_time"];
                $end_date_time = $row["end_date_time"];
                $registration_starting_date_time = $row["registration_starting_date_time"];
                $registration_closing_date_time = $row["registration_closing_date_time"];
                $maximum_slot = $row["maximum_slot"];

                // echo $registration_starting_date_time;
                echo "start_date ".$start_date_time."<br>";
                
                echo "end_date ".$end_date_time."<br>";
                
                echo "registration_starting_date_time ".$registration_starting_date_time."<br>";
                echo "registration_closing_date_time ".$registration_closing_date_time."<br>";

                date_default_timezone_set('Asia/Kolkata');

                // $todaydate = date("Y-m-d h:i:sa");
                // $currentTime = date("h:i:s");

               

                // echo "<br>"."Today Date ".$todaydate."<br>";
                echo "The time is " . $currentDateTime;


                

                if($currentDateTime > $registration_starting_date_time  && $currentDateTime  < $registration_closing_date_time){
                    $msg = "You can participate<br>";
                    $result = $conn->query($participateInsertQuery);
                    if($result){
                        $msg = "You have participated Successfully<br>";
                        markAttendance($conn, $eventId, $userId, $userId, $userEmail, $msg);
                        echo $msg;
                        if($userEmail != ""){
                            $msg = "$userEmail not registered";
                            echo $msg."To Redirect";
                            // header("location: ".$_SERVER["HTTP_REFERER"]."?success=$msg");
                            header("location: ../../attendance.php?success=$msg");
                            die;
                        }
                        if($userNumber != ""){
                            $msg = "$userNumber not registered";
                            echo $msg."To Redirect";
                            header("location: ../../attendance.php?phone=true&success=$msg");
                            die;
                        }
                        header("location: ".$_SERVER["HTTP_REFERER"]."?success=$msg");
                        die;
                    }
                }
                else if($currentDateTime < $registration_starting_date_time){
                    $msg = "Upcomming Event<br>";
                    if($userEmail != ""){
                        $msg = "$userEmail not registered";
                        echo $msg."To Redirect";
                        // header("location: ".$_SERVER["HTTP_REFERER"]."?msg=$msg");
                        header("location: ../../attendance.php?msg=$msg");
                        die;
                    }
                    if($userNumber != ""){
                        $msg = "$userNumber not registered";
                        echo $msg."To Redirect";
                        header("location: ../../attendance.php?phone=true&msg=$msg");
                        die;
                    }
                    echo $msg;
                    header("location: ".$_SERVER["HTTP_REFERER"]."?error=$msg");
                    die;

                }
                else if($currentDateTime > $registration_closing_date_time){
                    $msg = "Event has already finished<br>";
                    echo $msg;
                     if($userEmail != ""){
                        $msg = "$userEmail not registered";
                        echo $msg."To Redirect";
                        // header("location: ".$_SERVER["HTTP_REFERER"]."?msg=$msg");
                        header("location: ../../attendance.php?msg=$msg");
                        die;
                    }
                    if($userNumber != ""){
                        $msg = "$userNumber not registered";
                        echo $msg."To Redirect";
                        header("location: ../../attendance.php?phone=true&msg=$msg");
                        die;
                    }
                    header("location: ".$_SERVER["HTTP_REFERER"]."?msg=$msg");
                    die;
                }
            }
        }
        else{
            $msg = "You have already participated in the event $eventId <br>";
            // $isParticipate = true;
            
            echo $msg;
            markAttendance($conn, $eventId, $userId, $userId, $userEmail, $msg);
            echo $msg."1";
            
        }
    }
    // header("location: App/Model/addParticipant.php?msg=$msg");
    die;

    // header("location: ".$_SERVER["HTTP_REFERER"]."?success=$msg");
    die;
    

    function markAttendance($conn, $eventId, $userId, $userNumber, $userEmail, $msg = ""){
        $currentDateTime = new DateTime();
        $currentDateTime =  $currentDateTime->format('Y-m-d H:i:s');

        $validateEventQuery = "select name, start_date_time, end_date_time, registration_starting_date_time, registration_closing_date_time, maximum_slot from events where event_id = '$eventId'";
        
        $result = $conn->query($validateEventQuery);
        if($result->num_rows){
                $row = $result->fetch_assoc();
                $event_name = $row["name"];
                $event_start_date_time = $row["start_date_time"];
                // $event_start_time = $row["start_time"];
                $event_end_date_time = $row["end_date_time"];
                // $event_end_time = $row["end_time"];
                $registration_starting_date_time = $row["registration_starting_date_time"];
                $registration_closing_date_time = $row["registration_closing_date_time"];
                $maximum_slot = $row["maximum_slot"];
              

                if($currentDateTime > $event_start_date_time && $currentDateTime < $event_end_date_time){
                    $checkAttendanceQuery = "select * from attendance where participant_id = '$userId' and event_id = '$eventId'";
                    
                    $attendaceResult = $conn->query($checkAttendanceQuery);
                    if($attendaceResult->num_rows){
                        $msg .= "and Your Attendace Already marked";
                        
                        if($userEmail != ""){
                            header("location: ../../attendance.php?success=$msg");
                            die;
                        }
                        else if($userNumber != ""){
                            header("location: ../../attendance.php?phone=true&success=$msg");
                            die;
                        }else{
                            header("location: ".$_SERVER["HTTP_REFERER"]."?success=$msg");
                            die;
                        }
                    }
                    else{
                        $markAttendanceQuery = "INSERT INTO attendance(`participant_id`, `event_id`) VALUES ('$userId', '$eventId')";
                        // echo $markAttendanceQuery;
                        if($conn->query($markAttendanceQuery)){
                            $msg .= "and you Attendended Successfully";
                            echo $msg;
                            if($userEmail != ""){
                                header("location: ../../attendance.php?msg=$msg");
                                die;
                            }
                            if($userNumber != ""){
                                header("location: ../../attendance.php?phone=true&msg=$msg");
                                die;
                            }else{
                                header("location: ".$_SERVER["HTTP_REFERER"]."?success=$msg");
                                die;
                            }
                        }else{
                            $msg = "Something went wrong";
                            if($userEmail != ""){
                                header("location: ../../attendance.php?msg=$msg");
                                die;
                            }
                            if($userNumber != ""){
                                header("location: ../../attendance.php?phone=true&msg=$msg");
                                die;
                            }
                        }
                    }                 
                    
                    
                    
                }
                else if($currentDateTime < $event_start_date_time)
                {
                    $msg = "Event is not started yet";
                    echo $msg;
                    if($userEmail != ""){
                        header("location: ../../attendance.php?msg=$msg");
                        die;
                    }
                    else if($userNumber != ""){
                        header("location: ../../attendance.php?phone=true&msg=$msg");
                        die;
                    }else{
                        header("location: ".$_SERVER["HTTP_REFERER"]."?msg=$msg");
                        die;
                    }
                    
                    // $checkAttendanceQuery = "select * from attendance where participant_id = '$userId' and event_id = '$eventId'";
                    
                    // $attendaceResult = $conn->query($checkAttendanceQuery);
                    // if($attendaceResult->num_rows){
                    //     $msg = "You have participated in the event $event_name attendent successfully";
                    //     if($userEmail != ""){
                    //         header("location: ../../attendance.php?success=$msg");
                    //         die;
                    //     }
                    //     else if($userNumber != ""){
                    //         header("location: ../../attendance.php?phone=true&success=$msg");
                    //         die;
                    //     }else{
                    //         header("location: ".$_SERVER["HTTP_REFERER"]."?success=$msg");
                    //         die;
                    //     }
                    // }else{
                    //     $msg = "You have participated in the event $event_name but the event has not been started yet";
                    //     if($userEmail != ""){
                    //         header("location: ../../attendance.php?success=$msg");
                    //         die;
                    //     }
                    //     else if($userNumber != ""){
                    //         header("location: ../../attendance.php?phone=true&success=$msg");
                    //         die;
                    //     }else{
                    //         header("location: ".$_SERVER["HTTP_REFERER"]."?success=$msg");
                    //         die;
                    //     }
                    // }
                }else if($currentDateTime > $event_end_date_time){
                    $checkAttendanceQuery = "select * from attendance where participant_id = '$userId' and event_id = '$eventId'";
                    
                    $attendaceResult = $conn->query($checkAttendanceQuery);
                    if($attendaceResult->num_rows){
                        $msg = "Your attendance is already marked";
                        echo $msg;
                        if($userEmail != ""){
                            header("location: ../../attendance.php?msg=$msg");
                            die;
                        }
                        else if($userNumber != ""){
                            header("location: ../../attendance.php?phone=true&msg=$msg");
                            die;
                        }else{
                            header("location: ".$_SERVER["HTTP_REFERER"]."?msg=$msg");
                            die;
                        }
                        
                    }else{
                        $msg = 'You have participated in the event "$event_name" and your attendance is marked successfully';
                        if($userEmail != ""){
                            header("location: ../../attendance.php?msg=$msg");
                            die;
                        }
                        else if($userNumber != ""){
                            header("location: ../../attendance.php?phone=true&msg=$msg");
                            die;
                        }else{
                            header("location: ".$_SERVER["HTTP_REFERER"]."?msg=$msg");
                            die;
                        }
                    }
                    
                    
                }
            }
    }
    die;
?>