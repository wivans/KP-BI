<?php
include "connect.php";

$id_users = $_POST["id_users"];
$password_users = $_POST["password_users"];

$sql = " SELECT * FROM users WHERE id_users = '$id_users' AND password_users = '$password_users'";
$result = $con->query($sql);

if ($result->num_rows==0)
 header("Location: login.php?flag=wrongpasswordandusername	");
else
{
	

	session_start();
	$_SESSION['user'] = $id_users;
	if ($id_users == 'pkwt'){
	      header("Location: index.php");
	    }
	    elseif ($id_users == 'dnc'){
	      header('Location: boss.php');
	    }
}