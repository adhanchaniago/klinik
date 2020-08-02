<?php
	if($_GET['module']=='home'){
		?>
		<section>
		<div class="row-fluid">
			<div class="span4 pull-left">
				<div class="info_akses span12">
				<img src="img/logo.png" class="logo span12">
					<?php
					$fotouser=$rus['photo'];
					if(empty($fotouser)){
					?>
					<div style="background:url(photo_user/default.png) #fff center;background-size:cover;" class="foto pull-left"></div>
					<?php
					}
					else{
					?>
					<div style="background:url(<?php echo "photo_user/".$fotouser; ?>) center;background-size:cover;" class="foto pull-left"></div>
					<?php
					}
					?>
					<div class="span6 pull-left">
					<h4><i class="icon-info-sign icon-white"></i> Info Akses</h4>
					<div class="isi_akses">
					<span>Kode User</span>
						<span class="form"><?php echo $rus['kodeUser']; ?></span>
					
					<span>Nama Lengkap</span>
						<span class="form"><?php echo $rus['first_name']." ".$rus['last_name']; ?></span>
					
					<hr>
					<span><a data-toggle="modal" href="#myModal" class="btn btn-info btn-small">Ganti Photo</a>	</span>
						
					</div>
					</div>	

				</div>
				<hr>
				
				
				
				<!-- Modal -->
						<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							  <h3 id="myModalLabel">Ganti Photo</h3>
							</div>
							<div class="modal-body">
								<p>
								<?php
								$fotouser=$rus['photo'];
								if(empty($fotouser)){
								?>
								<div style="background:url(photo_user/default.png) center;background-size:cover;" class="fotos pull-left"></div>
								<?php
								}
								else{
								?>
								<div style="background:url(<?php echo "photo_user/".$fotouser; ?>) center;background-size:cover;" class="fotos pull-left"></div>
								<?php
								}
								?>
								<form method="post" action="upload_foto.php" enctype="multipart/form-data">
								<input type="hidden" name="kodeuser" value="<?php echo $rus['kodeUser']; ?>">
								<input type="file" name="fupload">
								</p>
							  
							</div>
							<div class="modal-footer">
							  <button class="btn" data-dismiss="modal">Close</button>
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  </form>
							</div>
						</div>
						<!-- End Modal -->
				</div>
			<div class="span8 thumb pull-right">
				<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>Selamat datang <strong><?php echo $rus['first_name']; ?></strong> <?php echo date('D m Y'); ?>.</div>							
					
					
					<ul class="thumbnails">
						<li class="span3">
							<a data-toggle="modal" href="#regist" class="thumbnail">
								<img src="img/regis.png" alt="">
                                
							</a>
						</li>
						
						
						<li class="span3">
							<a href="media.php?module=rekam_medik" class="thumbnail">
								<img src="img/rekam.png" alt="">
							</a>
						</li>
					
					</ul>
	
					<h5>KLINIK REPORT</h5>
                <ul class="thumbnails">
						<li class="span3">
							<a data-toggle="modal" href="#lapPenyakit" class="thumbnail">
								<img src="img/lap_1.png" alt="">
							</a>
						</li>
						<li class="span3">
							<a data-toggle="modal" href="#lapDiagnosis" class="thumbnail">
								<img src="img/lap_diagnosa.png" alt="">
							</a>
						</li>
                        <li class="span3">
							<a data-toggle="modal" href="#lapKonsep" class="thumbnail">
								<img src="img/lap_2.png" alt="">
							</a>
						</li>
                    <li class="span3">
							<a data-toggle="modal" href="#lapPeriksa" class="thumbnail">
								<img src="img/lap_6.png" alt="">
							</a>
						</li>
                        
                </ul>
                <ul class="thumbnails">
					<li class="span3">
							<a data-toggle="modal" href="#lapObat" class="thumbnail">
								<img src="img/lap_4.png" alt="">
							</a>
						</li>	
                    <li class="span3">
							<a data-toggle="modal" href="#lapRm" class="thumbnail">
								<img src="img/lap_5.png" alt="">
							</a>
						</li>
						
                </ul>
				<h5>HRD REPORT</h5>
				<ul class="thumbnails">
					
						<li class="span3">
							<a data-toggle="modal" href="#lapRekomendasiCuti" class="thumbnail">
								<img src="img/lap_8.png" alt="">
							</a>
						</li>
						<li class="span3">
							<a data-toggle="modal" href="#lapIbuHamil" class="thumbnail">
								<img src="img/lap_7.png" alt="">
							</a>
						</li>
						
						<li class="span3">
							<a data-toggle="modal" href="#lapAbortus" class="thumbnail">
								<img src="img/lap_9.png" alt="">
							</a>
						</li>
                </ul>
                <div class="control-group">
                        <hr>
						<h4>-----------------------------------------------------------------------</h4>
                        <h4>Data Ibu Hamil Rekomendasi Cuti Bulan Ini</h4>
						<h4>-----------------------------------------------------------------------</h4>
                        <table class="table table-bordered table-striped">
						
						<thead>
						<tr>
							<th>No</th>
							<th align="center">NIK</th>
							<th align="center">Nama</th>
                            <th align="center">Unit</th>
							<th align="center">HPL</th>
							<th align="center">Rekomendasi</th>
							<th align="center">Awal Cuti</th>
							<th align="center">Akhir Cuti</th>
							<th align="center">Telah Diperiksa</th>
						</tr>
						</thead>
						<tbody>
                    <?php
						
                        $query=mysqli_query($conn,"SELECT * FROM anc, pasien, pegawai WHERE pegawai.id_pegawai=pasien.id_pegawai AND anc.kodepasien=pasien.kodePasien and date_format(rekomendasi_cuti,'%m%y')=date_format(curdate(),'%m%y') and pegawai.tgl_out='0000-00-00' and (anc.abortus_jenis is null or anc.abortus_jenis='')ORDER BY rekomendasi_cuti ASC ");
                        $no=1;
                        while($rranc=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>    
                            <td><?php echo $rranc['nip']; ?></td>
                            <td><?php echo $rranc['nama_pegawai']; ?></td>    
                            <td><?php echo $rranc['unit']; ?></td>    
                            <td><?php echo tgl_indo($rranc['htp']); ?></pre></td>    
                            <td><?php echo tgl_indo($rranc['rekomendasi_cuti']); ?></pre></td> 
							
							<td>
                            <?php
								$begincuti=$rranc['begincuti'];
								
								if ($begincuti=='0000-00-00')
									echo '<p style="color:red">Belum Cuti</p>';
								else
									echo $begincuti=tgl_indo($begincuti);
								
								?>
							</pre></td>
							
							<td>
							 <?php
								$endcuti=$rranc['endcuti'];
								
								if ($endcuti=='0000-00-00')
									echo '<p style="color:red">Belum Cuti</p>';
									
								else
									echo $endcuti=tgl_indo($endcuti);
									
								?>
                            </pre></td>
							<td> 
							  <?php
							  $nip=$rranc['nip'];
							  $nomorAnc=$rranc['nomorAnc'];
								$sql = "SELECT COUNT(id_ranc) as rekam FROM rekamanc WHERE nip='$nip' and nomorAnc='$nomorAnc'";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_array($result);
								$rekam = $row[rekam];
								if ($rekam > 0)
									echo '<p style="color:green">YES</p>';
								else
									echo '<p style="color:red">NO</p>';
								?>
							</td>
							<td>
							<div class="control-group">
								<div class="controls">								
								<button type="button" class="btn btn-success" onclick="window.location='media.php?module=anc&&status=pasien&&kodepasien=<?php echo $rranc['kodePasien'] ?>'"><i class="icon-ok-circle icon-white"></i> Lihat</button>
								</div>
							</div>
							</td>
                        </tr>
                    <?php
                            $no++;
                        }
                    ?>
                        </tbody>
                        </table>
                    </div>
                <!--<ul class="thumbnails">
						<li class="span3">
							<a data-toggle="modal" href="#lapPasien" class="thumbnail">
								<img src="img/lap_pasien.png" alt="">
							</a>
						</li>
<li class="span3">
							<a data-toggle="modal" href="#lapRawatinap" class="thumbnail">
								<img src="img/lap_3.png" alt="">
							</a>
						</li>
                        <li class="span3">
							<a data-toggle="modal" href="#lapRm" class="thumbnail">
								<img src="img/lap_rekam.png" alt="">
							</a>
						</li>
						<li class="span3">
							<a data-toggle="modal" href="#lapDokter" class="thumbnail">
								<img src="img/lap_dokter.png" alt="">
							</a>
						</li>
						<li class="span3">
							<a href="laporan/f_dataobat.php" target="_blank" class="thumbnail">
								<img src="img/lap_obat.png" alt="">
							</a>
						</li>
					
						
						
					</ul>
                    -->
				
				
					<!-- tombol untuk memicu modal -->
						
				    <div id="lapPenyakit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Penyakit</h3>
								<form method="get" action="laporan/f_penyakit.php" target="_blank">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>   
                 <div id="lapDiagnosis" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Diagnosa</h3>
								<form method="get" action="laporan/f_diagnosis.php" target="_blank">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>   
                        <div id="lapKonsep" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Konsultasi Dokter Spesial</h3>
								<form method="get" action="laporan/f_konsep.php" target="_blank">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div> 
                <div id="lapPeriksa" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Pemeriksaan</h3>
								<form method="get" action="laporan/f_pemeriksaan.php" target="_blank">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div> 
                
               <!-- <div id="lapPoli" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Kunjungan di Poliklinik</h3>
								<form method="get" action="laporan/f_poli.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>  
                
                -->
                    <div id="lapRawatinap" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Rawat Inap</h3>
								<form method="get" action="laporan/f_rawatinap.php" target="_blank">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>  
                
                <div id="lapObat" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Obat</h3>
								<form method="get" action="laporan/f_obat.php" target="_blank">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                 
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>  
                
                
						<!-- Modal -->
						<div id="lapDokter" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<a href="laporan/f_datadok.php" target="_blank">LAORAN DATA DOKTER</a><p>
								<a href="laporan/f_jaddok.php" target="_blank">LAORAN JADWAL DOKTER</a>
							</div>
							
						</div>   
                        
						 
						
						<!-- Modal -->
						<div id="lapPasien" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Periode</h3>
								<form method="get" action="laporan/f_datapas.php" target="_blank">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>   
                
                <div id="lapRm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Periode Kunjungan Pasien</h3>
								<form method="get" action="laporan/f_rekammedik.php" target="_blank">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2">
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>   
                 <div id="lapIbuHamil" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
							<div class="modal-body center">
								<h3>Data Ibu Hamil</h3>
                                <a data-toggle="modal" href="#lapIbuHamilOutstanding" >
								    <img src="img/outstanding.png">
                                </a>
                                <a data-toggle="modal" href="#lapIbuHamilAlldata">
                                    <img src="img/alldata.png">
                                </a>
							</div>
							
						</div>   
                 
					<div id="lapIbuHamilOutstanding" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
							<div class="modal-body">
								<h3>Data ibu hamil - Outstanding</h3>
								<form method="get" action="laporan/f_ibuhamiloutstanding.php" target="_blank">
									
									<input type="date" name="tgl2"><p>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>
					<div id="lapIbuHamilAlldata" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
							<div class="modal-body">
								<h3>Data ibu hamil - All Data</h3>
								<form method="get" action="laporan/f_ibuhamilalldata.php" target="_blank">
									<input type="date" name="tgl2"><p>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>							
					<div id="lapRekomendasiCuti" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
							<div class="modal-body">
								<h3>Rekomendasi Cuti :</h3>
								<form method="get" action="laporan/f_rekomendasicuti.php" target="_blank">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2">
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div> 
								
					<div id="lapAbortus" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
							<div class="modal-body">
								<h3>Data Abortus </h3>
								<form method="get" action="laporan/f_abortus.php" target="_blank">
									<input type="date" name="tgl2"><p>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>	
						
                <div id="regist" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body center">
								<h3>Registrasi Pasien</h3>
                                <a href="media.php?module=data_pasien&&act=tambah_pasien">
								    <img src="img/addpas.png">
                                </a>
                                <a href="media.php?module=tanggungan&&act=tambah">
                                    <img src="img/addtang.png">
                                </a>
							</div>
							
						</div>   
						
			</div>
		</div>
	</section>
		<?php
	}
	elseif($_GET['module']=='data_user'){
        if($akses=='3'){
		  include("mod_datauser/data_user.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='data_pasien'){
        if($akses=='3' or $akses=='0'){
		  include("mod_pasien/pasien.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='dokter'){
		
        if($akses=='3'){
		  include("mod_dokter/dokter.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='jadwal_dok'){
		
        if($akses=='3'){
		  include("mod_dokter/jadwal_dok.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='tarif_dok'){
        if($akses=='3'){
		  include("mod_dokter/tarif_dok.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='tindakan'){
        if($akses=='3'){
		  include("mod_tindakan/tindakan.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='dataobat'){
        if($akses=='3'){
		  include("mod_dataobat/dataobat.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='rekam_medik'){
		
        if($akses=='3'){
		  include("mod_rm/rekam_medik.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='anc'){
		
        if($akses=='3' or $akses=='0'){
		  include("mod_anc/anc.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='apotek'){
        if($akses=='3'){
		  include("mod_apotek/apotek.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='tanggungan'){
        if($akses=='3'){
		  include("mod_tanggungan/tanggungan.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
    elseif($_GET['module']=='pegawai'){
        if($akses=='3' or $akses=='0'){
		  include("mod_pegawai/pegawai.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
		
	}
	elseif($_GET['module']=='diagnosis'){
        if($akses=='3'){
		  include("mod_diagnosis/diagnosis.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='keluar'){
		session_start();
		session_destroy();
		header("location:index.php");
	}
?>