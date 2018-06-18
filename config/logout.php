<?php
	session_start();
	header("Location: ../admin.php");
	if (isset($_POST["admin_logout"]) ){
			unset($_SESSION["admin"]);
		}