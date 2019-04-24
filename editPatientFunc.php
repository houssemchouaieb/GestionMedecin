<?php
  
  require_once 'DbOperations.php';

  $response =array();

  if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['prenom']) and isset($_POST['email'])and isset($_POST['nom']) and isset($_POST['adress'])and isset($_POST['phone'])){

      $db =new DbOperations();
      $result=$db-> edit(
        $_GET['id'],
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $_POST['adress'],
        $_POST['phone'],
        $_POST['spec']
      );
      if($result==1){
        $response['error']=false;
        $response['message']="Patient modified successfully ";
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

header('Location: patients.php'); 
