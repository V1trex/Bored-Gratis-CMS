<?php 

	nav('HOMEPAGE,ARTICLES,CONTACTS,REGISTER,LOGIN');
	
	contentStart();
	startLeft();
	if(isset($_SESSION['user'])) {
		opentable("Register","You already Loged In");
	} else {
		opentable("LogIn","
		<span class = 'error'>".$error."</span>
		<form action = '' method = 'post'>
			<label>Username : <input type = 'text' name = 'username' placeholder = 'Username' Required/></label>
			<label>Password : <input type = 'password' name = 'password' placeholder = '**********' Required/></label>
			<input type = 'submit' class = 'submit' name = 'submit' value = 'LOG IN'/>
			
		</form>
		");
	}
	closeLeft();
	
	startRight();
		openside("Test panel",'Nisi commodo bresaola, leberkas venison eiusmod bacon occaecat laboretail corned beef Capicola nisi flank sed.
				 when an unknown printer took a galley of type
				 scrambled it to make a type specimen book.
				 scrambled it to make a type specimen book.
				 scrambled it to make a type specimen book.
				 but also the leap into electronic typesetting');
	openside("Test panel",'Nisi commodo bresaola, leberkas venison eiusmod bacon occaecat laboretail corned beef Capicola nisi flank sed.
				 when an unknown printer took a galley of type
				 scrambled it to make a type specimen book.
				 scrambled it to make a type specimen book.
				 scrambled it to make a type specimen book.
				 but also the leap into electronic typesetting');
	openside("Test panel",'Nisi commodo bresaola, leberkas venison eiusmod bacon occaecat laboretail corned beef Capicola nisi flank sed.
				 when an unknown printer took a galley of type
				 scrambled it to make a type specimen book.
				 scrambled it to make a type specimen book.
				 scrambled it to make a type specimen book.
				 but also the leap into electronic typesetting');
	openside("Test panel",'Nisi commodo bresaola, leberkas venison eiusmod bacon occaecat laboretail corned beef Capicola nisi flank sed.
				 when an unknown printer took a galley of type
				 scrambled it to make a type specimen book.
				 scrambled it to make a type specimen book.
				 scrambled it to make a type specimen book.
				 but also the leap into electronic typesetting');

	closeRight();
	
	contentClose();
?>
