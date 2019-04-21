<?php
	
	require_once 'DbOperations.php';

	$response =array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['name']) and isset($_POST['email'])and isset($_POST['date']) and isset($_POST['message'])){

			$db =new DbOperations();
			$result=$db-> addRdv(
				$_POST['name'],
				$_POST['email'],
				$_POST['date'],
				$_POST['message']
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

	header('Location: AddRdv.html'); 
