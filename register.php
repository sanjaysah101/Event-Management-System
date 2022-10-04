<?php 
    require_once("myfunctions.php");
    require_once("App/conn.php");
    $eventList = $conn->query("SELECT name,event_id from events");
    
    
    // $sql = "select event_id,name from events";
    // $result = $conn->query($sql);
    $errorMessage = isset($_GET['error'])?$_GET['error']:"";
    $successMessage = isset($_GET['success'])?$_GET['success']:"";
    $msg = isset($_GET['msg'])?$_GET['msg']:"";
    echo $msg;
    $isphoneNumber = isset($_GET['phone'])?$_GET['phone']:"";

    $alternativeOpt = "Enter phone number";
    $url = $_SERVER['PHP_SELF'];
    $self = $url."?phone=true";
    $plaseholder = "Registered Email";
    $inputType = "email";
    $name = "userId";
    $subTitel = "Enter Your email to continue";
    
    if($isphoneNumber){
      $alternativeOpt = "Enter email address";
      $self = $url;
      $plaseholder = "Registered Phone Number";
      $inputType = "tell";
      $name = "userNumber";
      $subTitel = "Enter Your phone to continue";
    }
    $baseUrl = getBaseUrl();
    // echo $baseUrl;/
    
    // print_r($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register User</title>

  <!-- <meta name="theme-color" content="#141318"?> -->
  <!-- plugins:css -->
  <!-- <link rel="stylesheet" href="vendors/feather/feather.css"> -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <!-- <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css"> -->
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
</head>

<body>
    

    <div class="content-wrapper">
        <div class="row">
      
            

            <div class="col-12 grid-margin">
                <div class="card">

                
                    <div class="card-body">
                    <h4 class="card-title">New Here! </h4>

                    
                    <?php 
                        if($errorMessage != "" || $msg !== ""){
                            echo sprintf('<div class="alert alert-danger" role="alert">%s %s</div>', $errorMessage, $msg);
                        }                        
                        else if($successMessage != "" || $msg !== ""){
                            echo sprintf('<div class="alert alert-success" role="alert">%s %s</div>', $successMessage, $msg);
                            header("location: attendance.php");
                        }                        
        
                    // echo $userValue["full_name"];
                    ?>
                    <form class="form-sample" action="<?php echo $baseUrl.'App/Model/registerUser.php' ?>" method="post">
                        <p class="card-description">
                            Register here.
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
                                        <input type="email" class="form-control" name="email" value="<?= isset($userValue["email"])?$userValue["email"]:"" ?>" <?php echo isset($userValue["email"])?"readonly":""?> />
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
                                        <input type="text" class="form-control" name="mobileNumber" value="<?= isset($userValue["mobile_number"])?$userValue["mobile_number"]:"" ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">WhatsApp Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="whatsAppNumber" value="<?= isset($userValue["whatsapp_number"])?$userValue["whatsapp_number"]:"" ?>"z/>
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
                                        <input type="text" class="form-control" name="country" value="<?= isset($userValue["country"])?$userValue["country"]:"" ?>" />
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

</body>

</html>
