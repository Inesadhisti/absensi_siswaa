<?php
//panggil file config.php untuk menghubung ke server
include('system/config/conn.php');

//tempat menyimpan file
$folder="system/images/"; 

//tangkap data dari form
$id_user = FILTER_INPUT(INPUT_POST, 'id_user');
$pass = FILTER_INPUT(INPUT_POST, 'pass');
$pass = md5($pass);
$confirm = FILTER_INPUT(INPUT_POST, 'confirm');
$confirm = md5($confirm);
$nama = FILTER_INPUT(INPUT_POST, 'nama');
$user = FILTER_INPUT(INPUT_POST, 'user');
$level = FILTER_INPUT(INPUT_POST, 'level');

	$query = mysql_query("update user set user='$user', pass='$pass', confirm='$confirm', level='$level', nama='$nama' where id_user='$id_user'");
	header('location:page.php?g-home&message=edit-success');  


?>
