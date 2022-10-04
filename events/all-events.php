<?php
  require_once("../myfunctions.php");
  require_once("../App/conn.php");
  require_once("../Routes/uri.php");
?>


<!-- Head Section Start -->
<?php require_once("../widgets/head.php");?>
<!-- Head Section End -->

        <!-- Top Navbar Start -->
        <?php require_once("../widgets/top-nav.php");?>
        <!-- Top navbar end -->

        <div class="container-fluid page-body-wrapper">

            <!-- Side Bar Skin Start -->
            <?php require_once("../widgets/sideBarSkin.php");?>
            <!-- Side Bar Skin End -->
            
            <!-- Right Sidebar Start -->
            <?php require_once("../widgets/rightSideBar.php");?>
            <!-- Right Side bar end -->


            <!-- Sidebar Start -->
            <?php require_once("../widgets/sidebar.php");?>
            <!-- Sidebara End -->


            <!-- Main Pamel Start -->
           <?php require_once("mainEventSection.php");?>
            <!-- main-panel ends -->
        </div>
        
<!-- End SectionStart -->
<?php require_once("../widgets/end.php");?>