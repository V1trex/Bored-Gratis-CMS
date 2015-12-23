<?php 

	require_once CORE.'mysql.php';
	$nav = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM nav"));
		nav($nav['links']);
	contentStart();
	startLeft();
	if(isset($_SESSION['user'])) {
		opentable("Register","You already Loged In");
	} else {
		opentable("Register","
		<span class = 'error'>".$error."</span>
		<form action = '' method = 'post'>
			<label>Username : <input type = 'text' name = 'username' placeholder = 'Username' Required/></label>
			<label>Password : <input type = 'password' name = 'password' placeholder = '**********' Required/></label>
			<label>Confirm Password : <input type = 'password' name = 'passwordC' placeholder = '**********' Required/></label>
			<label>Email : <input type = 'text' name = 'email' placeholder = 'example@email.com' Required/></label>
			<input type = 'submit' class = 'submit' name = 'submit' value = 'register' Required/>
			
		</form>
		");
	}
	closeLeft();
	
	startRight();

		$panel = mysqli_query($conn,"SELECT * FROM panels WHERE id > 0");
			foreach($panel as $row) {
				if($row['module']!= NULL) {
					require_once MODULES.$row['module'].'.model.php';
				} else{
					openside($row['title'],$row['content']);
				}
			}


	closeRight();
	contentClose();
?>

