<?php
//panggil file config.php untuk menghubung ke server
include('system/config/conn.php');

//tempat menyimpan file
$folder="system/images/"; 

//tangkap data dari form
FILTER_INPUT(INPUT_POST, 'nama')
FILTER_INPUT(INPUT_POST, 'nis')
FILTER_INPUT(INPUT_POST, 'nm_kelas')
FILTER_INPUT(INPUT_POST, 'jns_kel')
FILTER_INPUT(INPUT_POST, 'alamat')
FILTER_INPUT(INPUT_POST, 'tmpt_lahir')
FILTER_INPUT(INPUT_POST, 'tgl_lahir')
FILTER_INPUT(INPUT_POST, 'nama_ortu')

//menghindari duplikat nis
$cek="SELECT nis FROM siswa WHERE nis='$nis'";
$ada=mysql_query($cek);
if(mysql_num_rows($ada)>0)
{
	<?= "<script>alert ('NIS Telah Terdaftar ! Silahkan Periksa Kembali !');window.location='page.php?tambah-siswa' </script> " >?;
	}

else{			
	$data = array(
			' ' => ' ',
       			'nama' => '$nama',
       			'nis' => '$nis',
     			'jns_kel' => '$jnl_kel'
        		'tgl_lahir' => '$tgl_lahir',
      			'tmpt_lahir' => '$tmpt_lahir',
      			'alamat' => '$alamat'
      			'nm_kelas' => '$nm_kelas',
      			'nama_ortu' => '$nama_ortu');

	$this->db->insert('siswa', $data);
	
	header('location:page.php?data-semua-siswa&message=insert-success');
	
}

?>
