<?php 
	require_once CORE.'mysql.php';
	$nav = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM nav"));
		nav($nav['links']);
	contentStart();
	startLeft();
		$table = mysqli_query($conn,"SELECT * FROM tables WHERE id > 0");
			foreach($table as $row) {
				if($row['module']!= NULL) {
					require_once MODULES.$row['module'].'.model.php';
				} else{
					opentable($row['title'],$row['content']);
				}
			}
			
		$news = mysqli_query($conn,"SELECT * FROM news ORDER BY id DESC");
			foreach($news as $row) {
				opentable($row['title'].' Posted '.$row['date'],$row['content'].' <br />Posteb By : '.$row['author']);
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

