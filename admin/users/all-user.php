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
                  <!--<h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>-->
                </div>
                <!--<div class="col-12 col-xl-4">-->
                <!-- <div class="justify-content-end d-flex">-->
                <!--  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">-->
                <!--    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">-->
                <!--     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)-->
                <!--    </button>-->
                <!--    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">-->
                <!--      <a class="dropdown-item" href="#">January - March</a>-->
                <!--      <a class="dropdown-item" href="#">March - June</a>-->
                <!--      <a class="dropdown-item" href="#">June - August</a>-->
                <!--      <a class="dropdown-item" href="#">August - November</a>-->
                <!--    </div>-->
                <!--  </div>-->
                <!-- </div>-->
                <!--</div>-->
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
                <!--<div class="col-md-6 stretch-card transparent">-->
                <!--  <div class="card card-light-danger">-->
                <!--    <div class="card-body">-->
                <!--      <p class="mb-4">Number of Clients</p>-->
                <!--      <p class="fs-30 mb-2">47033</p>-->
                      <!-- <p>0.22% (30 days)</p> -->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
            
           
          </div>
          
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title">All Users List</h4>
                      <p class="card-description">
                        click on user's Id to Update
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
                    <table class="table table-bordered" id="tbl_exporttable_to_xls" data-excel-name="Users Table">
                      <thead>
                        <tr>
                          <th>
                            Id
                          </th>
                          <th>
                            Full Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Gender
                          </th>
                          <th>
                            Mobile Number
                          </th>
                          <th>
                            whatsapp_number
                        </th>
                          <th>
                            Address
                          </th>
                          <th>
                            Postal Code
                          </th>
                          <th>
                            State
                          </th>
                          <th>
                            India
                          </th>
                          <th>
                            Organization Name
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          <?php
                            if($userResult->num_rows){
                              // print_r($result);
                              while($row = $userResult->fetch_assoc()){
                                // echo sprintf("<tr><td> %s </td>",$row["id"]);
                                echo sprintf('<tr><td> <a class="dropdown-item" href="%s">%s</a></td>', $baseUrl."users/add-user.php?userId=".$row["id"], $row["id"]);
                                echo sprintf("<td> %s </td>",$row["full_name"]);
                                echo sprintf("<td> %s </td>",$row["email"]);
                                echo sprintf("<td> %s </td>",$row["gender"]);
                                echo sprintf("<td> %s </td>",$row["mobile_number"]);
                                echo sprintf("<td> %s </td>",$row["whatsapp_number"]);
                                echo sprintf("<td> %s </td>",$row["address"]);
                                echo sprintf("<td> %s </td>",$row["postal_code"]);
                                echo sprintf("<td> %s </td>",$row["state"]);
                                echo sprintf("<td> %s </td>",$row["country"]);
                                echo sprintf("<td> %s </td>",$row["organization_name"]);
                                // echo sprintf("<td> %s </td>",$row["maximum_slot"]);
                                // $id =$row["created_by"];
                                // $userDetails = $conn->query("select name from admin where id = '$id'");
                                // $createdBy = $userDetails->fetch_assoc();
                                // echo sprintf("<td> %s </td>",$createdBy['name']);
                                // echo sprintf("<td> %s </td></tr>",$row["status"]);                               
                                
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
        
