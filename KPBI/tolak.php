<?php
include "connect.php";

$id = $_GET["id"];

$sql = "UPDATE berkas SET status='Tolak' WHERE id='$id'";
$result = $con->query($sql);

if ($result)
 header("Location: berkas_boss.php");