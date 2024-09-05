<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "update kategori set kategori_nama='$nama', kategori_keterangan='$keterangan' where kategori_id='$id'");
header("location:kategori.php");
