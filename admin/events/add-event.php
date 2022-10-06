<?php 
    include_once("../header.php");
    $errorMessage = isset($_GET['error'])?$_GET['error']:"";
    $successMessage = isset($_GET['success'])?$_GET['success']:"";
    $eventId = isset($_GET['eventId'])?$_GET['eventId']:"";
    $title = "Add Event";
    $cardDescription = "Add New event";
    $buttonText = "Save Event";

    if($eventId != ""){
      $eventQuery = "Select * from events where event_id = '$eventId'";
      $getEventResult = $conn->query($eventQuery);
      if($getEventResult->num_rows){
        $eventValue = $getEventResult->fetch_assoc();        
      } 
      $title = "Edit Event";
      $cardDescription = "Edit New event";
      $buttonText = "Update Event";
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
                <h4 class="card-title"><?= $title ?></h4>
                <?php 
                        if($errorMessage != ""){
                            echo sprintf('<div class="alert alert-danger" role="alert">%s</div>', $errorMessage);
                        } if($successMessage != ""){
                            echo sprintf('<div class="alert alert-success" role="alert">%s</div>', $successMessage);
                        }                          
                        // print_r($getEventRow["id"]);
                        
                    ?>
                <form class="form-sample" action="<?= $baseUrl.'validate-add-edit-event.php' ?>" method="post">
                  <p class="card-description">
                    <?= $cardDescription?>
                  </p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Event id</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="eventId" value="<?= isset($eventValue["event_id"])?$eventValue["event_id"]:"" ?>" required <?php echo isset($_GET['eventId'])?"readonly":""?>/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Event Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="eventName" value="<?= isset($eventValue["name"])?$eventValue["name"]:"" ?>" required/>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="category" value="<?= isset($eventValue["category"])?$eventValue["category"]:"" ?>" required/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Organized By</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="organized_by" value="<?= isset($eventValue["organized_by"])?$eventValue["organized_by"]:"" ?>" required/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Event Registration Start Date</label>
                        <div class="col-sm-9">
                          <input type="datetime-local" class="form-control" name="event_Reg_start_date" value="<?= isset($eventValue["registration_starting_date_time"])?$eventValue["registration_starting_date_time"]:"" ?>" required/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Event Registration End Date</label>
                        <div class="col-sm-9">
                          <input type="datetime-local" class="form-control" name="event_Reg_end_date" value="<?= isset($eventValue["registration_closing_date_time"])?$eventValue["registration_closing_date_time"]:"" ?>" required/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Event Start Date Time</label>
                        <div class="col-sm-9">
                          <input type="datetime-local" class="form-control" name="event_start_date" value="<?= isset($eventValue["start_date_time"])?$eventValue["start_date_time"]:"" ?>" required/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Event End Date Time</label>
                        <div class="col-sm-9">
                          <input type="datetime-local" class="form-control" name="event_end_date" value="<?= isset($eventValue["end_date_time"])?$eventValue["end_date_time"]:"" ?>" required/>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Entry Fee</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="entryFee" value="<?= isset($eventValue["entry_fee"])?$eventValue["entry_fee"]:"" ?>" required/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Max Slot</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="maxSlot" value="<?= isset($eventValue["maximum_slot"])?$eventValue["maximum_slot"]:"" ?>" required/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="status">
                            <option value="live">Live</option>
                            <option value="upcomming">Upcomming</option>
                            <option value="live">Finished</option>
                            <option value="planning">Planning</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Venue</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="venue" value="<?= isset($eventValue["venue"])?$eventValue["venue"]:"" ?>" required/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                          <label for="exampleTextarea1">Description</label>
                          <textarea class="form-control" id="exampleTextarea1" name="description" rows="10"><?= isset($eventValue["description"])?$eventValue["description"]:"" ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="mt-5 text-center">
                      <button type="submit" class="btn btn-primary mb-2"><?=$buttonText?></button>
                  </div>
                  
                  
                </form>
              </div>
            </div>
          </div>
            
          </div>
        </div>
        
          
        <?php include_once("../footer.php")?>
        
