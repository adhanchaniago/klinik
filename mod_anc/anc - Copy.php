<?php
$aksi="mod_anc/aksi_anc.php";
switch($_GET['act']){
	default:
	?>
	<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#txtkdpasien").keyup(function() {
		   var strcari = $("#txtkdpasien").val();
		   if (strcari != "")
		   {
			$("#hasil").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_anc/cari_pasien.php",
			 data:"q="+ strcari,
			 success: function(data){
			 $("#hasil").css("display", "block");
			  $("#hasil").html(data);			  
			 }
			});
		   }
		   else{
		   $("#hasil").css("display", "block");
		   }
		  });
	
		   $("#txtdos").click(function() {
		   var strdok = $("#txtdok").val();
		   if (strdok != "")
		   {
			$("#tampil").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_anc/caridok.php",
			 data:"q="+ strdok,
			 success: function(data){
			 $("#tampil").css("display", "block");
			  $("#tampil").html(data);			  
			 }
			});
		   }
		   else{
		   $("#tampil").css("display", "block");
		   }
		  });
		  
		  
		  
		  
		
		  $("#txtobat").click(function() {
		   var strobat = $("#txtobat").val();
		   if (strobat != "")
		   {
			$("#hasils").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_anc/input_obat.php",
			 data:"q="+ strobat,
			 success: function(data){
			 $("#hasils").css("display", "block");
			$("#inpt").css("display", "block");
			  $("#hasils").html(data);			  
			 }
			});
		   }
		   else{
		   $("#hasils").css("display", "block");
		   
		   
		   }
		  });
             
             $("#tindakan").click(function() {
		   var strtindakan = $("#tindakan").val();
		   if (strtindakan != "")
		   {
			$("#hasil_tindakan").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_anc/tindakan.php",
			 data:"q="+ strtindakan,
			 success: function(data){
			 $("#hasil_tindakan").css("display", "block");
			  $("#hasil_tindakan").html(data);			  
			 }
			});
		   }
		   else{
		   $("#hasil_tindakan").css("display", "block");
		   
		   
		   }
		  });
		 
			});
	</script>
	<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#tanggal").keyup(function() {
		   var strtgl = $("#tanggal").val();
		   if (strtgl != "")
		   {		  
			$("#xrekomendasi_cuti").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_anc/cuti.php",
			 data:"q="+ strtgl,
			 success: function(data){
			 $("#xrekomendasi_cuti").css("display", "block");
			  $("#xrekomendasi_cuti").html(data);
			 
			 }
			});
		   }
		   else{
		   $("#xrekomendasi_cuti").css("display", "none");
		   }
		  });
			});
	</script>
	<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#tanggal").keyup(function() {
		   var strtgl = $("#tanggal").val();
		   if (strtgl != "")
		   {		  
			$("#hasil_umur").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_anc/cuti.php",
			 data:"q="+ strtgl,
			 success: function(data){
			 $("#hasil_umur").css("display", "block");
			  $("#hasil_umur").html(data);
			 
			 }
			});
		   }
		   else{
		   $("#hasil_umur").css("display", "none");
		   }
		  });
			});
	</script>
	<section>
		<div class="row-fluid">
			<div class="span2 pull-left">
				<div class="span12" style="background:#fff;">
				
				<?php
				$kode=$_GET['kodepasien'];
				$nip=$_GET['nip'];
                $status=$_GET['status'];
				if($kode!='' AND $status=='pasien'){
				$qupas=mysqli_query($conn,"SELECT * FROM pasien, pegawai WHERE pasien.id_pegawai=pegawai.id_pegawai AND pasien.kodePasien='$kode' ");
				$rpas=mysqli_fetch_array($qupas);
				?>
					<div class="control-group">				
								<div class="rm_text">
									<div class="controls">
									<input type="text" class="span12" id="txtkdpasien" value="<?php echo $rpas['kodePasien']." / ".$rpas['nip'] ?>" disabled>
									</div>
								</div>
							</div>
							
							<div class="control-group">
							<div class="controls">								
								<button class="btn btn-info" data-toggle="tab" href="#tab2"><i class="icon-chevron-right icon-white"></i> Add Data ANC</button>
								<hr>
							</div>
						</div>
							<div class="rm_info">
                                <div class="control-group">
								<label class="control-label" for="inputText">NIK</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $rpas['nip']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Nama Lengkap</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $rpas['nama_pegawai']; ?>" disabled>
								</div>
							</div>
                                <div class="control-group">
								<label class="control-label" for="inputText">Department</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $rpas['unit']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Jenis Kelamin</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText"  value="<?php echo $rpas['jk']; ?>" disabled>
								</div>
							</div>
                                <?php
                                    $tgl=$rpas['tgl_lhr'];
                                	$ambil_thn=substr($tgl,0,4);
                                    $thn_sekarang=date('Y');
                                    $umur=$thn_sekarang-$ambil_thn;
                                ?>
							<div class="control-group">
								<label class="control-label" for="inputText">Umur</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $umur." Tahun"; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Alamat</label>
								<div class="controls">
								<textarea class="span12" disabled><?php echo $rpas['alamat']; ?></textarea>
								</div>
							</div>
							
							
							</div>						
				<?php
				}
                elseif($kode!='' AND $status=='tanggungan'){
                $qupas=mysqli_query($conn,"SELECT * FROM tanggungan, pegawai_kel, pegawai WHERE tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.nip_pegawai=pegawai.nip AND tanggungan.kodeTanggungan='$kode'");
				$rpas=mysqli_fetch_array($qupas);
				?>
					<div class="control-group">				
								<div class="rm_text">
									<div class="controls">
									<input type="text" class="span12" id="txtkdpasien" value="<?php echo $rpas['kodeTanggungan']; ?>" disabled>
									</div>
								</div>
							</div>
							<div class="rm_info">
                                
							<div class="control-group">
								<label class="control-label" for="inputText">Nama Pasien</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $rpas['nama_kpeg']; ?>" disabled>
								</div>
							</div>
                                <div class="control-group">
								<label class="control-label" for="inputText">Status</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="Tanggungan" disabled>
								</div>
							</div>
                                <div class="control-group">
								<label class="control-label" for="inputText">Nama Penanggung</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $rpas['nama_pegawai']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Jenis Kelamin</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText"  value="<?php echo $rpas['jk_kpeg']; ?>" disabled>
								</div>
							</div>
                                <?php
                                    $tgl_lhr=$rpas['tgllahir_kpeg'];
                                	$ambil_thn=substr($tgl_lhr,0,4);
                                    $thn_sekarang=date('Y');
                                    $umur=$thn_sekarang-$ambil_thn;
                                ?>
							<div class="control-group">
								<label class="control-label" for="inputText">Umur</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $umur." Tahun"; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Alamat</label>
								<div class="controls">
								<textarea class="span12" disabled><?php echo $rpas['alamat']; ?></textarea>
								</div>
							</div>
							
							
							</div>   
                <?php
                }
                
				else{
				?>
				<div class="control-group">						
								<div class="rm_text">
									<div class="controls">
									<input type="text" class="span12" id="txtkdpasien" placeholder="Cari NIK/Nama/Kode Pasien">
									</div>
								</div>
							</div>
				<?php
				}
				?>
				</div>
			
				</div>
			<div class="span10 thumb pull-right">
				<?php
				if(isset($kode)){
				$querm=mysqli_query($conn,"SELECT * FROM anc");
				$num=mysqli_num_rows($querm);
				$jmlh=$num+1;
				$waktu=date('dmy');
				$nounik="ANC-".$waktu.$jmlh;
				?>
				<div class="tabbable" style="margin-bottom: 18px;">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab"><span class="fa fa-medkit"></span> Data Rekam ANC</a></li>
						<li><a href="#racikObt" data-toggle="tab"><span class="fa fa-refresh"></span> Racik Obat</a></li>
                        <li><a href="media.php?module=anc&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>"><span class="fa fa-refresh"></span> Reload</a></li>
                        
                        <li><a href="media.php?module=rekam_anc"><span class="fa fa-close"></span> Exit</a></li>
					</ul>
			<div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
					<?php
						$bukadiag=$_GET['diagnosa'];
						$koderm=$_GET['koderm'];
						if($bukadiag=='on'){
						?>
						<div class="tab-pane active" id="tab3">
						<div class="control-group">
						<?php
						$qkel=mysqli_query($conn,"SELECT * FROM rekamanc WHERE nomorRanc='$koderm'");
						$rkel=mysqli_fetch_array($qkel);
						?>
						<form method="post" action="<?php echo $aksi."?module=ubah_diag" ?>">
						<input type="hidden" name="t1" value="<?php echo $rkel['nomorRanc'] ?>">
						<input type="hidden" name="kode" value="<?php echo $kode; ?>">
						<div class="control-group">
									<label class="control-label" for="inputEmail">Keluhan</label>
									<div class="controls">
                                    <input type="hidden" name="status" value="<?php echo $status; ?>">
									<textarea class="span8" name="t4" disabled><?php echo $rkel['keluhan'];?></textarea>
									</div>
						</div>
						<div class="control-group">
									<label class="control-label" for="inputEmail">Diagnosa</label>
									<div class="controls">
									<select name="diagnosis">
										<option>Pilih Diagnosa</option>
										<?php
										$qdiagnosa=mysqli_query($conn,"SELECT * FROM diagnosis");
										while($rdiagnosa=mysqli_fetch_array($qdiagnosa)){
										?>
										<option value="<?php echo $rdiagnosa['id_diagnosis']; ?>"><?php echo $rdiagnosa['nama_diagnosis']; ?><?php echo ' ->'; ?><?php echo $rdiagnosa['ket']; ?></option>
										<?php
										}
										?>
									</select>
									</div>
						</div>
						<div class="control-group">
									<label class="control-label" for="inputEmail">Keterangan Diagnosa Tambahan</label>
									<div class="controls">
									<textarea class="span8" name="t2"></textarea>
									</div>
						</div>
						
                            <div class="control-group">
									<label class="control-label" for="inputEmail">Organ Penyakit</label>
									<div class="controls">
									<select name="penyakit">
										<option>Pilih Penyakit</option>
										<?php
										$qtind=mysqli_query($conn,"SELECT * FROM penyakit");
										while($rtind=mysqli_fetch_array($qtind)){
										?>
										<option value="<?php echo $rtind['id_penyakit']; ?>"><?php echo $rtind['nama_penyakit']; ?></option>
										<?php
										}
										?>
									</select>
									</div>
						</div>
						<div class="control-group">
									<label class="control-label" for="inputEmail">Tindakan</label>
									<div class="controls">
									<select name="t3" id="tindakan">
										<option>Pilih Tindakan</option>
										<?php
										$qtind=mysqli_query($conn,"SELECT * FROM tindakan");
										while($rtind=mysqli_fetch_array($qtind)){
										?>
										<option value="<?php echo $rtind['id_tindakan']; ?>"><?php echo $rtind['nm_tindakan']; ?></option>
										<?php
										}
										?>
									</select>
									</div>
						</div>
                            <div id="hasil_tindakan"></div>
									<div class="controls">								
									<button class="btn btn-danger" data-toggle="tab"   onclick="window.location='media.php?module=anc&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>'"><i class="icon-arrow-left icon-white"></i> Back</button>
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
									</div>
									</form>
								</div>
						
						</div>
						<?php
						}
                    
						else{
						$inobat=$_GET['input_obat'];
						if($inobat=='on'){
						?>
						<button type="button" data-toggle="tab" class="btn btn-danger"  onclick="window.location='media.php?module=anc&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>'"><i class="icon-arrow-left icon-white"></i> Back</button>
						<hr>
					<div class="tab-pane active" id="tab4">
					<div class="span2">
					<?php
					$query4=mysqli_query($conn,"SELECT * FROM rekammedik, dokter WHERE rekammedik.nomorRm='$koderm' AND dokter.kodeDokter=rekammedik.kodedokter ORDER BY rekammedik.id_rm DESC");
					$r=mysqli_fetch_array($query4);
					?>					
					<div class="control-group">
		<label class="control-label" for="inputEmail">Keluhan</label>
			<div class="controls">
				<textarea class="span12" disabled><?php echo $r['keluhan']; ?></textarea>
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputEmail">Pemeriksaan Fisik</label>
			<div class="controls">
				<textarea class="span12" disabled><?php echo $r['pemeriksaan_fisik']; ?></textarea>
				
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputEmail">Diagnosa</label>
		<?php 
                            $diagnosa=$r['id_diagnosis'];
                            $querydiagnosa=mysqli_query($conn,"SELECT * FROM diagnosis WHERE id_diagnosis='$diagnosa'");
                            $rdiagnosa=mysqli_fetch_array($querydiagnosa);
                           
                            ?>
			<div class="controls">
				<textarea class="span12" disabled><?php echo $rdiagnosa['nama_diagnosis']; ?> &nbsp -> <?php echo $rdiagnosa['ket']; ?></textarea>
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputEmail">Tindakan</label>
		<?php 
                            $tindakan=$r['tindakan'];
                            $querytindakan=mysqli_query($conn,"SELECT * FROM tindakan WHERE id_tindakan='$tindakan'");
                            $rtindakan=mysqli_fetch_array($querytindakan);
                           
                            ?>
			<div class="controls">
				<textarea class="span12" disabled><?php echo $rtindakan['nm_tindakan']; ?> &nbsp -> <?php echo $rtindakan['ket']; ?></textarea>
			</div>
	</div>
	
	
	
	<div class="control-group">
		<label class="control-label" for="inputEmail">Petugas Medis / Dokter</label>
			<div class="controls">
				<input type="text" class="span12" value="<?php echo $r['nama_dokter']; ?>" disabled>
			</div>
	</div>
</div>
						</div>
						<div class="span10 pull-right" id="inpt">
						<div class="control-group pull-left">
				<label class="control-label" for="inputEmail">Pilih Obat</label>									
				<div class="controls pull-left">
				<select name="t3" id="txtobat">
				<option> Nama Obat</option>
				<?php
					$qtind=mysqli_query($conn,"SELECT * FROM obat ORDER BY nama_obat ASC");
					while($rtind=mysqli_fetch_array($qtind)){								
				?>
				<option value="<?php echo $rtind['id_obat']; ?>"><?php echo $rtind['nama_obat']; ?></option>				
				<?php
					}
				?>
			</select>				
			</div>
			</div>		
			<form method="post" action="mod_anc/aksi_inputob.php?module=tambah">
			<input type="hidden" class="span3" value="<?php echo $koderm; ?>" name="t1">	
			<input type="hidden" class="span10" value="<?php echo $rus['kodeUser']; ?>" name="t7">
<div id="hasils" class="pull-left span8"></div>			
			</form>
			</div>
					<div class="span10">
					<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>#</th>
							<th align="center">Nomor RM</th>
							<th align="center">Nama Obat</th>
							<th align="center">Bentuk Obat</th>
							<th align="center">Tgl Expired</th>
							<th align="center">Ambil</th>
							
							<th align="center"></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$qobt=mysqli_query($conn,"SELECT * FROM tmp_obat, obat WHERE tmp_obat.kdrm='$koderm' AND obat.id_obat=tmp_obat.kdobat ORDER BY tmp_obat.id_temp DESC");
						$no=1;
						while($robt=mysqli_fetch_array($qobt)){
						
						?>
						<tr bgcolor="#fff">
							<td><?php echo $no; ?></td>
							<td><?php echo $robt['kdrm']; ?></td>
							<td><?php echo $robt['nama_obat']; ?></td>
							<td><?php echo $robt['bentuk']; ?></td>
							<td><?php echo tgl_indo($robt['expired_date']); ?></td>
							
							<td><?php echo $robt['ambil']; ?></td>
							
							<td><button class="btn btn-danger" onclick="window.location='mod_anc/aksi_inputob.php?module=delete&&idtemp=<?php echo $robt['id_temp']; ?>&&ambil=<?php echo $robt['ambil'] ?>&&idobat=<?php echo $robt['kdobat']; ?>'"><i class="icon-trash icon-white"></i></button></td>
						</tr>
						<?php
						$no++;
						}
						?>
						<tr>
							<td colspan="4"></td>
							<td colspan="2">Total Obat<b> 							
							<?php 
							$jmlh=mysqli_num_rows($qobt);
							echo $jmlh;
							?>
							</b></td>
						</tr>
						</tbody>
					</table>
					</div>
						<?php
						}
						else{
						?>
						
					<div class="tab-pane active" id="tab1">
					
					
						<div class="control-group">
							<div class="controls">								
								<button class="btn btn-info" data-toggle="tab" href="#tab2"><i class="icon-chevron-right icon-white"></i> Input Data ANC</button>
								<hr>
							</div>
						</div>
					
						<table class="table table-bordered table-striped">
						<caption> Data Rekam ANC </caption>
						<thead>
						<tr>
							<th>#</th>
							<th align="center">Nomor RANC</th>
							<th align="center">Petugas Medis</th>
							<th align="center">Data Subyektif</th>
							<th align="center">TD (MMhg)</th>
							<th align="center">BB (Kg)</th>
							<th align="center">UK (Mg)</th>
							<th align="center">TFU (Cm)</th>
							<th align="center">Latak Janin</th>
							<th align="center">DJJ</th>
							<th align="center">LAB</th>
							<th align="center">Pemeriksaan</th>
							<th align="center">Analisa</th>
							<th align="center">Penatalaksaan</th>
							<th align="center">Tgl Periksa</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$qrm=mysqli_query($conn,"SELECT * FROM rekamanc, dokter WHERE rekamanc.kodepasien='$kode' AND dokter.kodeDokter=rekamanc.kodedokter ORDER BY rekamanc.id_ranc DESC");
						$no=1;
						while($rrm=mysqli_fetch_array($qrm)){
						
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $rrm['nomorRanc']; ?></td>
							<td><?php echo $rrm['nama_dokter']; ?></td>
							<td><?php echo $rrm['data_subyektif']; ?></td>
							<td><?php echo $rrm['td']; ?></td>
							<td><?php echo $rrm['bb']; ?></td>
							<td><?php echo $rrm['uk']; ?></td>
							<td><?php echo $rrm['tfu']; ?></td>
							<td><?php echo $rrm['letak_janin']; ?></td>
							<td><?php echo $rrm['djj']; ?></td>
							<td><?php echo $rrm['lab']; ?></td>
							<td><?php 
                            $diagnosa=$rrm['id_diagnosis'];
                            $querydiagnosis=mysqli_query($conn,"SELECT * FROM diagnosis WHERE id_diagnosis='$diagnosa'");
                            $rdiagnosis=mysqli_fetch_array($querydiagnosis);
                            echo $rdiagnosis['nama_diagnosis'];
                            ?></td>
							<td>
							<?php
							$dig=$rrm['diagnosa'];
							if($dig=='-'){
								?>
								<button type="button" data-toggle="tab" class="btn btn-warning"  onclick="window.location='media.php?module=anc&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>&&diagnosa=on&&koderm=<?php echo $rrm['nomorRm'] ?>'"><span class="fa fa-stethoscope"></span> Diagnosa Sekarang</button>
								<?php
							}
							else{
								echo $dig;
							}
							?>							
							</td>
							<td>
                                <?php
                                $qil=mysqli_query($conn,"SELECT * FROM tmp_obat, rekamanc WHERE rekamanc.nomorRanc=tmp_obat.kdranc");
                                $num_obt=mysqli_num_rows($qil);
                                if($num_obt>=1){
                                   ?>
                                <button class="btn btn-warning" data-toggle="tab" href="#tab4" onclick="window.location='media.php?module=anc&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>&&input_obat=on&&koderm=<?php echo $rrm['nomorRm']; ?>'"><i class="icon-tint icon-white"></i> Obat Pasien</button>
                            <?php 
                                }
                            else{
                                ?>
                                <button class="btn btn-success" data-toggle="tab" href="#tab4" onclick="window.location='media.php?module=anc&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>&&input_obat=on&&koderm=<?php echo $rrm['nomorRm']; ?>'"><i class="icon-tint icon-white"></i> Obat Pasien</button>
                            <?php
                            }
                            ?>
                            </td>
							<td><?php 
                            $tin=$rrm['tindakan'];
                            $querytin=mysqli_query($conn,"SELECT * FROM tindakan WHERE id_tindakan='$tin'");
                            $rti=mysqli_fetch_array($querytin);
                            echo $rti['nm_tindakan'];
                            ?></td>
							<td><?php echo tgl_indo($rrm['tgl']); ?></td>
							<td> <button class="btn btn-danger" onclick="window.location='mod_anc/aksi_rm.php?module=hapus_rm&&id_rm=<?php echo $rrm['id_rm']; ?>&&kode=<?php echo $kode; ?>&&status=pasien'"><i class="icon-trash icon-white"></i></button></td>
							
							
						</tr>
						<?php
						$no++;
						}
						?>
						
						</tbody>
					</table>
					
					</div>	
    				
					
<?php
}
}
                    $qrm=mysqli_query($conn,"SELECT * FROM rekammedik, dokter, pasien_tanggungan, pasien WHERE pasien_tanggungan.kodepasien=pasien.kodePasien AND pasien.kodePasien='$kode' AND rekammedik.kodepasien=pasien_tanggungan.kode_tang AND dokter.kodeDokter=rekammedik.kodedokter ORDER BY rekammedik.id_rm DESC");
                    ?>
			
						<div class="tab-pane" id="tab6">
						<button type="button" data-toggle="tab" class="btn btn-danger"  onclick="window.location='media.php?module=anc&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>'"><i class="icon-chevron-left icon-white"></i> Back</button>
						<hr>
						<form method="post" action="<?php echo $aksi."?module=tambah_tang" ?>">
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Pilih Tanggungan :</label>
									<div class="controls">
										<select name="t2">
											<option selected disabled>Pilih Tanggungan :</option>
											<?php
												$quetang=mysqli_query($conn,"SELECT * FROM pasien_tanggungan WHERE kodepasien='$kode'");
												while($rtang=mysqli_fetch_array($quetang)){
											?>
												<option value="<?php echo $rtang['kode_tang']; ?>"><?php echo $rtang['nama_tang']; ?></option>
											<?php
											}
											?>									
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">Nomor Rekam Medik</label>
									<div class="controls">
									<input type="text" class="span8" value="<?php echo $nounik ?>" disabled>
									<input type="hidden" class="span8" value="<?php echo $nounik ?>" name="t1">
									
									<input type="hidden" class="span8" value="<?php echo $rus['kodeUser'] ?>" name="t8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">Masukkan Keluhan :</label>
									<div class="controls">
									<textarea class="span8" name="t4"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">Petugas Medis Yang Menangani</label>
									<div class="controls">
									<select name="" id="txtdok" class="span8">
										<option disabled selected>Pilih</option>
										<?php
										$querdok=mysqli_query($conn,"SELECT * FROM dokter");
										while($rdok=mysqli_fetch_array($querdok)){
										?>
										<option value="<?php echo $rdok['kodeDokter']; ?>"><?php echo $rdok['nama_dokter']; ?></option>
										<?php
										}
										?>
									</select>
									</div>																
								</div>																
								<div class="control-group">
									<div class="controls">								
									<button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
									</div>
								</div>
							</div>							
							<div class="span4">								
								<div id="tampil"></div>
								
							</div>	
						</form>							
						</div>		
						
						
						<div class="tab-pane" id="racikObt">
				    <div class="control-group">
                        <h4>Racik Obat</h4>
                        <button class="btn btn-info" data-toggle="tab" href="#addRacik"><i class="icon-chevron-right icon-white"></i> Tambah Racik Obat</button>
                        <table class="table table-bordered table-striped">
						<caption> Data Racik Obat </caption>
						<thead>
						<tr>
							<th>#</th>
                            <th align="center">Kode Resep</th>
							<th align="center">Nama Obat</th>
							<th align="center">Racikkan</th>
							<th align="center">Aturan Pakai</th>
							<th align="center">Harga</th>
							<th align="center">Pengambil Obat</th>
							<th align="center">Petugas Apotek</th>
							<th align="center">Dokter / Petugas Medis</th>
							<th align="center">Tanggal</th>
                            <th></th>
						</tr>
						</thead>
						<tbody>
                    <?php
                        $query=mysqli_query($conn,"SELECT * FROM racik_obat WHERE kodePasien='$kode' ORDER BY id_racik DESC");
                        $no=1;
                        while($r=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>    
                            <td><pre><?php echo $r['kode_resep']; ?></pre></td>    
                            <td><pre><?php echo $r['nama_obat']; ?></pre></td>    
                            <td><pre><?php echo $r['racik']; ?></pre></td>    
                            <td><pre><?php echo $r['aturan_pakai']; ?></pre></td>    
                            <td><?php echo $r['harga']; ?></td>    
                            <td><?php echo $r['pengambil_obat']; ?></td>    
                            <td><?php echo $r['petugas_apotek']; ?></td>    
                            <td><?php
                            $do=$r['id_dokter'];
                            $qd=mysqli_query($conn,"SELECT * FROM dokter WHERE kodeDokter='$do'");
                            $rdk=mysqli_fetch_array($qd);
                            echo $rdk['nama_dokter'];
                            ?></td>  
                            <td><?php echo tgl_indo($r['tgl_racik']); ?></td>  
                            <td><button class="btn btn-success" onclick="window.location='mod_anc/f_racik.php?kode_pasien=<?php echo $kode; ?>&&kode_resep=<?php echo $r['kode_resep']; ?>&&status=<?php echo $status; ?>'"><i class="fa fa-print"></i></button>
                            <button class="btn btn-danger" onclick="window.location='mod_anc/aksi_rm.php?module=hapus_racik&&id_racik=<?php echo $r['id_racik']; ?>&&kode=<?php echo $kode; ?>&&status=pasien'"><i class="icon-trash icon-white"></i></button></td>
                        </tr>
                    <?php
                            $no++;
                        }
                    ?>
                        </tbody>
                        </table>
                    </div>
				</div>
				
                <div class="tab-pane" id="addRacik">
                    <h3>Tambah Obat Racik</h3>
                    <form method="post" action="<?php echo $aksi."?module=tambahracik" ?>">
                    <input type="hidden" id="inputText" name="kode" value="<?php echo $kode; ?>" class="span4">
                    <input type="hidden" id="inputText" name="status" value="<?php echo $status ?>" class="span4">
                        <div class="control-group">
						<label class="control-label" for="inputPassword">Kode Resep</label>
						<div class="controls">
                            <input type="text" class="span4" name="kode_resep" value="<?php echo $kode; ?>-001">
						  
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Nama Obat</label>
						<div class="controls">
						  <textarea class="span4" name="t1"></textarea>
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Racikan</label>
						<div class="controls">
						  <textarea class="span4" name="t2"></textarea>
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Aturan Pemakaian</label>
						<div class="controls">
						  <textarea class="span4" name="t3"></textarea>
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Harga</label>
						<div class="controls">
						  <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Pengambil Obat</label>
						<div class="controls">
						  
						  <input type="text" id="inputText" name="t5" class="span4">
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Petugas Klinik</label>
						<div class="controls">
						  <input type="text" id="inputText" name="t6" class="span4">
					   </div>
				    </div>
                        <div class="control-group">
						<label class="control-label" for="inputPassword">Dokter / Petugas Medis</label>
						<div class="controls">
				            <select name="t7">
                                <option selected disabled>Pilih</option>
                                <?php
                                    $qdok=mysqli_query($conn,"SELECT * FROM dokter");
                                    while($rd=mysqli_fetch_array($qdok)){
                                ?>
                                <option value="<?php echo $rd['kodeDokter'] ?>"><?php echo $rd['nama_dokter'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
					   </div>
				    </div>
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
                    </form>
                </div>
						<div class="tab-pane" id="tab2">
						<hr>
						<form method="post" action="<?php echo $aksi."?module=tambahanc" ?>">
					
						<div class="span3 offset1">		
							<div class="control-group">
									<label class="control-label" for="inputEmail">No. Register ANC</label>
									<div class="controls">
									<input type="text" class="span8" value="<?php echo $nounik ?>" disabled>
									<input type="hidden" class="span8" value="<?php echo $nounik ?>" name="xNoanc">
									<input type="hidden" class="span8" value="<?php echo $kode ?>" name="xKodepasien">
									<input type="hidden" class="span8" value="<?php echo $rus['kodeUser'] ?>" name="xKodeuser">
									
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">No. Jaminan / Asuransi</label>
									<div class="controls">
									  
									  <input type="text" id="inputText" name="xno_jaminan" class="" value="<?php echo $rpas['no_jaminan']; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">NIK</label>
									<div class="controls">
									  <input type="hidden" id="inputText" name="id_pegawai" class="" value="<?php echo $rpas['id_pegawai']; ?>">
									  <input type="text" id="inputText" name="xnip" class="" value="<?php echo $rpas['nip']; ?>">
									</div>
								</div>
								
								<div class="control-group">
						<label class="control-label" for="inputPassword">Dokter / Petugas Medis</label>
						<div class="controls">
				            <select name="xkodedokter">
                                <option selected disabled>Pilih</option>
                                <?php
                                    $qdok=mysqli_query($conn,"SELECT * FROM dokter");
                                    while($rd=mysqli_fetch_array($qdok)){
                                ?>
                                <option value="<?php echo $rd['kodeDokter'] ?>"><?php echo $rd['nama_dokter'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
					   </div>
				    </div>
								<h4>IDENTITAS IBU</h4>
						
                            
							<div class="control-group">
								<label class="control-label" for="inputText">Nama Lengkap</label>
								<div class="controls">
								<input type="text" class="" name="xnama_pegawai" id="inputText" value="<?php echo $rpas['nama_pegawai']; ?>" >
								</div>
							</div>
                                <div class="control-group">
								<label class="control-label" for="inputText">Tgl. Lahir</label>
								<div class="controls">
								<input type="date" class="" name="xtgl_lhr" id="inputText" value="<?php echo $rpas['tgl_lhr']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Agama</label>
								<div class="controls">
								<input type="text" class="" name="xagama" id="inputText"  value="<?php echo $rpas['agama']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Pekerjaan</label>
								<div class="controls">
								<input type="text" class="" name="xpekerjaan" id="inputText"  value="<?php echo $rpas['pekerjaan']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Pendidikan</label>
								<div class="controls">
								<input type="text" class="" name="xpendidikan" id="inputText"  value="<?php echo $rpas['pendidikan']; ?>">
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="inputText">Umur Saat Menikah</label>
								<div class="controls">
								<input type="text" class="" name="xusia_menikah_ibu"  id="inputText" >
								</div>
							</div>
								<div class="control-group">
								<label class="control-label" for="inputText">No Telepon</label>
								<div class="controls">
								<input type="text" class="" name="xno_telepon" id="inputText"  value="<?php echo $rpas['no_telepon']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Alamat</label>
								<div class="controls">
								<textarea type="text" class="" name="xalamat"  id="inputText"  value="<?php echo $rpas['alamat']; ?>"></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">RT</label>
								<div class="controls">
								<input type="text" class="" name="xrt" id="inputText"  width="10%" value="<?php echo $rpas['rt']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">RW</label>
								<div class="controls">
								<input type="text" size="15" name="xrw"  id="inputText" value="<?php echo $rpas['rw']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Dusun</label>
								<div class="controls">
								<input type="text" class="" name="xdusun" id="inputText"  width="10%" value="<?php echo $rpas['dusun']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Desa</label>
								<div class="controls">
								<input type="text" size="15" name="xdesa" id="inputText" value="<?php echo $rpas['desa']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Puskesmas</label>
								<div class="controls">
								<input type="text" size="15" name="xpuskesmas"  id="inputText" value="<?php echo $rpas['puskesmas']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Tinggi Badan (Cm)</label>
								<div class="controls">
								<input type="text" size="15" name="xtinggi_badan"  id="inputText" value="<?php echo $rpas['tinggi_badan']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">LILA (Cm)</label>
								<div class="controls">
								<input type="text" size="15" name="xlila"  id="inputText" value="<?php echo $rpas['lila']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Golongan Darah</label>
								<div class="controls">
								<input type="text" size="15" name="xgolongan_darah"  id="inputText" value="<?php echo $rpas['golongan_darah']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Penggunaan kontrasepsi sebelum kehamilan </label>
								<div class="controls">
								<textarea type="text" class="" name="xkontrasepsi" id="inputText"  placeholder="Ex. IUDI/KB " > </textarea>
								</div>
							</div>
								<h4>IDENTITAS ANAK</h4>
								<button class="btn btn-info" data-toggle="tab" href="#addAnak"><i class="icon-chevron-right icon-white"></i> Add Anak</button>
								</br></br>
								<div class="span10">
					<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>Anak ke</th>
							<th align="center">JK </th>
							<th align="center">H/P</th>
							<th align="center">BB</th>
							<th align="center">P.Medis</th>
							<th align="center">Tempat</th>
							<th align="center">Usia</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$nip=$rpas['nip'];
						$qanak=mysqli_query($conn,"SELECT * FROM pegawai_anak WHERE nip_pegawai='$nip' ORDER BY anak_ke_apeg ASC");
						$no=1;
						while($ranak=mysqli_fetch_array($qanak)){
						?>
						<tr bgcolor="#fff">
							<td><?php echo $ranak['anak_ke_apeg']; ?></td>
							<td><?php echo $ranak['jk_apeg']; ?></td>
							<td><?php echo $ranak['lahir_apeg']; ?></td>
							<td><?php echo $ranak['bb_lahir_apeg']; ?></td>
							<td><?php echo $ranak['penolong_apeg']; ?></td>
							<td><?php echo $ranak['tempat_melahirkan_apeg']; ?></td>
							<td><?php echo $ranak['usia_apeg']; ?></td>	
								
<td> <button class="btn btn-success" onclick="window.location='mod_rm/aksi_rm.php?module=hapus_rm&&id_rm=<?php echo $rrm['id_rm']; ?>&&kode=<?php echo $kode; ?>&&status=pasien'"><i class="icon-pencil icon-white"></i></button></td>
<td><button class="btn btn-danger" onclick="window.location='mod_anc/aksi_anc.php?module=hapus_anak&&id_apeg=<?php echo $ranak['id_apeg']; ?>&&kode=<?php echo $kode; ?>&&status=pasien'"><i class="icon-trash icon-white"></i></button></td>
								
						</tr>
						<?php
						$no++;
						}
						?>
						
						</tbody>
					</table>
					</div>
								
																
						</div>	
							
							<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
						
						<div class="span3 offset1">	
								<button class="btn btn-primary" type="button" onclick="window.location='media.php?module=pegawai&&act=tambah_keluarga'"><i class="icon-plus icon-white"></i> Add Suami</button>
								<h4>IDENTITAS SUAMI</h4>
								<?php 
									$nip=$rpas['nip'];
									$querysuami=mysqli_query($conn,"SELECT * FROM pegawai_kel, pegawai WHERE pegawai_kel.nip_pegawai=pegawai.nip  and pegawai_kel.nip_pegawai='$nip' ");
									$rsuami=mysqli_fetch_array($querysuami);
									?>	
								
								<div class="control-group">
									<label class="control-label" for="inputText">Nama Lengkap</label>
									<div class="controls">
									<input type="text" class="" name="xnama_suami"  id="inputText" value="<?php echo $rsuami['nama_kpeg']; ?>" >
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">Tgl. Lahir</label>
									<div class="controls">
									<input type="date" class="" name="xtgl_lhr_suami"  id="inputText" value="<?php echo $rsuami['tgllahir_kpeg']; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputText">Agama</label>
									<div class="controls">
									<input type="text" class="" name="xagama_suami" id="inputText"  value="<?php echo $rsuami['agama_kpeg']; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputText">Pekerjaan</label>
									<div class="controls">
									<input type="text" class="" name="xpekerjaan_suami" id="inputText"  value="<?php echo $rsuami['pekerjaan_kpeg']; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputText">Pendidikan</label>
									<div class="controls">
									<input type="text" class="" name="xpendidikan_suami" id="inputText"  value="<?php echo $rsuami['pendidikan_kpeg']; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputText">Umur Saat Menikah</label>
									<div class="controls">
									<input type="text" class="" name="xusia_menikah_suami" id="inputText"  >
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">No Telepon</label>
									<div class="controls">
									<input type="text" class="" name="xno_telepon_suami" id="inputText"  value="<?php echo $rsuami['no_telepon_kpeg']; ?>">
									</div>
								</div>
						
								<h4>PENGAMATAN KEHAMILAN</h4>
									

								<div class="control-group">
									<label class="control-label" for="inputText">HPHT(Hari Pertama Haid Terakhir)</label>
									<div class="controls">
									<input type="date" class="" name="xhpht"  id="inputText"   placeholder "Hari Pertama Haid Terakhir">
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputPassword">HTP (Hari Taksiran Persalinan)</label>
									<div class="controls">
									<input type="date" class="span12" name="xhtp"  id="tanggal"  placeholder "Hari Taksiran Persalinan">
									</div>
								</div>
								
								
								<div    id="xrekomendasi_cuti" >
								<input type="hidden" id="xrekomendasi_cuti" class="" name="xrekomendasi_cuti"  >
							</div>
								
								
								
			
								<div class="control-group">
								<label class="control-label" for="inputText">Keluhan</label>
								<div class="controls">
								<textarea type="text" class="" name="xkeluhan" id="inputText"  placeholder="Keluhan utama kehamilan sekarang" > </textarea>
								</div>
							</div>
							
								<h4>RIWAYAT OBSTERTRI</h4>
									

								<div class="control-group">
									<label class="control-label" for="inputText">G</label>
									<div class="controls">
									<input type="text" class="" name="xg"  id="inputText"  placeholder "">
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">P</label>
									<div class="controls">
									<input type="text" class="" name="xp"  id="inputText"   placeholder "">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputText">A</label>
									<div class="controls">
									<input type="text" class="" name="xa"  id="inputText"  placeholder "">
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">AH</label>
									<div class="controls">
									<input type="text" class=""name="xah"  id="inputText"   placeholder "">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputText">Jumlah Lahir Mati</label>
									<div class="controls">
									<input type="text" class="" name="xlahir_mati"  id="inputText"   placeholder "">
									</div>
								</div>
								
							<div class="span4">
								
								<div id="tampil"></div>
							</div>	
							
							
							
						</div>	
						<div class="span3 offset1">	
								

								<h4>RIWAYAT PENYAKIT</h4>
									
								<h5>Kelainan Jantung</h5>
								<div class="control-group">
									<div class="control-group">
										
										<label class="radio">
										<input type="radio" name="xkelainan_jantung" id="optionsRadios1" value="YA">
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_jantung" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									</div>
									<label class="control-label" for="inputText">Tahun </label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_jantung_tahun" id="inputText"   placeholder "Tahun Ex. 2018">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_jantung_keterangan" id="inputText"   placeholder "Keterangan Ex. Hipotensi/Asma ">
									</div>
									
								</div>
									<h5>Tuberkulosis</h5>
								<div class="control-group">
									<div class="control-group">
										
										<label class="radio">
										<input type="radio" name="xtuberkulosis" id="optionsRadios1" value="YA">
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xtuberkulosis" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xtuberkulosis_tahun" id="inputText"   placeholder "Tahun Ex. 2018">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class=""name="xtuberkulosis_keterangan" id="inputText"   placeholder "Keterangan Ex. Hipotensi/Asma ">
									</div>
									
								</div>

								<h5>Kelainan Ginjal</h5>
								<div class="control-group">
									<div class="control-group">
										
										<label class="radio">
										<input type="radio" name="xkelainan_ginjal" id="optionsRadios1" value="YA">
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_ginjal" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_ginjal_tahun" id="inputText"   placeholder "Tahun Ex. 2018">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_ginjal_keterangan" id="inputText"   placeholder "Keterangan Ex. Hipotensi/Asma ">
									</div>
									
								</div>	
								
							<h5>Kencing Manis</h5>
								<div class="control-group">
									<div class="control-group">
										
										<label class="radio">
										<input type="radio" name="xkencing_manis" id="optionsRadios1" value="YA">
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkencing_manis" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xkencing_manis_tahun" id="inputText"   placeholder "Tahun Ex. 2018">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkencing_manis_keterangan" id="inputText"  placeholder "Keterangan Ex. Hipotensi/Asma ">
									</div>
									
								</div>	
								
								<h5>Kelainan Darah</h5>
								<div class="control-group">
									<div class="control-group">
										
										<label class="radio">
										<input type="radio" name="xkelainan_darah" id="optionsRadios1" value="YA">
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_darah"  id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_darah_tahun"  id="inputText"   placeholder "Tahun Ex. 2018">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_darah_keterangan"  id="inputText"  placeholder "Keterangan Ex. Hipotensi/Asma ">
									</div>
									
								</div>
								
								<h5>Operasi</h5>
								<div class="control-group">
									<div class="control-group">
										
										<label class="radio">
										<input type="radio" name="xoperasi"  id="optionsRadios1" value="YA">
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xoperasi" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xoperasi_tahun" id="inputText"   placeholder "Tahun Ex. 2018">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xoperasi_keterangan" id="inputText"  placeholder "Keterangan Ex. Hipotensi/Asma ">
									</div>
									
								</div>
								
								<h5>Lain-lain</h5>
								<div class="control-group">
									<div class="control-group">
										
										<label class="radio">
										<input type="radio" name="xother" id="optionsRadios1" value="YA">
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xother" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xother_tahun" id="inputText"  placeholder "Tahun Ex. 2018">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class=""name="xother_keterangan" id="inputText"  placeholder "Keterangan Ex. Hipotensi/Asma ">
									</div>
									
								</div>
									
								
							<div class="control-group">
									<div class="controls">								
									<button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
									</div>
								</div>
				
																
							<div class="span4">
								
								<div id="tampil"></div>
							</div>	
							
							
						</div>	
						</form>								
				
					</div> <!-- /tabbable -->
					<div class="tab-pane" id="addAnak">
                    <h3>Tambah Anak</h3>
                    <form method="post" action="<?php echo $aksi."?module=tambahanak" ?>">
                     
						<input type="hidden" id="inputText" name="xnip" class="" value="<?php echo $rpas['nip']; ?>">
                        
					 <div class="control-group">
						<label class="control-label" for="inputPassword">Anak Ke</label>
						<div class="controls">
						  <input type="text" id="inputText" name="xanak_ke_apeg" class="span4" placeholder="Ex. 1 / 2">
					   </div>
				 
					
						<label class="control-label" for="inputPassword">Kehamilan</label>
						<div class="controls">
						  <textarea class="span4" name="xkehamilan_apeg"></textarea>
					   </div>
				    
					 
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<label class="radio">
								<input type="radio" name="xjk_apeg" id="optionsRadios1" value="L">
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="xjk_apeg" id="optionsRadios1" value="P">
								Perempuan
								</label>
							
							
							 
								<label class="control-label" for="inputPassword">Lahir</label>
								<label class="radio">
								<input type="radio" name="xlahir_apeg" id="optionsRadios1" value="HIDUP">
								Hidup
								</label>
								<label class="radio">
								<input type="radio" name="xlahir_apeg" id="optionsRadios1" value="MATI">
								Mati
								</label>
							
							
						<label class="control-label" for="inputPassword">Berat Badan</label>
						<div class="controls">
						  <input type="text" id="inputText" name="xbb_lahir_apeg" class="span4" placeholder="Ex. 3.10 gr">
					   </div>
				   
					
								<label class="control-label" for="inputPassword">Penolong</label>
								<label class="radio">
								<input type="radio" name="xpenolong_apeg" id="optionsRadios1" value="BIDAN">
								Bidan
								</label>
								<label class="radio">
								<input type="radio" name="xpenolong_apeg" id="optionsRadios1" value="DOKTER">
								Dokter
								</label>
							
							
							
								<label class="control-label" for="inputPassword">Tempat di lahirkan</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="xtempat_melahirkan_apeg">
                                    <option selected disabled>-- Pilih Status --</option>    
                                    <option value="RS">Rumah Sakit</option>    
                                    <option value="KLINIK">Klinik</option>    
                                    <option value="RUMAH">Rumah</option>       
                                    <option value="OTHER">Lainnya</option> 
                                </select>
							</div>

						<label class="control-label" for="inputPassword">Usia</label>
						<div class="controls">
						  
						  <input type="text" id="inputText" name="xusia_apeg" class="span4">
					   </div>
					   <label class="control-label" for="inputPassword">Keterangan</label>
						<div class="controls">
						  <textarea class="span4" name="xketerangan_apeg"></textarea>
					   </div>
				    </div>
					
                    
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
                    </form>
                </div>
					
					<?php
					}
					else{
					?>
                
							<div id="hasil"></div>	
                <?php
					}
					?>
			</div>
			
		</div>
	</section>
<?php
break;
}
?>