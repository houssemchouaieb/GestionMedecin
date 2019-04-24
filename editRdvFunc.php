<?php
  
  require_once 'DbOperations.php';

  $response =array();

  if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['name']) and isset($_POST['email'])and isset($_POST['date']) and isset($_POST['trait'])){

      $db =new DbOperations();
      $result=$db-> editRdv(
        $_GET['id'],
        $_POST['name'],
        $_POST['email'],
        $_POST['date'],
        $_POST['trait']
      );
      if($result==1){
        $response['error']=false;
        $response['message']="Rdv modified successfully ";
      }
      else if($result==2){
        $response['error']=true;
        $response['message']="Some error occurred please try again";
      }
      else if($result==3){
        $response['error']=true;
        $response['message']="fields empty";
      }
    }
    else{
      $response['error']=true;
      $response['message']="Required fields are missing";
    }


  }
  else{
    $response['error']=true;
    $resopnse['message']="Invalid Request";
  } 

header('Location: appointments.php'); 
