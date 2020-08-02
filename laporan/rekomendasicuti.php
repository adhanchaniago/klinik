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
		<title>Laporan Data Rekomendasi Cuti</title>
		<link rel="shortcut icon" href="../img/laporan.png">
		<link rel="stylesheet" type="text/css" href="../css/laporan.css">

	
	</head>
	<body>
		<div class="page">
		<div class="kop">
            <img src="../img/kop.png" id="kop">
            <div class="header">
			<h2>SYSTEM APLIKASI REKAM MEDIS <br />  PT.Ameya Livingstyle Indonesia</h2>
            <h6><?php
                if($tgl1=='' AND $tgl2==''){
                    
                }
                else{
                    echo tgl_indo($tgl1)." s/d ".tgl_indo($tgl2);
                }
                ?>
            
            </h6>
                </div>
		</div>
		
            <div class="batas"></div>
            <?php
			
			if($tgl1=='' AND $tgl2==''){
		?>
		<h2>DATA REKOMENDASI CUTI</h2>
		<table class="table" border="1px">
			<tr  class="head">
				<td>NO. </td><td>NIK</td><td>NAMA</td><td>DEPART</td><td>PETUGAS</td><td>HPL</td><td>REKOMENDASI CUTI</td><td>AWAL CUTI</td><td>AKHIR CUTI</td>
			</tr>
			
			<?php										
					$query=mysqli_query($conn,"SELECT * FROM anc, pasien, pegawai, dokter WHERE anc.kodepasien=pasien.kodePasien AND pasien.id_pegawai=pegawai.id_pegawai AND dokter.kodeDokter=anc.kodedokter and (anc.abortus_jenis is null or anc.abortus_jenis='') ORDER BY anc.id_anc DESC");
					$no=1;
					while($r=mysqli_fetch_array($query)){
					?>					
						<tr bgcolor="#fff">
							<td align="center"><?php echo $no; ?></td><td><?php echo $r['nip']; ?></td><td style='width:75px;'><?php echo $r['nama_pegawai']; ?></td><td style='width:50px;'><?php echo $r['unit']; ?></td><td><?php echo $r['nama_dokter']; ?></td><td><?php echo tgl_indo($r['htp']); ?></td><td><?php echo tgl_indo($r['rekomendasi_cuti']); ?></td><td><?php echo tgl_indo($r['begincuti']); ?></td><td><?php echo tgl_indo($r['endcuti']); ?></td>
                             
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
			
			<?php	$query=mysqli_query($conn,"SELECT * FROM anc, pasien, pegawai, dokter WHERE anc.kodepasien=pasien.kodePasien AND pasien.id_pegawai=pegawai.id_pegawai AND dokter.kodeDokter=anc.kodedokter AND anc.rekomendasi_cuti BETWEEN '".$tgl1."' AND '".$tgl2."' AND pegawai.tgl_out='0000-00-00' AND (anc.abortus_jenis IS NULL or anc.abortus_jenis='') ORDER BY htp ASC");									
					
					$no=1;
					while($r=mysqli_fetch_array($query)){
					?>					
						<tr bgcolor="#fff">
							<td align="center"><?php echo $no; ?></td><td><?php echo $r['nip']; ?></td><td style='width:75px;'><?php echo $r['nama_pegawai']; ?></td><td style='width:50px;'><?php echo $r['unit']; ?></td><td><?php echo $r['nama_dokter']; ?></td>
							<td><?php echo tgl_indo($r['htp']); ?></td>
							<td><?php echo tgl_indo($r['rekomendasi_cuti']); ?></td>

							<?php
								$begincuti=$r['begincuti'];
								
								if ($begincuti=='0000-00-00')
									$begincuti='Belum Cuti';
									
								else
									$begincuti=tgl_indo($begincuti);
									
								?>
							<td><?php echo $begincuti; ?></td>
							 <?php
								$endcuti=$r['endcuti'];
								
								if ($endcuti=='0000-00-00')
									$endcuti='Belum Cuti';
									
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