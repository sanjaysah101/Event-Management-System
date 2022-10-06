<?php 
    include_once("../header.php");
    $errorMessage = isset($_GET['error'])?$_GET['error']:"";
    $successMessage = isset($_GET['success'])?$_GET['success']:"";

    $userId = isset($_GET['userId'])?$_GET['userId']:"";
    if($userId != ""){
      $userQuery = "Select * from users where id = '$userId'";
      $getUserResult = $conn->query($userQuery);
      if($getUserResult->num_rows){
        $userValue = $getUserResult->fetch_assoc();        
      };    
    }
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
            
          

          <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add User</h4>

                        <?php 
                        if($errorMessage != ""){
                            echo sprintf('<div class="alert alert-danger" role="alert">%s</div>', $errorMessage);
                        } if($successMessage != ""){
                            echo sprintf('<div class="alert alert-success" role="alert">%s</div>', $successMessage);
                        }       
                        // echo $userValue["full_name"];
                    ?>
                        <form class="form-sample" action="<?= $baseUrl.'validate-add-edit-user.php' ?>" method="post">
                            <p class="card-description">
                                Add new user
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" id="Id" name="Id" value="<?= isset($userValue["id"]) ?$userValue["id"]:"" ?>">
                                            <input type="text" class="form-control" name="fullname" value="<?= isset($userValue["full_name"]) ?$userValue["full_name"]:"" ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email Id </label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" value="<?= isset($userValue["email"])?$userValue["email"]:"" ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Mobile Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="mobileNumber" value="<?= isset($userValue["mobile_number"])?$userValue["mobile_number"]:"" ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">WhatsApp Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="whatsAppNumber" value="<?= isset($userValue["whatsapp_number"])?$userValue["whatsapp_number"]:"" ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Organization Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="organizationName" value="<?= isset($userValue["organization_name"])?$userValue["organization_name"]:"" ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Organization Location</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="organizationLocation" value="<?= isset($userValue["organization_location"])?$userValue["organization_location"]:"" ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="address" value="<?= isset($userValue["address"])?$userValue["address"]:"" ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Postal Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="postalCode" value="<?= isset($userValue["postal_code"])?$userValue["postal_code"]:"" ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">State</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="state" value="<?= isset($userValue["state"])?$userValue["state"]:"" ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="country" value="<?= isset($userValue["country"])?$userValue["country"]:"" ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
          </div>
        </div>
        
          
        <?php include_once("../footer.php")?>
        
