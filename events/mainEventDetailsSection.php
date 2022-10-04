<?php
// session_start();
    require_once("../App/conn.php");
    $eventId = isset($_GET["eventId"])?$_GET["eventId"]:"NIYN";
    $sql = "select * from events where event_id='$eventId' ";
    $eventTitle = isset($row["name"]) ? $row["name"] : "";
    $description = isset($row["description"]) ? $row["description"] : "";
    
    $result = $conn->query($sql);
    // echo $sql;
    // print_r($result);
    if($result->num_rows){
        // echo "hi";
        $row = $result->fetch_assoc();
        // echo "<pre>";
        // print_r($row);
        // echo $row["start_date_time"];
        $event_start_date = $row["start_date_time"];
        // $event_start_time = $row["start_time"];
        $event_end_date = $row["end_date_time"];
        // $event_end_time = $row["end_time"];        
        $registration_starting_date_time = $row["registration_starting_date_time"];
        $registration_closing_date_time = $row["registration_closing_date_time"];
        $maximum_slot = $row["maximum_slot"];
    }
    // echo $_SESSION["user_Id"];
?>

<div class="main-panel">
    <div class="content-wrapper">
        <!-- Welcome Section Start -->
        <?php include_once("../layouts/events/eventDetailsHeader.php");?>
        <!-- Welcome Section End -->
        
        <h2> <?=$eventTitle?></h2>
        <p><?=$description?></p>

        <!-- Events Card View Start -->
        <!--<?php include_once("../layouts/events/eventDetailCard.php");?>-->
        <!-- Events Card View End -->
        
        
        
        
    </div>
    <!-- content-wrapper ends -->


    <!-- Footer Section Start -->
    <?php require_once("../widgets/footer.php");?>
    <!-- Footer Section End -->

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>