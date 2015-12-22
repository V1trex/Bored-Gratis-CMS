<?php 
	session_start();
	ob_start();
	// lets create some defines , will be easier to link everything.
	Define("CORE","core/");
	Define("APP","app/");
	Define("PAGES","app/pages/");
	Define("CONFIGS","app/configs/");
	Define("TPL","view/pages/");
	Define("TEMPLATE","view/");
	
	// include some stuff to start CMS
	require_once CORE.'boot.class.php';
	
	// start system by creating page CLASS
		$wPage = new wPage(); 