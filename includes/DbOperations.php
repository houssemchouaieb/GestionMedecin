<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	class DbOperations{
		private $con;
		function __construct(){

			require_once dirname(__FILE__).'/DbConnect.php'; 

			$db =new DbConnect();

			$this->con=$db->connect();

		}

		public function userLogin($email,$pass){
			if($this->isBusExist($numcar)){
				if($this->isBusFree($numcar)){
					$password=md5($pass);
					$stmt=$this->con->prepare("SELECT id FROM users WHERE username=? AND password=?");
					$stmt->bind_param("ss",$username,$password);
					$stmt->execute();
					$stmt->store_result();
					if($stmt->num_rows>0){
						$this->changeBusState($numcar,TRUE);
						$this->changeUserBus($username,$numcar);
						return 1;
					}
					else{
						return 0;
					}
				}
				else{
					return 2;
				}
			}
			else{
				return 3;
			}
		}
	}	