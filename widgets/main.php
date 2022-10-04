<div class="main-panel">
    <div class="content-wrapper">
        <!-- Welcome Section Start -->
        <?php include_once("layouts/welcomeHeader.php");?>
        <!-- Welcome Section End -->
        
        
    </div>
    <!-- content-wrapper ends -->

    <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Event Details</h4>
                    <!-- <p class="card-description">
                        Add class <code>.table-{color}</code>
                        </p> -->
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Event Name
                                    </th>
                                    <th>
                                        Reg. Start Date & Time
                                    </th>
                                    <th>
                                        Reg. Close Date & Time
                                    </th>
                                    <th>
                                        Event Start Date & Time
                                    </th>
                                    <th>
                                        Event End Date & Time
                                    </th>
                                    <th>
                                        Current Time
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

$sql = "select * from events ";
$eventTitle = isset($row["name"]) ? $row["name"] : "";
$description = isset($row["description"]) ? $row["description"] : "";

$eventResult = $conn->query($sql);
$currentDateTime = new DateTime();
$currentDateTime =  $currentDateTime->format('Y-m-d H:i:s');
// echo $sql;
// print_r($result);
if($eventResult->num_rows){
    // echo "hi";
    while($row = $eventResult->fetch_assoc()){
        
        echo sprintf('<tr><td>%s</td>', $row["name"]);
        echo sprintf("<td> %s </td>",$row["registration_starting_date_time"]);
        echo sprintf("<td> %s </td>",$row["registration_closing_date_time"]);
        echo sprintf("<td> %s </td>",$row["start_date_time"]);
        echo sprintf("<td> %s </td>",$row["end_date_time"]);
        echo sprintf("<td> %s </td></tr>",$currentDateTime);                               

    }
    
    // echo "<pre>";
    // print_r($row);
    // echo $row["start_date_time"];
}


                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Footer Section Start -->
    <?php require_once("widgets/footer.php");?>
    <!-- Footer Section End -->

</div>