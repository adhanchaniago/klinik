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
		<title>Laporan Data Abortus</title>
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
		<h2>DATA ABORTUS</h2>
		<table class="table" border="1px">
			<tr class="head">
				<td>NO. </td><td>NIK</td><td>NAMA</td><td>DEPART</td><td>PETUGAS KLINIK</td><td>ABORTUS</td><td>TGL ABORTUS</td><td>TEMPAT</td><td>PETUGAS RS</td><td>PENYEBAB</td>
			</tr>
			
			<?php	$query=mysqli_query($conn,"SELECT * FROM anc, pasien, pegawai, dokter WHERE anc.kodepasien=pasien.kodePasien AND pasien.id_pegawai=pegawai.id_pegawai AND dokter.kodeDokter=anc.abortus_petugas AND anc.abortus_date <= '".$tgl2."' AND pegawai.tgl_out='0000-00-00' AND anc.abortus_jenis IS NOT NULL ORDER BY anc.abortus_date ASC");									
					
					$no=1;
					while($r=mysqli_fetch_array($query)){
					?>					
						<tr bgcolor="#fff">
							<td align="center"><?php echo $no; ?></td><td><?php echo $r['nip']; ?></td><td style='width:75px;'><?php echo $r['nama_pegawai']; ?></td><td style='width:50px;'><?php echo $r['unit']; ?></td><td><?php echo $r['nama_dokter']; ?></td>
							<td><?php echo $r['abortus_jenis']; ?></td>
							<td><?php echo tgl_indo($r['abortus_date']); ?></td>
							<td><?php echo $r['abortus_oleh']; ?></td>
							<td><?php echo $r['abortus_from']; ?></td>
							<td><?php echo $r['abortus_reason']; ?></td>
							
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
				<td>NO. </td><td>NIK</td><td>NAMA</td><td>DEPART</td><td>PETUGAS KLINIK</td><td>ABORTUS</td><td>TGL ABORTUS</td><td>TEMPAT</td><td>PETUGAS RS</td><td>PENYEBAB</td>
			</tr>
			
			<?php	$query=mysqli_query($conn,"SELECT * FROM anc, pasien, pegawai, dokter WHERE anc.kodepasien=pasien.kodePasien AND pasien.id_pegawai=pegawai.id_pegawai AND dokter.kodeDokter=anc.abortus_petugas AND anc.abortus_date <= '".$tgl2."' AND pegawai.tgl_out='0000-00-00' AND anc.abortus_jenis IS NOT NULL ORDER BY anc.abortus_date ASC");									
					
					$no=1;
					while($r=mysqli_fetch_array($query)){
					?>					
						<tr bgcolor="#fff">
							<td align="center"><?php echo $no; ?></td><td><?php echo $r['nip']; ?></td><td style='width:75px;'><?php echo $r['nama_pegawai']; ?></td><td style='width:50px;'><?php echo $r['unit']; ?></td><td><?php echo $r['nama_dokter']; ?></td>
							<td><?php echo $r['abortus_jenis']; ?></td>
							<td><?php echo tgl_indo($r['abortus_date']); ?></td>
							<td><?php echo $r['abortus_oleh']; ?></td>
							<td><?php echo $r['abortus_from']; ?></td>
							<td><?php echo $r['abortus_reason']; ?></td>
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