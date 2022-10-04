<?php 
    require_once("myfunctions.php");
    require_once("App/conn.php");
    $eventList = $conn->query("SELECT name,event_id from events");
    
    
    // $sql = "select event_id,name from events";
    // $result = $conn->query($sql);
    $errorMessage = isset($_GET['error'])?$_GET['error']:"";
    $successMessage = isset($_GET['success'])?$_GET['success']:"";
    $msg = isset($_GET['msg'])?$_GET['msg']:"";
    // echo $msg;
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
  <title>Event Attendance</title>

  <meta name="theme-color" content="#141318"?>
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
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo $baseUrl.'images/logo.png' ?>" alt="logo">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <h4>Hello! let's Attend the Event</h4>
                  <h6 class="font-weight-light"><?= $subTitel ?></h6>
                </div>
                <div class="col-md-6">
                <!-- <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Submit</button> -->
                <a href="register.php" class="link-light">Register in the event</a>
                <!-- <a href='<?= $self ?>' class="auth-link btn-primary text-black"><?php echo $alternativeOpt ?></a> -->
                </div>
              </div>
                <?php 
                    if($errorMessage != ""){
                        echo sprintf('<div class="alert alert-danger" role="alert">%s %s</div>', $errorMessage, $msg);
                    }                        
                    else if($successMessage != ""){
                        echo sprintf('<div class="alert alert-success" role="alert">%s %s</div>', $successMessage, $msg);
                    }                        
                    else if($msg != ""){
                        echo sprintf('<div class="alert alert-info" role="alert">%s %s</div>', $successMessage, $msg);
                    }                        
                ?>
              <form class="pt-3" action="<?php echo $baseUrl.'App/Model/addParticipant.php' ?>" method="post">
                <div class="form-group">
                    <select class="form-control" name="eventId">
                        <?php
                            if($eventList->num_rows){
                                while($row = $eventList->fetch_assoc()){
                                    echo sprintf('<option value="%s">%s</option>',$row["event_id"], $row["name"]);
                                }
                            }

                        ?>
                    </select>
                </div>
                <div class="form-group">
                  <input type="<?= $inputType ?>" name="<?= $name?>" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="<?= $plaseholder ?>" required>
                </div>
                <div class="mt-3">
                  
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Submit</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <!-- <?php  ?> -->

                  <a href='<?= $self ?>' class="auth-link text-black"><?php echo $alternativeOpt ?></a>
                </div>
                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div> -->
                <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <!-- <script src="js/off-canvas.js"></script> -->
  <!-- <script src="js/hoverable-collapse.js"></script> -->
  <script src="js/template.js"></script>
  <!-- <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script> -->
  <!-- endinject -->
</body>

</html>
