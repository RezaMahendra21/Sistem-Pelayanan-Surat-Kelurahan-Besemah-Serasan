<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from kategori where kategori_id='$id'");
mysqli_query($koneksi, "delete from kategori where kategori_id='$id'");
header("location:kategori.php");
