<?php
  include('connect.php');
  $nama = $_POST["nama"];
  $pic = $_POST["pic"];
  $tanggalm = $_POST["tanggalm"];
  $tanggals = $_POST["tanggals"];
  if($_POST['upload']){
                $ffile = fopen($tmpName, 'r');
                $content = fread($fp, filesize($tmpName));
                $content = addslashes($content);
                fclose($file);

                if(!get_magic_quotes_gpc())
                {
                    $fileName = addslashes($fileName);
                }
              }

	$query = "INSERT INTO tambah_berkas
	        (namafile,pic,tanggalm,tanggals)
	        VALUES
	        ('$nama','$pic','$tanggalm','$tanggals');";


	$result = mysql_query($query);

  if($result){
    header('location: staff.php');
  }
  else{

      header('location: uploadberkas.php');
      echo "Gagal";
  }
?>