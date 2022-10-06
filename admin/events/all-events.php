<?php
    include_once("../header.php")?>
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
                  <h3 class="font-weight-bold">Welcome <?php echo $row["name"]?></h3>
                  <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
                </div>
                
              </div>
            </div>
          </div>
          <div class="row mb-5">
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body">
                    <p class="mb-4">Total Events</p>
                    <p class="fs-30 mb-2"><?= $eventResult->num_rows;?></p>
                    <!-- <p>10.00% (30 days)</p> -->
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <p class="mb-4">Total Users</p>
                    <p class="fs-30 mb-2"><?= $userResult->num_rows;?></p>
                    <!-- <p>22.00% (30 days)</p> -->
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Participants</p>
                      <p class="fs-30 mb-2"><?= $participantsResult->num_rows;?></p>
                      <!-- <p>2.00% (30 days)</p> -->
                    </div>
                  </div>
                </div>
                
            
           
          </div>
          
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title">All Events List</h4>
                      <p class="card-description">
                      click on event Id to Update
                      </p>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex justify-content-end">
                        <div class="p-2 bd-highlight">
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
                            Id
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Venue
                          </th>
                          <th>
                            Category
                          </th>
                          <th>
                            Organized By
                          </th>
                          <th>
                            Start Date Time
                          </th>
                          <th>
                            End Date Time
                          </th>
                          <th>
                            Registration Start Date
                          </th>
                          <th>
                            Registration End Date
                          </th>
                          <th>
                            Total Participants
                          </th>
                          <th>
                            Total Attendese
                          </th>
                          <th>
                            Entry Fee
                          </th>
                          <th>
                            Maximum Slot
                          </th>
                          <th>
                            Created By
                          </th>
                          <th>
                            Status
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                        
                          <?php
                            if($eventResult->num_rows){
                              // print_r($result);
                              while($row = $eventResult->fetch_assoc()){
                                echo sprintf('<tr><td> <a class="dropdown-item" href="%s">%s</a></td>', $baseUrl."events/add-event.php?eventId=".$row["event_id"], $row["event_id"]);
                                echo sprintf("<td> %s </td>",$row["name"]);
                                echo sprintf("<td> %s </td>",(strlen($row["description"]) < 100)?$row["description"]:substr($row["description"], 0 , 30).'...');
                                echo sprintf("<td> %s </td>",$row["venue"]);
                                echo sprintf("<td> %s </td>",$row["category"]);
                                echo sprintf("<td> %s </td>",$row["organized_by"]);
                                echo sprintf("<td> %s </td>",$row["start_date_time"]);
                                echo sprintf("<td> %s </td>",$row["end_date_time"]);
                                echo sprintf("<td> %s </td>",$row["registration_starting_date_time"]);
                                echo sprintf("<td> %s </td>",$row["registration_closing_date_time"]);
                                $eventId = $row["event_id"];
                                $totalParticipants = $conn->query("SELECT COUNT('tp') AS tp FROM `participants` WHERE event_id = '$eventId';");
                                $tp = $totalParticipants->fetch_assoc();
                                echo sprintf("<td> %s </td>",$tp['tp']);
                                $attendense = $conn->query("SELECT COUNT('ta') AS ta FROM `attendance` WHERE event_id = '$eventId'");
                                $ta = $attendense->fetch_assoc();
                                echo sprintf("<td> %s </td>",$ta['ta']);



                                echo sprintf("<td> %s </td>",$row["entry_fee"]);
                                echo sprintf("<td> %s </td>",$row["maximum_slot"]);
                                $id =$row["created_by"];
                                $userDetails = $conn->query("select name from admin where id = '$id'");
                                $createdBy = $userDetails->fetch_assoc();
                                echo sprintf("<td> %s </td>",$createdBy['name']);
                                echo sprintf("<td> %s </td></tr>",$row["status"]);                               
                                
                              }
                              
                            }
                          ?>
                          
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include_once("../footer.php")?>
        
