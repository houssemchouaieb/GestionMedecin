<?php
	require_once 'DbOperations.php';

	$response =array();


		if (isset($_POST['email'])and isset($_POST['pass'])){

			$db =new DbOperations();
			$result=$db->userLogin(
				$_POST['email'],
				$_POST['pass']);
			if($result==1){
				$response['error']=false;
				$response['message']="User connected successfully";
			}
			else if($result==0){
				$response['error']=true;
				$response['message']="Username or password incorrect";
			}
		}else {
			$response['error']=true;
			$response['message']="Required fields are missing";
		}

if($response['error']){
	header('Location: index.php'); 
}
else{
	header('Location: profile.html'); 
}
