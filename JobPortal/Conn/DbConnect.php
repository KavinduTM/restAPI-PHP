<?php 
	


	class DbConnect
	{
	
		private $con;
		
	 
	
		function __construct()
		{
	 
		}
	 
		
		function connect()
		{
			
			include_once dirname(__FILE__) . '/Constants.php';
	 
			
			$this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	 
			
			if (mysqli_connect_errno()) {
				//echo "Your db is not connected: " . mysqli_connect_error();
				$this->con = new mysqli(DB_HOST1, DB_USER1, DB_PASS1, DB_NAME1);
				
			}
	 
		
			return $this->con;
		}
	 
	}