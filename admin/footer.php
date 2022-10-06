<?php 
    require_once("myfunctions.php");
    $baseUrl = getBaseUrl();   
?>
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
       <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. Created By  <a href="https://www.linkedin.com/in/sknepali/" target="_blank">Sanjay</a> & <a href="https://www.linkedin.com/in/bibek-sah-b81b351a7/" target="_blank">Bibek</a> from 5th sem. B.Tech</span>
       <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
    </div>
 </footer>
  <!-- partial -->
  </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

    <!-- Script to downlaod table data in excel file -->   
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script> 
    <script>
      function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('UsersRecords.' + (type || 'xlsx')));
    }
    </script>


  <!-- plugins:js -->
  <script src="<?php echo $baseUrl.'vendors/js/vendor.bundle.base.js'?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo $baseUrl.'vendors/chart.js/Chart.min.js'?>"></script>
  <script src="<?php echo $baseUrl.'vendors/datatables.net/jquery.dataTables.js'?>"></script>
  <script src="<?php echo $baseUrl.'vendors/datatables.net-bs4/dataTables.bootstrap4.js'?>"></script>
  <script src="<?php echo $baseUrl.'js/dataTables.select.min.js'?>"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo $baseUrl.'js/off-canvas.js'?>"></script>
  <script src="<?php echo $baseUrl.'js/hoverable-collapse.js'?>"></script>
  <script src="<?php echo $baseUrl.'js/template.js'?>"></script>
  <script src="<?php echo $baseUrl.'js/settings.js'?>"></script>
  <script src="<?php echo $baseUrl.'js/todolist.js'?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo $baseUrl.'js/dashboard.js'?>"></script>
  <script src="<?php echo $baseUrl.'js/Chart.roundedBarCharts.js'?>"></script>
  
  <!-- End custom js for this page-->
</body>