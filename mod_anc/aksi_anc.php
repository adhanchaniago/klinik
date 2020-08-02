<?php
include ("../config/koneksi.php");
	if($_GET['module']=='tambahanc'){
		$status=$_POST['xStatus'];
		$t1=$_POST['xNoanc'];
		$t2=$_POST['xKodepasien'];
		$t3=$_POST['xkodedokter'];
		$t4=$_POST['xusia_menikah_ibu'];
		$t5=$_POST['xusia_menikah_suami'];
		$t6=$_POST['xhpht'];
		$t7=$_POST['xhtp'];
		$t8=$_POST['xkeluhan'];
		$t9=$_POST['xkelainan_jantung'];
		$t10=$_POST['xkelainan_jantung_tahun'];
		$t11=$_POST['xkelainan_jantung_keterangan'];
		$t12=$_POST['xtuberkulosis'];
		$t13=$_POST['xtuberkulosis_tahun'];
		$t14=$_POST['xtuberkulosis_keterangan'];
		$t15=$_POST['xkelainan_ginjal'];
		$t16=$_POST['xkelainan_ginjal_tahun'];
		$t17=$_POST['xkelainan_ginjal_keterangan'];
		$t18=$_POST['xkencing_manis'];
		$t19=$_POST['xkencing_manis_tahun'];
		$t20=$_POST['xkencing_manis_keterangan'];
		$t21=$_POST['xkelainan_darah'];
		$t22=$_POST['xkelainan_darah_tahun'];
		$t23=$_POST['xkelainan_darah_keterangan'];
		$t24=$_POST['xoperasi'];
		$t25=$_POST['xoperasi_tahun'];
		$t26=$_POST['xoperasi_keterangan'];
		$t27=$_POST['xother'];
		$t28=$_POST['xother_tahun'];
		$t29=$_POST['xother_keterangan'];
		$t30=$_POST['xg'];
		$t31=$_POST['xp'];
		$t32=$_POST['xa'];
		$t33=$_POST['xah'];
		$t34=$_POST['xlahir_mati'];
		$t35=$_POST['xkontrasepsi'];
		$t36=$_POST['xKodeuser'];
		$t37=$_POST['xrekomendasi_cuti'];
		$t38=$_POST['xnip'];
		$t56=$_POST['xhaemorroid'];
		$t57=$_POST['xhaemorroid_tahun'];
		$t58=$_POST['xhaemorroid_keterangan'];
		$t59=$_POST['xalergi'];
		$t60=$_POST['xalergi_tahun'];
		$t61=$_POST['xalergi_keterangan'];
		$t62=$_POST['xasthma'];
		$t63=$_POST['xasthma_tahun'];
		$t64=$_POST['xasthma_keterangan'];
		
		
		//------------update pegawai-------------
		 $id_pegawai=$_POST['id_pegawai'];
		$t39=$_POST['xnip'];
		$t40=$_POST['xnama_pegawai'];
		$t41=$_POST['xtgl_lhr'];
		$t42=$_POST['xagama'];
		$t43=$_POST['xpekerjaan'];
		$t44=$_POST['xpendidikan'];
		$t45=$_POST['xno_telepon'];
		$t46=$_POST['xalamat'];
		$t47=$_POST['xrt'];
		$t48=$_POST['xrw'];
		$t49=$_POST['xdusun'];
		$t50=$_POST['xdesa'];
		$t51=$_POST['xpuskesmas'];
		$t52=$_POST['xtinggi_badan'];
		$t53=$_POST['xlila'];
		$t54=$_POST['xgolongan_darah'];
		$t55=$_POST['xno_jaminan'];
		 
		 	 
		 
		//echo print_r($t1.$t2.$t3.$t4.$t5.$t6.$t7.$t8.$t9.$t10.$t11.$t12.$t13.$t14.$t15.$t16.$t17.$t18.$t19.$t20.$t21.$t22.$t23.$t24.$t25.$t26.$t27.$t28.$t29.$t30.$t31.$t32.$t33.$t34.$t35.$t36);
			//exit;
		//echo print_r($t37);
		//	exit;	
			
		$sql1="INSERT INTO anc (nomorAnc,kodepasien,kodedokter,usia_menikah_ibu,usia_menikah_suami,hpht,htp,keluhan,jantung,jantung_tahun,jantung_ket,tuberkulosis,tuberkulosis_tahun,tuberkulosis_ket, ginjal,ginjal_tahun,ginjal_ket,kencing_manis,kencing_manis_tahun,kencing_manis_ket,kelainan_darah,kelainan_darah_tahun,kelainan_darah_ket,operasi,operasi_tahun,operasi_ket,other,other_tahun,other_ket,g,p,a,ah,jumlah_lahir_mati,kontrasepsi,kodeuser,rekomendasi_cuti,nip,haemorroid,haemorroid_tahun,haemorroid_ket,alergi,alergi_tahun,alergi_ket,asthma,asthma_tahun,asthma_ket) VALUES ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9','$t10','$t11','$t12','$t13','$t14','$t15','$t16','$t17','$t18','$t19','$t20','$t21','$t22','$t23','$t24','$t25','$t26','$t27','$t28','$t29','$t30','$t31','$t32','$t33','$t34','$t35','$t36','$t37','$t38','$t56','$t57','$t58','$t59','$t60','$t61','$t62','$t63','$t64')";
		//$query=mysqli_query($conn,"INSERT INTO anc (nomorAnc, kodepasien, kodedokter,kodeuser,usia_menikah_ibu) VALUES ('$t1','$t2','$t3','$t36','$t4')");
		$result = $conn->query($sql1);
		$sql2="UPDATE pegawai SET nip='$t39', nama_pegawai='$t40', tgl_lhr='$t41', agama='$t42',pekerjaan='$t43',pendidikan='$t44',no_telepon='$t45', alamat='$t46',rt='$t47',rw='$t48',dusun='$t49',desa='$t50',puskesmas='$t51',tinggi_badan='$t52',lila='$t53',golongan_darah='$t54',nomor_jaminan='$t55' WHERE id_pegawai='$id_pegawai'";
		$result = $conn->query($sql2);
		
		/* Start Sql Server Conection*/   
			$serverName = "192.168.70.1";   
			$uid = "sa";     
			$pwd = "managersql";    
			$databaseName = "DatabaseAbsen";   
			   
			$connectionInfo = array( "UID"=>$uid,                              
									 "PWD"=>$pwd,                              
									 "Database"=>$databaseName);   
				
			/* Connect using SQL Server Authentication. */    
			$conn = sqlsrv_connect( $serverName, $connectionInfo);    
				
			$tsql = "UPDATE new set hamil='True' where NIK='$t39' ";    
				
			/* Execute the query. */    
				
			$stmt = sqlsrv_query( $conn, $tsql);    
				
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
				
			//while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))    
		//	{    
			//	 echo "NIK: ".$row[0]."\n";    
			//	 echo "Nama: ".$row[1]."\n";    
			//	 echo "Hamil: ".$row[2]."<br>\n";    
			//	 echo "-----------------<br>\n";    
			//}    
				
			/* Free statement and connection resources. */    
			sqlsrv_free_stmt( $stmt);    
			sqlsrv_close( $conn);    
		
			/* End Sql Server Conection*/  
		 header("location:../media.php?module=anc&&status=$status&&kodepasien=$t2");
	} 
	elseif($_GET['module']=='updateanc'){
		$status=$_POST['xStatus'];
		$noAnc=$_POST['xAncNo'];
		$t2=$_POST['xKodepasien'];
		$t3=$_POST['xkodedokter'];
		$t4=$_POST['xusia_menikah_ibu'];
		$t5=$_POST['xusia_menikah_suami'];
		$t6=$_POST['xhpht'];
		$t7=$_POST['xhtp'];
		
		$t8=$_POST['xkeluhan'];
		$t9=$_POST['xkelainan_jantung'];
		$t10=$_POST['xkelainan_jantung_tahun'];
		$t11=$_POST['xkelainan_jantung_keterangan'];
		$t12=$_POST['xtuberkulosis'];
		$t13=$_POST['xtuberkulosis_tahun'];
		$t14=$_POST['xtuberkulosis_keterangan'];
		$t15=$_POST['xkelainan_ginjal'];
		$t16=$_POST['xkelainan_ginjal_tahun'];
		$t17=$_POST['xkelainan_ginjal_keterangan'];
		$t18=$_POST['xkencing_manis'];
		$t19=$_POST['xkencing_manis_tahun'];
		$t20=$_POST['xkencing_manis_keterangan'];
		$t21=$_POST['xkelainan_darah'];
		$t22=$_POST['xkelainan_darah_tahun'];
		$t23=$_POST['xkelainan_darah_keterangan'];
		$t24=$_POST['xoperasi'];
		$t25=$_POST['xoperasi_tahun'];
		$t26=$_POST['xoperasi_keterangan'];
		$t27=$_POST['xother'];
		$t28=$_POST['xother_tahun'];
		$t29=$_POST['xother_keterangan'];
		$t30=$_POST['xg'];
		$t31=$_POST['xp'];
		$t32=$_POST['xa'];
		$t33=$_POST['xah'];
		$t34=$_POST['xlahir_mati'];
		$t35=$_POST['xkontrasepsi'];
		$t36=$_POST['xKodeuser'];
		$t37=$_POST['xcuti'];
		$t38=$_POST['xnip'];
		$t56=$_POST['xhaemorroid'];
		$t57=$_POST['xhaemorroid_tahun'];
		$t58=$_POST['xhaemorroid_keterangan'];
		$t59=$_POST['xalergi'];
		$t60=$_POST['xalergi_tahun'];
		$t61=$_POST['xalergi_keterangan'];
		$t62=$_POST['xasthma'];
		$t63=$_POST['xasthma_tahun'];
		$t64=$_POST['xasthma_keterangan'];
		$t65=$_POST['xAwalcuti'];
		$t66=$_POST['xAkhircuti'];
		$t67=$_POST['xabortus_jenis'];
		$t68=$_POST['xabortus_date'];
		$t69=$_POST['xabortus_reason'];
		$t70=$_POST['xabortus_from'];
		$t71=$_POST['xabortus_oleh'];
		$t72=$_POST['xabortus_petugas'];		
		
		//------------update pegawai-------------
		 $id_pegawai=$_POST['id_pegawai'];
		$t39=$_POST['xnip'];
		$t40=$_POST['xnama_pegawai'];
		$t41=$_POST['xtgl_lhr'];
		$t42=$_POST['xagama'];
		$t43=$_POST['xpekerjaan'];
		$t44=$_POST['xpendidikan'];
		$t45=$_POST['xno_telepon'];
		$t46=$_POST['xalamat'];
		$t47=$_POST['xrt'];
		$t48=$_POST['xrw'];
		$t49=$_POST['xdusun'];
		$t50=$_POST['xdesa'];
		$t51=$_POST['xpuskesmas'];
		$t52=$_POST['xtinggi_badan'];
		$t53=$_POST['xlila'];
		$t54=$_POST['xgolongan_darah'];
		$t55=$_POST['xno_jaminan'];
		 
		 
		//echo print_r($t1.$t2.$t3.$t4.$t5.$t6.$t7.$t8.$t9.$t10.$t11.$t12.$t13.$t14.$t15.$t16.$t17.$t18.$t19.$t20.$t21.$t22.$t23.$t24.$t25.$t26.$t27.$t28.$t29.$t30.$t31.$t32.$t33.$t34.$t35.$t36);
			//exit;
			
		// echo print_r($id_pegawai);
		//exit;
		//$sql="UPDATE anc SET kodepasien='$t2',kodedokter='$t3',usia_menikah_ibu='$t4',usia_menikah_suami='$t5',hpht='$t6',htp='$t7',keluhan='$t8',jantung='$t9',jantung_tahun='$t10',jantung_ket='$t10',tuberkulosis='$t12',tuberkulosis_tahun='$t13',tuberkulosis_ket='$t14', ginjal='$t15',ginjal_tahun='$t16',ginjal_ket='$t17',kencing_manis='$t18',kencing_manis_tahun='$t19',kencing_manis_ket='$t20',kelainan_darah='$t21',kelainan_darah_tahun='$t22',kelainan_darah_ket='$t23',operasi='$t24',operasi_tahun='$t25',operasi_ket='$t26',other='$t27',other_tahun='$t28',other_ket='$t29',g='$t30',p='$t31',a='$t32',ah='$t33',jumlah_lahir_mati='$t34',kontrasepsi='$t35',kodeuser='$t36',rekomendasi_cuti='$t37',nip='$t38' WHERE nomorAnc='$noAnc';";
		//$query=mysqli_query($conn,"INSERT INTO anc (nomorAnc, kodepasien, kodedokter,kodeuser,usia_menikah_ibu) VALUES ('$t1','$t2','$t3','$t36','$t4')");
		$sql1="UPDATE anc SET kodepasien='$t2',kodedokter='$t3',usia_menikah_ibu='$t4',usia_menikah_suami='$t5',hpht='$t6',htp='$t7',keluhan='$t8',jantung='$t9',jantung_tahun='$t10',jantung_ket='$t10',tuberkulosis='$t12',tuberkulosis_tahun='$t13',tuberkulosis_ket='$t14', ginjal='$t15',ginjal_tahun='$t16',ginjal_ket='$t17',kencing_manis='$t18',kencing_manis_tahun='$t19',kencing_manis_ket='$t20',kelainan_darah='$t21',kelainan_darah_tahun='$t22',kelainan_darah_ket='$t23',operasi='$t24',operasi_tahun='$t25',operasi_ket='$t26',other='$t27',other_tahun='$t28',other_ket='$t29',g='$t30',p='$t31',a='$t32',ah='$t33',jumlah_lahir_mati='$t34',kontrasepsi='$t35',kodeuser='$t36',rekomendasi_cuti='$t37',nip='$t38',haemorroid='$t56',haemorroid_tahun='$t57',haemorroid_ket='$t58',alergi='$t59',alergi_tahun='$t60',alergi_ket='$t61',asthma='$t62',asthma_tahun='$t63',asthma_ket='$t64',begincuti='$t65',endcuti='$t66',abortus_jenis='$t67',abortus_date='$t68',abortus_reason='$t69',abortus_from='$t70',abortus_oleh='$t71',abortus_petugas='$t72' WHERE nomorAnc='$noAnc'";
		//$sql .="UPDATE pegawai SET nip='$t39', nama_pegawai='$t40', tgl_lhr='$t41', agama='$t42',pekerjaan='$t43',pendidikan='$t44',no_telepon='$t45', alamat='$t46',rt='$t47',rw='$t48',dusun='$t49',desa='$t50',puskesmas='$t51',tinggi_badan='$t52',lila='$t53',golongan_darah='$t54',no_jaminan='$t55' WHERE id_pegawai='$id_pegawai'";
		$result = $conn->query($sql1);
		$sql2 ="UPDATE pegawai SET nip='$t39', nama_pegawai='$t40', tgl_lhr='$t41', agama='$t42',pekerjaan='$t43',pendidikan='$t44',no_telepon='$t45', alamat='$t46',rt='$t47',rw='$t48',dusun='$t49',desa='$t50',puskesmas='$t51',tinggi_badan='$t52',lila='$t53',golongan_darah='$t54',nomor_jaminan='$t55' WHERE id_pegawai='$id_pegawai'";
		//echo print_r('HPL:'.$t7.'CUTI:'.$t37.'ANC:'.$noAnc.'ID Pegawai:'.$id_pegawai);
		//echo print_r($sql);
		//exit;
		$result = $conn->query($sql2);
		//echo print_r($sql2);
		//exit;
		
		/* Start Sql Server Conection*/   
			$serverName = "192.168.70.1";   
			$uid = "sa";     
			$pwd = "managersql";    
			$databaseName = "DatabaseAbsen";   
			   
			$connectionInfo = array( "UID"=>$uid,                              
									 "PWD"=>$pwd,                              
									 "Database"=>$databaseName);   
				
			/* Connect using SQL Server Authentication. */    
			$conn = sqlsrv_connect( $serverName, $connectionInfo);    
				
			$tsql = "UPDATE new set hamil='True' where NIK='$t39' ";    
				
			/* Execute the query. */    
				
			$stmt = sqlsrv_query( $conn, $tsql);    
				
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
				
			//while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))    
		//	{    
			//	 echo "NIK: ".$row[0]."\n";    
			//	 echo "Nama: ".$row[1]."\n";    
			//	 echo "Hamil: ".$row[2]."<br>\n";    
			//	 echo "-----------------<br>\n";    
			//}    
				
			/* Free statement and connection resources. */    
			sqlsrv_free_stmt( $stmt);    
			sqlsrv_close( $conn);    
		
			/* End Sql Server Conection*/  
		
		 header("location:../media.php?module=anc&&status=$status&&kodepasien=$t2");
	} 
	elseif($_GET['module']=='tambahanak'){
		
		$nip=$_POST['xnip'];
        $t1=$_POST['xanak_ke_apeg'];
        $t2=$_POST['xkehamilan_apeg'];
        $t3=$_POST['xjk_apeg'];
        $t4=$_POST['xlahir_apeg'];
		$t5=$_POST['xbb_lahir_apeg'];
        $t6=$_POST['xpenolong_apeg'];
        $t7=$_POST['xtempat_melahirkan_apeg'];
        $t8=$_POST['xketerangan_apeg'];
		$t9=$_POST['xusia_apeg'];
      //echo print_r($t1.$t2.$t3.$t4.$t5.$t6.$t7.$t8.$nip);
			//exit;
       $query=mysqli_query($conn,"INSERT INTO pegawai_anak(nip_pegawai,anak_ke_apeg,kehamilan_apeg,jk_apeg,lahir_apeg,bb_lahir_apeg,penolong_apeg,tempat_melahirkan_apeg,keterangan_apeg,usia_apeg) VALUES ('$nip','$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9')");
	
       echo "<script>history.back(self);</script>";
    }
	elseif($_GET['module']=='tambahsuami'){
		
		$nip=$_POST['xnip'];
        $t1=$_POST['xnama_kpeg'];
        $t2=$_POST['xjk_kpeg'];
        $t3=$_POST['xtgllahir_kpeg'];
        $t4=$_POST['xalamat_kpeg'];
		$t5=$_POST['xstatus_kpeg'];
        $t6=$_POST['xagama_kpeg'];
        $t7=$_POST['xpekerjaan_kpeg'];
        $t8=$_POST['xpendidikan_kpeg'];
		$t9=$_POST['xno_telepon_kpeg'];
      //echo print_r($t1.$t2.$t3.$t4.$t5.$t6.$t7.$t8.$nip);
			//exit;
       $query=mysqli_query($conn,"INSERT INTO pegawai_kel(nip_pegawai,nama_kpeg,jk_kpeg,tgllahir_kpeg,alamat_kpeg,status_kpeg,agama_kpeg,pekerjaan_kpeg,pendidikan_kpeg,no_telepon_kpeg) VALUES ('$nip','$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9')");
	
      echo "<script>window.location=document.referrer;</script>";
    }
	elseif($_GET['module']=='tambahranc'){
		$t1=$_POST['xnoranc'];
		$t2=$_POST['xkodepasien'];
		$t3=$_POST['xkodedokter'];
		$t4=$_POST['xnip'];
		$t5=date('Y-m-d');
		$t6=date('H:i:s');
		$t7=$_POST['xkodeuser'];
		$t8=$_POST['xnomorAnc'];
		$t9=$_POST['xsubyektif'];
		$t10=$_POST['xtd'];
		$t11=$_POST['xbb'];
		$t12=$_POST['xuk'];
		$t13=$_POST['xtfu'];
		$t14=$_POST['xletak_janin'];
		$t15=$_POST['xdjj'];
		$t16=$_POST['xlab'];
		$t17=$_POST['xpemeriksaan'];
		$t18=$_POST['xanalisa'];
		$t19=$_POST['xpenatalaksaan'];
		
		 //echo print_r($t1.'/'.$t2.'/'.$t3.'/'.$t4.'/'.$t5.'/'.$t6.'/'.$t7.'/'.$t8.'/'.$t9.'/'.$t10.'/'.$t11.'/'.$t12.'/'.$t13.'/'.$t14.'/'.$t15.'/'.$t16.'/'.$t17.'/'.$t18.'/'.$t19);
		 
			//exit;
		$query=mysqli_query($conn,"INSERT INTO rekamanc (nomorRanc, kodepasien, kodedokter, nip, tgl_periksa,jam_periksa,kodeuser,nomorAnc,data_subyektif,td,bb,uk,tfu,letak_janin,djj,lab,pemeriksaan_khusus,analisa,penatalaksaan) VALUES ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9','$t10','$t11','$t12','$t13','$t14','$t15','$t16','$t17','$t18','$t19')");
		echo "<script>history.back(self);</script>";
	}
	elseif($_GET['module']=='tambah_tang'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5="-";
		$t7=date('Y-m-d');
		$t6=date('H:i:s');
		$t8=$_POST['t8'];
		$t9="-";
		$t10=$_POST['t10'];
		$query=mysqli_query($conn,"INSERT INTO rekammedik (nomorRm, kodepasien, kodedokter, keluhan, diagnosa, tindakan, jam, tgl, kodeuser,pemeriksaan_fisik) VALUES ('$t1','$t2','$t3','$t4','$t5','$t9','$t6','$t7','$t8','$t10')");
		echo "<script>history.back(self);</script>";
	}
	elseif($_GET['module']=='ubah_diag'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
        $penyakit=$_POST['penyakit'];
        $status=$_POST['status'];
		$kode=$_POST['kode'];
        $spesialis=$_POST['spesialis'];
        $rs=$_POST['rs'];
		$diagnosis=$_POST['diagnosis'];
		$query=mysqli_query($conn,"UPDATE rekammedik SET diagnosa='$t2', tindakan='$t3', id_rs='$rs', spesialis='$spesialis', id_penyakit='$penyakit',id_diagnosis='$diagnosis' WHERE nomorRm='$t1'");
		header("location:../media.php?module=rekam_medik&&status=$status&&kodepasien=$kode");
	}
    elseif($_GET['module']=='tambahracik'){
        $t1=$_POST['t1'];
        $t2=$_POST['t2'];
        $t3=$_POST['t3'];
        $t4=$_POST['t4'];
        $t5=$_POST['t5'];
        $t6=$_POST['t6'];
        $t7=$_POST['t7'];
        $kode_resep=$_POST['kode_resep'];
        $kode=$_POST['kode'];
        $status=$_POST['status'];
        $tgl=date('Y-m-d');
        $query=mysqli_query($conn,"INSERT INTO racik_obat(kode_resep,nama_obat,racik,aturan_pakai,harga,pengambil_obat,petugas_apotek,id_dokter,kodepasien,tgl_racik) VALUES('$kode_resep','$t1','$t2','$t3','$t4','$t5','$t6','$t7','$kode','$tgl')");
        header("location:../media.php?module=rekam_medik&&status=$status&&kodepasien=$kode");
    }
    elseif($_GET['module']=='hapus_racik'){
        $id_racik=$_GET['id_racik'];
        $kode=$_GET['kode'];
        $status=$_GET['status'];
        $query=mysqli_query($conn,"DELETE FROM racik_obat WHERE id_racik='$id_racik'");
        header("location:../media.php?module=rekam_medik&&status=$status&&kodepasien=$kode");
    }
	elseif($_GET['module']=='hapus_rm'){
		$id_rm=$_GET['id_rm'];
		$kode=$_GET['kode'];
        $status=$_GET['status'];
		
		$query=mysqli_query($conn,"DELETE FROM rekammedik WHERE id_rm='$id_rm'");
		header("location:../media.php?module=rekam_medik&&status=$status&&kodepasien=$kode");		
	}
	elseif($_GET['module']=='hapus_anak'){
		$id_apeg=$_GET['id_apeg'];
		$kode=$_GET['kode'];
        $status=$_GET['status'];
		// echo print_r($id_apeg.$kode.$status);
		//	exit;
		
		$query=mysqli_query($conn,"DELETE FROM pegawai_anak WHERE id_apeg='$id_apeg'");
		header("location:../media.php?module=anc&&status=$status&&kodepasien=$kode");		
	}
	elseif($_GET['module']=='hapus_suami'){
		$id_kpeg=$_GET['id_kpeg'];
		$kode=$_GET['kode'];
        $status=$_GET['status'];
		// echo print_r($id_kpeg.$kode.$status);
		//	exit;
		
		$query=mysqli_query($conn,"DELETE FROM pegawai_kel WHERE id_kpeg='$id_kpeg'");
		header("location:../media.php?module=anc&&status=$status&&kodepasien=$kode");		
	}
	elseif($_GET['module']=='hapus_rekamanc'){
		$id_ranc=$_GET['id_ranc'];
		$kode=$_GET['kode'];
        $status=$_GET['status'];
		//echo print_r($id_ranc."-".$kode."-".$status);
		//exit;
		
		$query=mysqli_query($conn,"DELETE FROM rekamanc WHERE id_ranc='$id_ranc'");
		header("location:../media.php?module=anc&&status=$status&&kodepasien=$kode");		
	}
		?>