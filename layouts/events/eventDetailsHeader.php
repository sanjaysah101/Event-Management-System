<?php

    $participantsQuery = "select * from participants where user_id = '$userId' and event_id = '$eventId'";
    $validateEventQuery = "select * from events where event_id = '$eventId'";
    // $userId = $id;
    $btnText = "Participate";
    // echo $id;

    $successMessage = isset($_GET['success'])?$_GET['success']:"";
    $errorMessage = isset($_GET['error'])?$_GET['error']:"";

    date_default_timezone_set('Asia/Kolkata');
    $showButton = false;   
    $currentDateTime = new DateTime();
    $currentDateTime =  $currentDateTime->format('Y-m-d H:i:s');
    
    $msg = isset($_GET["msg"])?$_GET["msg"]:"";
    
    $participantResult = $conn->query($participantsQuery);
    // print_r($participantsQuery);


    $eventResult = $conn->query($validateEventQuery);
    if($eventResult->num_rows){
        // echo $validateEventQuery;
        $row = $eventResult->fetch_assoc();
        // $row = $eventResult->fetch_assoc();
        // $msg = "You have participate Successfully";
        
        

        // // echo $registration_starting_date_time;
        // echo "start_date ".$event_start_date."<br>";
        // // echo "start_time ".$event_start_time."<br>";
        // echo "end_date ".$event_end_date."<br>";
        // // echo "end_time ".$event_end_time."<br>";
        // echo "registration_starting_date_time ".$registration_starting_date_time."<br>";
        // echo "registration_closing_date_time ".$registration_closing_date_time."<br>";
        // // echo "<br>"."Today Date ".$todaydate."<br>";
        // echo "The currentDateTime " . $currentDateTime."<br>";
    

        

        if($currentDateTime > $registration_starting_date_time  && $currentDateTime  < $registration_closing_date_time){
            $msg = "You can participate";
            $showButton = true;
            
            // $result = $conn->query($participateInsertQuery);
            // if($result){
            //     $msg .= "You have participate Successfully";
            //     echo $msg;
            // }
        }else if($currentDateTime < $registration_starting_date_time){
            $msg .= "Upcomming Event";
            $showButton = false;
        }else if($currentDateTime > $event_end_date){
            $msg .= "Event Expired!! ";
            // echo $event_end_date;
            $showButton = false;
        }
    }
    
    if($participantResult->num_rows){
        $showButton = false;
        // echo $currentDateTime;
        $row = $eventResult->fetch_assoc();
        $msg = "You have participate Successfully";
        // echo $msg."<br>";
        
       


        // echo "event_start_date ".$event_start_date."<br>";
        // echo "event_start_time ".$event_start_time."<br>";
        // echo "event_end_date ".$event_end_date."<br>";
        // echo "event_end_time ".$event_end_time."<br>";
        // echo "<br>"."Today Date ".$todaydate."<br>";
        // echo "The time is " . $currentTime;

        if($currentDateTime > $event_start_date && $currentDateTime < $event_end_date){
            $msg = "Attend Now";
            $btnText = "Mark Attendance";
            $showButton = true;
            // echo "tue";
            $checkAttendanceQuery = "select * from attendance where participant_id = '$id' and event_id = '$eventId'";
            
            $attendaceResult = $conn->query($checkAttendanceQuery);
            if($attendaceResult->num_rows){
                $msg = "attendace already marked";
                // echo $msg;
                $showButton = false;
            }

        }

        // echo $email ."is participated in".$event;
        // $data = $result->fetch_assoc();
        // $participantId = $data["id"];
        // $queryAttendance = "select * from attendance where participant_id = '$participantId' and event_id = '$event'";
        // $result = $conn->query($queryAttendance);
        // if(!$result->num_rows){
        //     $updae_attendance = "insert into attendance(participant_id, event_id) values('$participantId', '$event')";
        //     // echo $updae_attendance;
        // }else{                
        //     $attendanceRecords = $result->fetch_assoc();
        //     // echo "Your attendance is already marked at ".$attendanceRecords["attendance_at"];
        // }

    }
    // else{
    //     $showButton = false;
    //     if($msg == ""){
    //         $msg = "You have not been participated in the event yet! Do you want to participate";
    //     }
    //     // echo $err;
    //     // header("location: index.php?$err");
    // }

    

    // if(isset($_POST["submit"])){
    //     $userId = $_SESSION["user_id"];
    //     $participateInsertQuery = "INSERT INTO `participants` (`user_id`, `event_id`) VALUES ('$userId', '$eventId');";
    //     // $participantsQuery = "select * from participants where user_id = '$id' and event_id = '$eventId'";

    //     // echo $participateInsertQuery;
    //     // $result = $conn->query($sql);
    //     if($result->num_rows){

    //         $msg = "You have participate Successfully";
    //         // $msg = $participateQuery;
    //     }

        
        
    // }    



?>




<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">Events <?= $eventTitle?></h4>
                    <p class="card-description">
                        <?= $msg ?>
                        <?php 
                            if($errorMessage != ""){
                                echo sprintf('<div class="alert alert-danger" role="alert">%s %s</div>', $errorMessage, $msg);
                            }                        
                            else if($successMessage != ""){
                                echo sprintf('<div class="alert alert-success" role="alert">%s %s</div>', $successMessage, $msg);
                            }                        
                        ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <div class="p-2 bd-highlight">
                        <!-- <a onclick="myFunction()" class="btn btn-primary">Participate</a> -->
                        <form action="" method="post">
                            <?php
                                if($showButton){
                                    // echo '<input type="submit" class="btn btn-primary" name="submit">';
                                    echo sprintf('<a href="%s" class="btn btn-primary">%s</a>', $baseUrl."App/Model/addParticipant.php?eventId=$eventId&userId=$userId", $btnText);
                                }
                            ?>
                        </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

