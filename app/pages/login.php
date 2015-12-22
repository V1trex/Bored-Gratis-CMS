<?php 
		
	$error = "";
	
		if(isset($_POST['submit'])) {
			require_once CORE.'mysql.php';
			
			
			$username = mysqli_real_escape_string($conn,$_POST['username']);
			$password = mysqli_real_escape_string($conn,$_POST['password']);
			
			$checkUser = mysqli_num_rows(mysqli_query($conn,"SELECT username FROM users WHERE username = '".$username."'"));
			$FetchUser = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users WHERE username = '".$username."'"));
			
			if($checkUser > 0) {
				
				if($FetchUser['password'] == SHA1($password)) {
					$error = "Logged In";
					$_SESSION['user'] = $FetchUser['id'];
					Header("Location:index.html");
					Exit();
				} else {
					$error = "Wrong password.";
				}
				
			} else {
				$error = "Wrong username.";
			}
		
		} 
	