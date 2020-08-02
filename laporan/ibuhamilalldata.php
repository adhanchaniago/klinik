<?php
	include ("../config/koneksi.php");
	include ("../config/fungsi_indotgl.php");
	include ("../config/fungsi_minggu.php");
	$limit=$_GET['limit'];
    $tgl1=$_GET['tgl1'];
	$tgl2=$_GET['tgl2'];
	?>
<!doctype html>
<html>
	<head>
		<title>Laporan Data Ibu Hamil</title>
		<link rel="shortcut icon" href="../img/laporan.png">
		<link rel="stylesheet" type="text/css" href="../css/laporan.css">

	
	</head>
	<body>
		<div class="page">
		<div class="kop">
            <img src="../img/ameya.png" id="kop">
            <div class="header">
			<h2>SYSTEM APLIKASI REKAM MEDIS <br />  PT.Ameya Livingstyle Indonesia</h2>
            <h6><?php
                if($tgl1=='' AND $tgl2==''){
                    
                }
                else{
                    echo tgl_indo($tgl1)."Data sebelum :".tgl_indo($tgl2);
                }
                ?>
            
            </h6>
                </div>
		</div>
		
            <div class="batas"></div>
            <?php
			
			if($tgl1==''){
		?>
		<h2>DATA IBU HAMIL</h2>
		<table class="table" border="1px">
			<tr class="head">
				<td>NO. </td><td>NIK</td><td>NAMA</td><td>DEPART</td><td>PETUGAS</td><td>HPL</td><td>REKOM CUTI</td><td>AWAL CUTI</td><td>AKHIR CUTI</td>
			</tr>
			
			<?php	$query=mysqli_query($conn,"SELECT * FROM anc, pasien, pegawai, dokter WHERE anc.kodepasien=pasien.kodePasien AND pasien.id_pegawai=pegawai.id_pegawai AND dokter.kodeDokter=anc.kodedokter AND anc.datecreated <= '".$tgl2."' AND pegawai.tgl_out='0000-00-00'ORDER BY htp ASC");									
					
					$no=1;
					while($r=mysqli_fetch_array($query)){
					?>					
						<tr bgcolor="#fff">
							<td align="center"><?php echo $no; ?></td><td><?php echo $r['nip']; ?></td><td style='width:75px;'><?php echo $r['nama_pegawai']; ?></td><td style='width:65px;'><?php echo $r['unit']; ?></td><td><?php echo $r['nama_dokter']; ?></td>
							<td style='width:37px;' align='center'><?php echo tgl_indo($r['htp']); ?></td>
							<td style='width:37px;' align='center'><?php echo tgl_indo($r['rekomendasi_cuti']); ?></td>
							<?php
								$begincuti=$r['begincuti'];
								$abortus=$r['abortus_jenis'];
								if (($begincuti=='0000-00-00') and ($abortus==null))
									$begincuti='Belum Cuti';
									
								elseif
									(($begincuti=='0000-00-00') and ($abortus<>null))
									$begincuti='Abortus';
								else
									$begincuti=tgl_indo($begincuti);
									
								?>
							<td style='width:37px;' align='center'><?php echo $begincuti; ?></td>
							 <?php
								$endcuti=$r['endcuti'];
								$abortus=$r['abortus_jenis'];
								if (($endcuti=='0000-00-00') and ($abortus==null))
									$endcuti='Belum Cuti';
									
								elseif
									(($endcuti=='0000-00-00') and ($abortus<>null))
									$endcuti=$r['abortus_jenis'];
								else
									$endcuti=tgl_indo($endcuti);
									
								?>
							<td style='width:37px;' align='center'><?php echo $endcuti; ?></td>
							
						</tr>
					
					<?php
					$no++;
					}
					?>
              
					
		</table>
            <?php
            }
            else{
                ?>
            <table class="table" border="1px">
			<tr class="head">
				<td>NO. </td><td>NIK</td><td>NAMA</td><td>DEPART</td><td>PETUGAS</td><td>HPL</td><td>REKOM CUTI</td><td>AWAL CUTI</td><td>AKHIR CUTI</td>
			</tr>
			
			<?php	$query=mysqli_query($conn,"SELECT * FROM anc, pasien, pegawai, dokter WHERE anc.kodepasien=pasien.kodePasien AND pasien.id_pegawai=pegawai.id_pegawai AND dokter.kodeDokter=anc.kodedokter AND anc.datecreated <= '".$tgl2."' AND pegawai.tgl_out='0000-00-00'ORDER BY htp ASC");									
					
					$no=1;
					while($r=mysqli_fetch_array($query)){
					?>					
						<tr bgcolor="#fff">
							<td align="center"><?php echo $no; ?></td><td><?php echo $r['nip']; ?></td><td style='width:75px;'><?php echo $r['nama_pegawai']; ?></td><td style='width:50px;'><?php echo $r['unit']; ?></td><td><?php echo $r['nama_dokter']; ?></td>
							<td><?php echo tgl_indo($r['htp']); ?></td>
							<td><?php echo tgl_indo($r['rekomendasi_cuti']); ?></td>
							<?php
								$begincuti=$r['begincuti'];
								$abortus=$r['abortus_jenis'];
								if (($begincuti=='0000-00-00') and ($abortus==null))
									$begincuti='Belum Cuti';
									
								elseif
									(($begincuti=='0000-00-00') and ($abortus<>null))
									$begincuti='Abortus';
								else
									$begincuti=tgl_indo($begincuti);
									
								?>
							<td><?php echo $begincuti; ?></td>
							 <?php
								$endcuti=$r['endcuti'];
								$abortus=$r['abortus_jenis'];
								if (($endcuti=='0000-00-00') and ($abortus==null))
									$endcuti='Belum Cuti';
									
								elseif
									(($endcuti=='0000-00-00') and ($abortus<>null))
									$endcuti=$r['abortus_jenis'];
								else
									$endcuti=tgl_indo($endcuti);
									
								?>
							<td><?php echo $endcuti; ?></td>
							
						</tr>
					
					<?php
					$no++;
					}
					?>
              
					
		</table>
            <?php
            }
            ?>
   
		</div>
	</body>
</html>