<?php
include ("../config/koneksi.php");
	if($_GET['module']=='tambah'){
		$nama_diagnosis=$_POST['nama_diagnosis'];
		$keterangan_diagnosis=$_POST['keterangan_diagnosis'];
		$kode_diagnosis=$_POST['kode_diagnosis'];
		$query=mysqli_query($conn,"INSERT INTO diagnosis (nama_diagnosis, ket, kode_diagnosis) VALUES ('$nama_diagnosis','$keterangan_diagnosis','$kode_diagnosis')");
		header("location:../media.php?module=diagnosis");
	
	}
	elseif($_GET['module']=='hapus'){		
		$id_diagnosis=$_GET['id_diagnosis'];
		$query=mysqli_query($conn,"DELETE FROM diagnosis WHERE id_diagnosis='$id_diagnosis'");
		header("location:../media.php?module=diagnosis");		
	}
	elseif($_GET['module']=='edit'){
		$id_diagnosis=$_POST['id_diagnosis'];
		$nama_diagnosis=$_POST['nama_diagnosis'];
		$ket=$_POST['keterangan_diagnosis'];
		$kode_diagnosis=$_POST['kode_diagnosis'];
		$id_diagnosis=$_POST['id_diagnosis'];
		$query=mysqli_query($conn,"UPDATE diagnosis SET nama_diagnosis='$nama_diagnosis', ket='$keterangan_diagnosis' WHERE id_diagnosis='$id_diagnosis'");
		header("location:../media.php?module=diagnosis");	
		}
?>