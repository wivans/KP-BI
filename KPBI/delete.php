<?php
include "connect.php";

$id = $_GET["id"];

$sql = "DELETE FROM berkas WHERE id='$id'";
$result = $con->query($sql);

if ($result)
 header("Location: berkas_boss.php");