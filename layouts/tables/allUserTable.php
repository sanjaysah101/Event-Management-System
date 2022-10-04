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