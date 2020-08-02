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
                    echo tgl_indo($tgl1)." s/d ".tgl_indo($tgl2);
                }
                ?>
            
            </h6>
                </div>
		</div>
		
            <div class="batas"></div>
            <?php
			
			if($tgl1=='' AND $tgl2!=''){
		?>
		<table class="table" border="1px">
			<tr  class="head">
				<td>NO. </td><td>NIK</td><td>NAMA</td><td>DEPART</td><td>PETUGAS</td><td>HPL</td><td>REKOMENDASI CUTI</td>
			</tr>
			
			<?php										
					$query=mysqli_query($conn,"SELECT * FROM anc, pasien, pegawai, dokter WHERE anc.kodepasien=pasien.kodePasien AND pasien.id_pegawai=pegawai.id_pegawai AND dokter.kodeDokter=anc.kodedokter AND anc.datecreated <= '".$tgl2."' AND pegawai.tgl_out='0000-00-00' AND anc.begincuti='0000-00-00' ORDER BY rekomendasi_cuti ASC");	
					$no=1;
					while($r=mysqli_fetch_array($query)){
					?>					
						<tr bgcolor="#fff">
							<td align="center"><?php echo $no; ?></td><td><?php echo $r['nip']; ?></td><td style='width:100px;'><?php echo $r['nama_pegawai']; ?></td><td style='width:75px;'><?php echo $r['unit']; ?></td><td><?php echo $r['nama_dokter']; ?></td><td><?php echo tgl_indo($r['htp']); ?></td><td><?php echo tgl_indo($r['rekomendasi_cuti']); ?></td>
                             
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
				<td>NO. </td><td>NIK</td><td>NAMA</td><td>DEPART</td><td>PETUGAS</td><td>HPL</td><td>REKOMENDASI CUTI</td>
			</tr>
			
			<?php	$query=mysqli_query($conn,"SELECT * FROM anc, pasien, pegawai, dokter WHERE anc.kodepasien=pasien.kodePasien AND pasien.id_pegawai=pegawai.id_pegawai AND dokter.kodeDokter=anc.kodedokter AND anc.htp BETWEEN '".$tgl1."' AND '".$tgl2."' AND pegawai.tgl_out='0000-00-00' AND anc.begincuti='0000-00-00' ORDER BY rekomendasi_cuti ASC");									
					
					$no=1;
					while($r=mysqli_fetch_array($query)){
					?>					
						<tr bgcolor="#fff">
							<td align="center"><?php echo $no; ?></td><td><?php echo $r['nip']; ?></td><td style='width:100px;'><?php echo $r['nama_pegawai']; ?></td><td style='width:75px;'><?php echo $r['unit']; ?></td><td><?php echo $r['nama_dokter']; ?></td>
							<td><?php echo tgl_indo($r['htp']); ?></td>
							<td><?php echo tgl_indo($r['rekomendasi_cuti']); ?></td>

							
							
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