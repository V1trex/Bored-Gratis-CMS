<?php 

	$error = "";
	
		if(isset($_POST['submit'])) {
			require_once CORE.'mysql.php';
			
			
			$username = mysqli_real_escape_string($conn,$_POST['username']);
			$password = mysqli_real_escape_string($conn,$_POST['password']);
			$passwordC = mysqli_real_escape_string($conn,$_POST['passwordC']);
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			
			$checkUser = mysqli_num_rows(mysqli_query($conn,"SELECT username FROM users WHERE username = '".$username."'"));
			$checkEmail = mysqli_num_rows(mysqli_query($conn,"SELECT email FROM users WHERE email = '".$email."'"));
			
			if($checkUser > 0) {
				$error = "Username already taken.";
			} else {
				if($password === $passwordC) {
					if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
						  $error = "Invalid email format."; 
						} else {
							if($checkEmail > 0) {
								$error = "Email already taken.";
							} else {
								mysqli_query($conn,"
								INSERT INTO `users` (`id`, `username`, `password`, `email`, `vip`, `group`, `joined`) 
								VALUES (NULL, '".$username."', '".SHA1($password)."', '".$email."', '', '', '".date("Y-m-d , H:m:s")."');");
								$error = "User , $username created , now you can log In";
							}
						}
				} else {
					$error = "Passwords don't match.";
				}
			}
		
		} 
