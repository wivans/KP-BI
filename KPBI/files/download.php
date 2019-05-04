<?php
include "../connect.php";

$id = $_GET["id"];

$sql = mysqli_query($con,"SELECT * FROM berkas WHERE id='$id'");
if(mysqli_num_rows($sql)==1){
	$no = 1;
	while($data = mysqli_fetch_assoc($sql)){
		$file_name = $data['location'];
		header("Content-Disposition: attachment; filename=\"$file_name\"");
		$no++; 
	}
}