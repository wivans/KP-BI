<?php
			include('connect.php');
				$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'vsd');

				$file_name		= $_FILES['file']['name'];
				$file_ext		= pathinfo ($file_name, PATHINFO_EXTENSION);
				$file_size		= $_FILES['file']['size'];
				$file_tmp		= $_FILES['file']['tmp_name'];
				$proses_enterprise			= $_POST['proses_enterprise'];
				$satker			= $_POST['satker'];
				$tanggal			= date("Y-m-d");
				if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 1044070){
						$open = fopen ($_FILES['file']['tmp_name'], 'r');
                        $read = fread ($open, $_FILES['file']['size']);
                        $data = addslashes ($read);
                        $location = 'files/'.$file_name;
                        move_uploaded_file($file_tmp, $location);
                        $query = "INSERT INTO berkas (nama, satker, file_ext, file_size, location, status) VALUES ('$proses_enterprise','$satker' '$file_ext', '$file_size', '$location', default)";
                        $in = mysqli_query($con, $query);
						if($in){
							echo '<div class="ok">SUCCESS: File berhasil di Upload!</div>';
						}else{
							echo '<div class="error">ERROR: Gagal upload file!</div>';
						}
					}else{
						echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
					}
				}else{
					echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
				}
			?>