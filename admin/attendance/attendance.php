<?php
    include_once("../header.php");
    $getEventId = isset($_GET["eventId"])?$_GET["eventId"]:"";
                            echo $getEventId."ds";
    
?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include_once("../sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Check Attendance</h3>
                  <h6 class="font-weight-normal mb-0">Plese Select event from drop down list</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Select Event 
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    <?php
                        $selectEventQuery = "select event_id, name from events;";
                        $selectEventQueryResult = $conn->query($selectEventQuery);
                        // print_r($selectEventQueryResult);
                        if($selectEventQueryResult->num_rows){
                            while($row = $selectEventQueryResult->fetch_assoc()){
                                // echo sprintf('<option value="%s">%s</option>',$row["event_id"], $row["name"]);
                                echo sprintf('<a class="dropdown-item" href="?eventId=%s">%s</a>',$row["event_id"], $row["name"]);
                            }
                        }

                        ?>
                      <!-- <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a> -->
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>

        <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <h4 class="card-title">Attendance table</h4>

                    </div>
                    <div class="col-md-6">
                      <div class="d-flex justify-content-end">
                        <div class="p-2 bd-highlight">
                            
                          <!-- <button onclick="ExportToExcel('xlsx')" class="btn btn-primary btn-icon-text"><i class="ti-download btn-icon-prepend"></i>Export table to excel</button> -->
                          <button onclick="ExportToExcel('xlsx')" class="btn btn-primary btn-icon-text"><i class="ti-download btn-icon-prepend"></i>Export table to excel</button>
                          
                        </div>
                      </div>                      
                    </div>
                  </div>
                  
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="tbl_exporttable_to_xls">
                      <thead>
                        <tr>
                          <th>
                            UserID
                          </th>
                          <th>
                            Full Name
                          </th>
                          <th>
                            Email ID 
                          </th>
                          <th>
                            Mobile No
                          </th>
                          <th>
                            WhatsApp No
                          </th>
                          <th>
                            Address
                          </th>
                          <th>
                            State
                          </th>
                          <th>
                            Country
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                            // echo $_GET["?eventId"];
                            $attendanceQuery = "SELECT participant_id FROM `attendance` WHERE event_id = '$getEventId';";
                            // echo $attendanceQuery;
                            $attendanceResult = $conn->query($attendanceQuery);

                            if($attendanceResult->num_rows){
                              // print_r($result);
                              while($row = $attendanceResult->fetch_assoc()){
                                $userId = $row['participant_id'];
                                // echo $userId;
                                $getUserQuery = "SELECT * FROM users WHERE id='$userId'";
                                $getUserQueryResult = $conn->query($getUserQuery);
                                if($getUserQueryResult->num_rows){
                                    while($userList = $getUserQueryResult->fetch_assoc()){
                                        // echo "hi";
                                        echo sprintf('<tr><td> %s</td>', $userList["id"]);

                                        echo sprintf("<td> %s </td>",$userList["full_name"]);
                                        echo sprintf("<td> %s </td>",$userList["email"]);
                                        echo sprintf("<td> %s </td>",$userList["mobile_number"]);
                                        echo sprintf("<td> %s </td>",$userList["whatsapp_number"]);
                                        echo sprintf("<td> %s </td>",$userList["address"]);
                                        echo sprintf("<td> %s </td>",$userList["state"]);
                                        echo sprintf('<td> %s</td></tr>', $userList["country"]);
                                        // echo "<PRE>";
                                        // print_r($row);
                                    }
                                }
                                // echo sprintf("<td> %s </td>",(strlen($row["description"]) < 100)?$row["description"]:substr($row["description"], 0 , 30).'...');
                                // echo sprintf("<td> %s </td>",$row["venue"]);
                                // echo sprintf("<td> %s </td>",$row["category"]);
                                // echo sprintf("<td> %s </td>",$row["organized_by"]);
                                // echo sprintf("<td> %s </td>",$row["start_date_time"]);
                                // echo sprintf("<td> %s </td>",$row["end_date_time"]);
                                // echo sprintf("<td> %s </td>",$row["registration_starting_date_time"]);
                                // echo sprintf("<td> %s </td>",$row["registration_closing_date_time"]);
                                // $eventId = $row["event_id"];
                                // $totalParticipants = $conn->query("SELECT COUNT('tp') AS tp FROM `participants` WHERE event_id = '$eventId';");
                                // $tp = $totalParticipants->fetch_assoc();
                                // echo sprintf("<td> %s </td>",$tp['tp']);
                                // $attendense = $conn->query("SELECT COUNT('ta') AS ta FROM `attendance` WHERE event_id = '$eventId'");
                                // $ta = $attendense->fetch_assoc();
                                // echo sprintf("<td> %s </td>",$ta['ta']);



                                // echo sprintf("<td> %s </td>",$row["entry_fee"]);
                                // echo sprintf("<td> %s </td>",$row["maximum_slot"]);
                                // $id =$row["created_by"];
                                // $userDetails = $conn->query("select name from admin where id = '$id'");
                                // $createdBy = $userDetails->fetch_assoc();
                                // echo sprintf("<td> %s </td>",$createdBy['name']);
                                // echo sprintf("<td> %s </td></tr>",$row["status"]);                               
                                
                              }
                              
                            }
                          ?>
                        <!-- <tr class="table-info">
                          <td>
                            1
                          </td>
                          <td>
                            Bibek Sah
                          </td>
                          <td>
                            rajbibek81@gmail.com
                          </td>
                          <td>
                            9031218128
                          </td>
                          <td>
                            9031218128
                          </td>
                          <td>
                            RK University, Hostel
                          </td>
                          <td>
                            Gujarat
                          </td>
                          <td>
                            India
                          </td>
                        </tr> -->
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          
          
            
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include_once("../footer.php")?>
        
