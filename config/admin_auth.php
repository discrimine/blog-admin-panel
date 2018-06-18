<?php
	session_start();
	header("Location: ../admin.php");
	if (isset($_POST["ds_submit"]) && $_POST["ds_login"] != "" && $_POST["ds_pass"] != ""){
			if( $_POST["ds_login"] != "admin"){
				echo "<script> $('.ds_auth_error').text('Пользователь не найден') </script>";
			} else if( $_POST["ds_pass"] != "d6d1r5Tc"){
				echo "<script> $('.ds_auth_error').text('Пароль введен неверно') </script>";
			} else {
				$_SESSION["admin"] = "1";
			} 
		}