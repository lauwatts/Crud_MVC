<?php 
	
	require "helpers.php";

	require "libs/Request.php";
	require "libs/Response.php";
	require "libs/Inflector.php";
	require "libs/View.php";
	require "libs/Database.php";
	require "models/Medicamentos.php";

	if ( empty($_GET['url']) )
	{
		$url = "";
	} 
	else
	{
		$url = $_GET['url'];
	}
	
	$request = new Request($url);
	$request->execute();


?>
