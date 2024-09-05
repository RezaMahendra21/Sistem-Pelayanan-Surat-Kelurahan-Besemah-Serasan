<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from petugas where petugas_id='$id'");
$d = mysqli_fetch_assoc($data);
$foto = $d['petugas_foto'];
unlink("../gambar/petugas/$foto");
mysqli_query($koneksi, "delete from petugas where petugas_id='$id'");
header("location:petugas.php");
