<?php
$dsn = 'mysql:host=localhost;dbname=medecin';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}
$id = $_GET['id'];
$sql = 'SELECT * FROM client WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);

?>
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Patients</title>

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
                    <h1>Patients</h1>
                   </span> <a href="patients.html">List </a>|</span> <a href="AddPatient.html">Add + </a>
                </div>
            </div><br><br>
            <div class="col-lg-5 offset-lg-1 align-self-center">
                    <div class="appointment-form text-center mt-5 mt-lg-0">
                        <h3 class="mb-5">Edit Patient</h3>
                        <form  method="post" action="editPatientFunc.php?id=<?= $person->id ?>">
                            <div class="form-group">
                                <input type="text" value="<?= $person->prenom; ?>" id="prenom" name="prenom" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?= $person->nom; ?>" id="nom" name="nom" required>
                            </div>
                            <div class="form-group">
                                <input type="email" value="<?= $person->email; ?>" id="email" name="email" required> 
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?= $person->telephone; ?>" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?= $person->adresse; ?>" id="adress" name="adress" required>
                            </div>
                            <div class="form-group">
                                <textarea  cols="20" rows="7" id="spec" name="spec" ><?= $person->specification; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="template-btn" value="Edit Patient" >
                            </div>
                        </form>
                    </div>
                </div>
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
