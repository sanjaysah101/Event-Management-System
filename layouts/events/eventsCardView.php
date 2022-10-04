<div class="row mb-5">
   <?php 
      // $sql = "select event_id,name,description from events";
      $sql = "SELECT * FROM `events` ORDER BY id DESC limit 0,3;";
      $result = $conn->query($sql);
      if($result->num_rows){
          // print_r($result);
        while($row = $result->fetch_assoc())
        {
          $d = $row["description"];
          $desc = (strlen($d) < 100)?$d:substr($d, 0 , 150).'...';
          $eventCard = sprintf('
          <div class="col p-3">
              <div class="card" style="width: 18rem;">
                  <div class="card-img card-img-top">
                      
                  </div>
                  <div class="card-body">
                      <h5 class="card-title">%s</h5>
                      <p class="card-text">%s</p>
                      <a href="../events/event-details.php?eventId=%s" class="btn btn-primary">See Details</a>
                  </div>
              </div>                            
          </div>
          ',$row["name"],$desc,$row["event_id"]);
            echo $eventCard;
              
        }
      }
      ?>    
</div>