<?php 
    require_once("myfunctions.php");
   //  echo getBaseUrl();
    $allEventsUrl = getBaseUrl()."events/all-events.php";
    $addEventsUrl = getBaseUrl()."events/add-event.php";
    $allUserUrl = getBaseUrl()."users/all-user.php";
    $addUserUrl = getBaseUrl()."users/add-user.php";
   //  $EventsUrl = getBaseUrl()."edit/all-events.php";
   //  echo $allEventsUrl;
    
?>
<!-- Side Bar Start -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
       <li class="nav-item">
          <a class="nav-link" href="<?= getBaseUrl()?>">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
          </a>
       </li>
       <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#events" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Events</span>
          <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="events">
             <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= $allEventsUrl?>">All Event</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="/edit/category.html">Category</a></li> -->
             </ul>
          </div>
       </li>
       <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="form-elements">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="users">
             <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?= $allUserUrl?>">All User</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Edit User</a></li> -->
             </ul>
          </div>
       </li>
       <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="icon-bar-graph menu-icon"></i>
          <span class="menu-title">Charts</span>
          <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="charts">
             <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
             </ul>
          </div>
       </li>
       <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="tables">
             <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
             </ul>
          </div>
       </li>
       <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="icon-contract menu-icon"></i>
          <span class="menu-title">Icons</span>
          <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="icons">
             <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
             </ul>
          </div>
       </li>
       <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
             <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
             </ul>
          </div>
       </li>
       <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
          <i class="icon-ban menu-icon"></i>
          <span class="menu-title">Error pages</span>
          <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="error">
             <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
             </ul>
          </div>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="<?php echo getBaseUrl().'logout.php'?>">
          <i class="menu-icon fa fa-address-book"></i>
          <span class="menu-title">Logout</span>
          </a>
       </li>
    </ul>
 </nav>
 
 <!-- Sidebar End -->