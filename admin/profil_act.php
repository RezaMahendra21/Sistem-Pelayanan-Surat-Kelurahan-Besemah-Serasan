<?php 
include '../koneksi.php';
session_start();

$id = $_SESSION['id'];

$username  = $_POST['username'];
$nama  = $_POST['nama'];

$rand = rand();

$allowed =  array('gif','png','jpg','jpeg');

$filename = $_FILES['foto']['name'];

if($filename == ""){

	mysqli_query($koneksi, "update admin set admin_nama='$nama', admin_username='$username' where admin_id='$id'")or die(mysqli_error($koneksi));
	header("location:profil.php?alert=sukses");

}else{

	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {

		// hapus file lama
		$lama = mysqli_query($koneksi,"select * from admin where admin_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['admin_foto'];
		unlink("../gambar/admin/".$nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/admin/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "update admin set admin_nama='$nama', admin_username='$username', admin_foto='$nama_file' where admin_id='$id'")or die(mysqli_error($koneksi));
		header("location:profil.php?alert=sukses");

	}else{

		header("location:profil.php?alert=gagal");
	}

}

