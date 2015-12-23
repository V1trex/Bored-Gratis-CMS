<?php
	
	if(isset($_SESSION['user'])) {
		require_once CORE.'mysql.php';
		$fetch = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users WHERE id = '".$_SESSION['user']."'"));
		openside($fetch['username'],"
		What you would like to do? <br />
		- <a href = 'profile.php?user=".$fetch['id']."'>Check My Profile</a> <br />
		- <a href = 'index.php?url=logout'>Logout</a> <br />
		");
		
	} else {
		
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
		
		openside("Log In","
		".$error."
		<form action = '' method = 'post'>
			<label>Username : <input type = 'text' name = 'username' placeholder = 'Username' Required/></label>
			<label>Password : <input type = 'password' name = 'password' placeholder = '**********' Required/></label>
			<input type = 'submit' class = 'submit' name = 'submit' value = 'LOG IN'/>
		</form>
		");
	}