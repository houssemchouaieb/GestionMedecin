<?php
	
	require_once 'DbOperations.php';

	$response =array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['prenom']) and isset($_POST['nom'])and isset($_POST['phone'])and isset($_POST['email']) and isset($_POST['adress'])and isset($_POST['spec'])){

			$db =new DbOperations();
			$result=$db-> addPatient(
				$_POST['prenom'],
				$_POST['nom'],
				$_POST['email'],
				$_POST['adress'],
				$_POST['phone'],
				$_POST['spec']
			);
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

	
header('Location: patients.html'); 