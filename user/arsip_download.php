<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$user = $_SESSION['id'];
$arsip = $_GET['id'];

mysqli_query($koneksi, "insert into riwayat values (NULL,'$waktu','$user','$arsip')")or die(mysqli_error($koneksi));

$data = mysqli_query($koneksi,"select * from arsip where arsip_id='$arsip'");
$d = mysqli_fetch_assoc($data);
header("location:../arsip/".$d['arsip_file']);

