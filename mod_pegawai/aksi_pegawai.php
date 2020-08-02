<?php
include ("../config/koneksi.php");
include ("../config/fungsi_thumb.php");
	if($_GET['module']=='tambah'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$t7=$_POST['t7'];
		$t8=$_POST['t8'];
		$t9=$_POST['t9'];
		$query=mysqli_query($conn,"INSERT INTO pegawai(nip, kj, nama_pegawai, unit, jk, tgl_lhr, status_kel, alamat,location) VALUES ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9')");
		header("location:../media.php?module=pegawai");	
	}
	elseif($_GET['module']=='tambah_operator'){
		$t1=$_POST['xnip'];
		$t2=$_POST['xkj'];
		$t3=$_POST['xnama_pegawai'];
		$t4=$_POST['xunit'];
		$t5=$_POST['xjk'];
		$t6=$_POST['xtanggallahir'];
		$t7=$_POST['t7'];
		$t8=$_POST['xalamat'];
		$t9=$_POST['t9'];
		$t10=$_POST['xasuransi'];
		
		$cek=mysqli_query($conn,"SELECT * FROM pegawai WHERE nip='$t1'");
        $num=mysqli_num_rows($cek);
        if($num>=1){
            echo "<script>
            alert('Data sudah ada!');
            window.location.href='../media.php?module=data_pasien';
            </script>";
            
        }
        else{
        $query=mysqli_query($conn,"INSERT INTO pegawai(nip, kj, nama_pegawai, unit, jk, tgl_lhr, status_kel, alamat,location,nomor_jaminan) VALUES ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9','$t10')");
		//echo print_r($query);
		//exit;	
		header("location:../media.php?module=pegawai");	
        }
		
		
	}
	elseif($_GET['module']=='sinkronisasi'){
		/* Start Sql Server Conection*/   
			$serverName = "192.168.70.1";   
			$uid = "sa";     
			$pwd = "managersql";    
			$databaseName = "DatabaseAbsen";   
			   
			$connectionInfo = array( "UID"=>$uid,                              
									 "PWD"=>$pwd,                              
									 "Database"=>$databaseName);   
				
			/* Connect using SQL Server Authentication. */    
			$connn = sqlsrv_connect( $serverName, $connectionInfo);    
				
			
			$tsql = "SELECT nik,nama,CONVERT(VARCHAR(10), [TGL OUT], 120) AS [tanggalout] FROM qry_masterstaff_utama WHERE [tgl out] is not null UNION SELECT finger as nik,nama,CONVERT(VARCHAR(10), [TGL OUT], 120) AS [tanggalout] FROM new WHERE [tgl out] is not null  ";
			/* Execute the query. */    
				
			$stmt = sqlsrv_query( $connn, $tsql);    
				
			if ( $stmt )    
			{    
				 echo "Statement executed.<br>\n";    
			}     
			else     
			{    
				 echo "Error in statement execution.\n";    
				 die( print_r( sqlsrv_errors(), true));    
			}    
				
			/* Iterate through the result set printing a row of data upon each iteration.*/    
				
			while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
				//echo $row['tanggallahir'].", ".$row['nama']."<br />";
				$nik=$row['nik'];
				$nama=$row['nama'];
				$tanggalout=$row['tanggalout'];
				
				//echo $row['nik'].", ".$row['nama'].",".$row['tanggalout']."<br />";
				/* update tgl out dari database ameya.*/ 
				$sql2="UPDATE pegawai SET tgl_out='$tanggalout' WHERE nip='$nik' ";
				$result = $conn->query($sql2); 
				}
				//echo print_r($nama);
				//exit;
				
				
				
				
				
				/* Chek data klinik Tgl Out.*/
			$link = mysqli_connect("localhost", "root", "managersql", "db_sarma");
			$data=mysqli_query($link,"SELECT nip FROM pegawai where tgl_out <>'0000-00-00' ");
			
			while ($row=mysqli_fetch_array($data,MYSQLI_ASSOC))
			 {
			   //echo $row['nim']." ".$row['nama']." ".$row['umur']." ";
			  // echo $row['nip'];
			   //echo "<br />";
			   $nip=$row['nip'];
			   	//exit;
			   /* Update data mbak hana Hamil sudah keluar belum cuti.*/  
			$tsql2 = "UPDATE new SET hamil='false' WHERE nik='$nip' and hamil='True' ";  
			$stmt = sqlsrv_query( $connn, $tsql2);   
			 }
			//echo print_r($nip);
				//exit;		

			/* Free statement and connection resources. */    
			sqlsrv_free_stmt( $stmt);    
			sqlsrv_close( $connn);   
		
			/* End Sql Server Conection*/  
			
		header("location:../media.php?module=pegawai");		
	}
elseif($_GET['module']=='tambah_kel'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
        $nip=$_POST['nip'];
        
		$query=mysqli_query($conn,"INSERT INTO pegawai_kel(nip_pegawai, nama_kpeg, jk_kpeg, tgllahir_kpeg, alamat_kpeg, status_kpeg) VALUES ('$nip','$t1','$t2','$t3','$t4','$t5')");
		header("location:../media.php?module=pegawai");	
	}
	elseif($_GET['module']=='hapus'){
		$id_pegawai=$_GET['id_pegawai'];
		$query=mysqli_query($conn,"DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'");
		header("location:../media.php?module=pegawai");		
	}
elseif($_GET['module']=='hapus_kel'){
		echo $id_kpeg=$_GET['id_kpeg'];
		$query=mysqli_query($conn,"DELETE FROM pegawai_kel WHERE id_kpeg='$id_kpeg'");
		header("location:../media.php?module=pegawai");		
	}
	elseif($_GET['module']=='edit'){
        $id_pegawai=$_POST['id_pegawai'];
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$t7=$_POST['t7'];
		$t8=$_POST['t8'];
		$t9=$_POST['t9'];
		$t10=$_POST['t10'];
		if(empty($t7)){
		$query=mysqli_query($conn,"UPDATE pegawai SET nip='$t1', kj='$t2', nama_pegawai='$t3', unit='$t4', jk='$t5', tgl_lhr='$t6', alamat='$t8',location='$t9', tgl_out='$t10' WHERE id_pegawai='$id_pegawai'");
		header("location:../media.php?module=pegawai");
		}
		else{
		$query=mysqli_query($conn,"UPDATE pegawai SET nip='$t1', kj='$t2', nama_pegawai='$t3', unit='$t4', jk='$t5', tgl_lhr='$t6', status_kel='$t7', alamat='$t8',location='$t9',tgl_out='$t10' WHERE id_pegawai='$id_pegawai'");
		header("location:../media.php?module=pegawai");
		}
		}
		?>