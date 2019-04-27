<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Appointments</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <header class="header-area">
        <div id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="profile.html"><img src="assets/images/logo/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="profile.html">Home</a></li>
                        <li><a href="appointments.php">Appointments</a></li>
                        <li><a href="patients.php">Patients</a></li>
                        <li><a href="contact.html">Contact</a></li> 
                        <li><a href="contact.html">Statistics</a></li>                                        
                    </ul>
                </nav><!-- #nav-menu-container -->                  
                </div>
            </div>
        </div>
    </header>
   
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area other-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Appointments</h1>
                     </span> <a href="appointments.php">List </a>|</span> <a href="AddRdv.html">Add + </a>
                </div>
            </div>
            <br><br>
            



<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'medecin');
$results_per_page = 10;
$sql='SELECT * FROM rdv';
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results/$results_per_page);
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$this_page_first_result = ($page-1)*$results_per_page;
$sql='SELECT * FROM rdv LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);
?> 
<div class="card-body">
  <table class="table table-bordered" style="background:rgba(18, 21, 31,0.06);">
        <tr>
             <th style="color:rgb(30,30,30);";>Patient Name</th>
             <th style="color:rgb(30,30,30);";>Patient Email</th>
             <th style="color:rgb(30,30,30);";>Date</th>
        </tr>
    <?php while($row = mysqli_fetch_array($result)) {?>
         <tr>
               <td><?= $row['name']; ?></td>
               <td><?= $row['email']; ?></td>
               <td><?= $row['date']; ?></td>
               <td>
                   <a href="editRdv.php?id=<?= $person->id ?>" >Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <a href="detail.php?id=<?= $person->id ?>&type=rdv"  >Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <a onclick="return confirm('Are you sure you want to delete this patient?')" href="delete.php?id=<?= $person->id ?>&type=rdv" >Delete</a>
                </td>
         </tr>
    <?php }?>
  </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php for ($page=1;$page<=$number_of_pages;$page++) {

      echo '<a href="appointments.php?page=' . $page . '">' . $page . '</a> ';
      echo '&nbsp;&nbsp;&nbsp;&nbsp;';
    } ?>
</div>
        <br><br><br><br>

</div>        




    </section>
    <!-- Banner Area End -->

    <!-- Footer Area Starts -->
    <footer class="footer-area section-padding13">
        
        <div class="footer-copyright">
         
                        <span>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                    
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="assets/js/main.js"></script>



</body>
</html>
