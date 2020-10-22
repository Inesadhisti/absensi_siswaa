<?php
//panggil file config.php untuk menghubung ke server
include('system/config/conn.php');

if($_POST['submit']){
	//tempat menyimpan file
	$folder="system/images/"; 
	
	//tangkap data dari form
	$nama = $_POST['nama'];
	$nis = $_POST['nis'];
	$nm_kelas = $_POST['nm_kelas'];
	$jns_kel = $_POST['jns_kel'];
	$alamat = $_POST['alamat'];
	$tmpt_lahir = $_POST['tmpt_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$nama_ortu = $_POST['nama_ortu'];
	
	//menghindari duplikat nis
	$cek="SELECT nis FROM siswa WHERE nis='$nis'";
	$ada=mysql_query($cek) or die (mysql_error());
	if(mysql_num_rows($ada)>0)
	{
		echo "<script>alert ('NIS Telah Terdaftar ! Silahkan Periksa Kembali !');window.location='page.php?tambah-siswa' </script> ";
	}
	else{			
		$query = mysql_query ("INSERT INTO siswa VALUES('','$nama','$nis','$jns_kel','$tgl_lahir','$tmpt_lahir','$alamat','$nm_kelas','$nama_ortu')")
				or die (mysql_error());
		header('location:page.php?data-semua-siswa&message=insert-success');
	}
}
else if($_POST['submit-csv']){
	if ($_FILES['siswa']['size'] != 0) {
		if ($_FILES['siswa']['type'] == 'application/vnd.ms-excel') {

			$data_masuk = 0;
			$data_gagal = 0;

			if (($h = fopen($_FILES['siswa']['tmp_name'], 'r')) !== FALSE){
				while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {
					$nis = $data[0];
					$nama = $data[1];
					$jns_kel = $data[2];
					$tgl_lahir = $data[3];
					$tmpt_lahir = $data[4];
					$alamat = $data[5];
					$nm_kelas = $data[6];
					$nama_ortu = $data[7];

					if(!empty($nama) AND !empty($nis) AND !empty($jns_kel) AND !empty($nm_kelas)){	
						$cek="SELECT nis FROM siswa WHERE nis='$nis'";
						$ada=mysql_query($cek);
						if(mysql_num_rows($ada)>0){
							$data_gagal++;
							continue;
						}
						else{
							$sql = "INSERT INTO siswa VALUES('$nis','$nama','$nis','$jns_kel','$tgl_lahir','$tmpt_lahir','$alamat','$nm_kelas','$nama_ortu')";
							$result = mysql_query($sql);
							if ($result) {
								$data_masuk++;
							}
							else{
								$data_gagal++;
							}
						}
					}
				}
				fclose($h);
			}

			header('location:page.php?data-semua-siswa&message=insert-csv-success&data-masuk='.$data_masuk.'&data-gagal='.$data_gagal);

		}
	}
}

?>