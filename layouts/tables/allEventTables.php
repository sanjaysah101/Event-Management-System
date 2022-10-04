<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Event List</h4>
                  <p class="card-description">
                    click on event Id to Update
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
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
                            Start Date
                          </th>
                          <th>
                            End Date
                          </th>
                          <th>
                            Registration Start Date
                          </th>
                          <th>
                            Registration End Date
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
                                echo sprintf('<tr><td>%s</td>', $row["event_id"]);
                                echo sprintf("<td> %s </td>",$row["name"]);
                                echo sprintf("<td> %s </td>",(strlen($row["description"]) < 100)?$row["description"]:substr($row["description"], 0 , 30).'...');
                                echo sprintf("<td> %s </td>",$row["venue"]);
                                echo sprintf("<td> %s </td>",$row["category"]);
                                echo sprintf("<td> %s </td>",$row["organized_by"]);
                                echo sprintf("<td> %s </td>",$row["start_date_time"]);
                                echo sprintf("<td> %s </td>",$row["end_date_time"]);
                                echo sprintf("<td> %s </td>",$row["registration_starting_date_time"]);
                                echo sprintf("<td> %s </td>",$row["registration_closing_date_time"]);
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