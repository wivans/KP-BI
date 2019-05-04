<?php
	include('connect.php');
    if (isset($_POST['email']) and isset($_POST['password']))
    {
    $user = $_POST['email'];
    $pass = $_POST['password'];
}
    $query = "SELECT * FROM akun WHERE users='$user' and pass='$pass'";
    $result = mysql_query($query) or die(mysql_error($con));
    $count = mysql_num_rows($result);

    if ($count == 1)
    {
    	$_SESSION['user'] = $user;
    	if ($user == 'pkwt'){
	      header('Location: staff.php');
	    }
	    elseif ($user == 'dnc'){
	      header('Location: boss.php');
	    }
	    else{
	      echo "Data salah!";
	    }
    }
?>