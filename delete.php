<?php
  
  require_once 'DbOperations.php';

  $response =array();

  if($_GET['type']=="patient"){
    $db =new DbOperations();
      $result=$db-> deletePatient(
        $_GET['id']
      );
    

    header('Location: patients.php'); 
  }
  else if($_GET['type']=="rdv"){
    $db =new DbOperations();
      $result=$db-> deleteRdv(
        $_GET['id']
      );
      

    header('Location: appointments.php'); 
  }

      