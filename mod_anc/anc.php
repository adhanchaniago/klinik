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
		  $("#htp").on('change', function(){
		   var strtgl = $("#htp").val();
		   if (strtgl != "")
		   {		  
			$("#xcuti").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_anc/cuti_update.php",
			 data:"x="+ strtgl,
			 success: function(data){
			 $("#xcuti").css("display", "block");
			  $("#xcuti").html(data);
			 
			 }
			});
		   }
		   else{
		   $("#xcuti").css("display", "none");
		   }
		  });
			});
	</script>
	<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#tanggal").on('change', function(){
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
				$qupas=mysqli_query($conn,"SELECT * FROM pasien, pegawai WHERE pasien.id_pegawai=pegawai.id_pegawai AND pasien.kodePasien='$kode'");
				$rpas=mysqli_fetch_array($qupas);
				?>
					<div class="control-group">				
								<div class="rm_text">
									<div class="controls">
									<input type="text" class="span12" id="txtkdpasien" value="<?php echo $rpas['kodePasien']." / ".$rpas['nip'] ?>" disabled>
									</div>
	
								</div>
							</div>
							<?php
							$kode=$_GET['kodepasien'];
							$nip=$_GET['nip'];
							$status=$_GET['status'];
							if($kode!='' AND $status=='pasien'){
							$qupas=mysqli_query($conn,"SELECT * FROM anc WHERE kodePasien='$kode' and endcuti='0000-00-00' ORDER BY id_anc DESC");
							$ranc=mysqli_fetch_array($qupas);
							?>	
							<div class="control-group">
							<div class="controls">
									
								<?php if($ranc['nomorAnc']!='' ):?>
								<button class="btn btn-success" data-toggle="tab" href="#editAnc"><i class="icon-chevron-right icon-white"></i> Edit Data ANC</button>
								<?php else:?>
                               <button class="btn btn-info" data-toggle="tab" href="#addAnc"><i class="icon-chevron-right icon-white"></i> Add Data ANC</button>
								<?php endif;?>	
								<hr>
							</div>
							<?php
								}
								?>
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
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<?php
								$jk=$rpas['jk'];
								if($jk=='P'){
								?>
								<input type="text" class="span12" id="inputText" value="Perempuan" disabled>
								<?php
								}
								else{
								?>
								<input type="text" class="span12" id="inputText" value="Laki-Laki" disabled>
                                <?php
                                }
								?>
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
					
						<li class="active"><a href="#tab1" data-toggle="tab"><span class="fa fa-medkit"></span> Data ANC</a></li>
						<li><a href="#riwayatAnc" data-toggle="tab"><span class="fa fa-plus"></span> Riwayat ANC</a></li>
						<li><a href="#dataKeluarga" data-toggle="tab"><span class="fa fa-check"></span> Data Keluarga</a></li>
						<li><a href="#rekamAnc" data-toggle="tab"><span class="fa fa-medkit"></span> Data Pemeriksaan ANC</a></li>
						<li><a href="#racikObt" data-toggle="tab"><span class="fa fa-refresh"></span> Racik Obat</a></li>
                        <li><a href="media.php?module=anc&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>"><span class="fa fa-refresh"></span> Reload</a></li>
                        
                        <li><a href="media.php?module=anc"><span class="fa fa-close"></span> Exit</a></li>
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
						
						
				<!-- /.Tampilan awal data ANC -->			
			<?php
				$kode=$_GET['kodepasien'];
				$nip=$_GET['nip'];
                $status=$_GET['status'];
				if($kode!='' AND $status=='pasien'){
				$qupas=mysqli_query($conn,"SELECT * FROM anc WHERE kodePasien='$kode' order by id_anc desc");
				$ranc=mysqli_fetch_array($qupas);
			?>	
					<div class="tab-pane active" id="tab1">
					
					<div class="span3 offset1">		
							<div class="control-group">
									<label class="control-label" for="inputEmail">No. Register ANC</label>
									<div class="controls">
									<input type="text" class="span8" value="<?php echo $ranc['nomorAnc'] ?>" disabled>
									<input type="hidden" class="span8" value="<?php echo $ranc['nomorAnc']?>" name="xNoanc">
									<input type="hidden" class="span8" value="<?php echo $kode ?>" name="xKodepasien">
									<input type="hidden" class="span8" value="<?php echo $rus['kodeUser'] ?>" name="xKodeuser">
									
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">No. Jaminan / Asuransi</label>
									<div class="controls">
									  
									  <input type="text" id="inputText" name="xno_jaminan" class="" value="<?php echo $rpas['no_jaminan']; ?>" disabled>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">NIK</label>
									<div class="controls">
									  <input type="hidden" id="inputText" name="id_pegawai" class="" value="<?php echo $rpas['id_pegawai']; ?>">
									  <input type="text" id="inputText" name="xnip" class="" value="<?php echo $rpas['nip']; ?>" disabled>
									</div>
								</div>
								
								<div class="control-group">
						<label class="control-label" for="inputPassword">Dokter / Petugas Medis</label>
						<div class="controls">
				            <select name="xkodedokter" disabled>
                                <option selected disabled>Pilih</option>
                                <?php
                                    $qdok=mysqli_query($conn,"SELECT * FROM dokter");
                                    while($rd=mysqli_fetch_array($qdok)){
                                ?>
								<?php if($rd['kodeDokter'] ==$ranc['kodedokter'] ):?>
								
								<option value="<?php echo $rd['kodeDokter'] ?>" selected><?php echo $rd['nama_dokter'] ?></option>
								<?php else:?>
								
                                <option value="<?php echo $rd['kodeDokter'] ?>"><?php echo $rd['nama_dokter'] ?></option>
								<?php endif;?>
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
								<input type="text" class="" name="xnama_pegawai" id="inputText" value="<?php echo $rpas['nama_pegawai']; ?>" disabled>
								</div>
							</div>
                                <div class="control-group">
								<label class="control-label" for="inputText">Tgl. Lahir</label>
								<div class="controls">
								<input type="date" class="" name="xtgl_lhr" id="inputText" value="<?php echo $rpas['tgl_lhr']; ?>" disabled>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputText">Agama</label>
								<div class="controls">
								<select name="xagama" class="form-control" style="width:150px;" tabindex="2" disabled>
                                           
										<?php
										$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";
										if($device==""){$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong='selected="selected"';}
										else if($device=="Islam"){ $islam='selected="selected"';$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Kristen"){$islam="";$kristen='selected="selected"';$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Katolik"){ $islam="";$kristen="";$katolik='selected="selected"';$hindu="";$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Hindu"){ $islam="";$kristen="";$katolik="";$hindu='selected="selected"';$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Buddha"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha='selected="selected"';$kong_hu_cu="";$kosong=""; }
										else if($device=="Kong Hu Cu"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu='selected="selected"';$kosong=""; }
										?>
										 
                                        
										<option value="<?php echo $rpas['agama']; ?>" selected><?php echo $rpas['agama'];?></option>
										<option value="Islam" <?php echo $islam; ?>>Islam</option>
										<option value="Kristen" <?php echo $kristen; ?>>Kristen</option>
										<option value="Katolik" <?php echo $katolik; ?>>Katolik</option>
										<option value="Hindu" <?php echo $hindu; ?>>Hindu</option>
										<option value="Buddha" <?php echo $buddha; ?>>Buddha</option>
										<option value="Kong Hu Cu" <?php echo $kong_hu_cu; ?>>Kong Hu Cu</option>
										
										
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Pekerjaan</label>
								<div class="controls">
								<input type="text" class="" name="xpekerjaan" id="inputText"  value="<?php echo $rpas['pekerjaan']; ?>" disabled>
								</div>
							</div>
							<label class="control-label" for="inputText">Pendidikan</label>
								<div class="controls">
								<select name="xpendidikan_kpeg" class="form-control" style="width:150px;" tabindex="2" disabled>
                                           
										<?php
										$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";
										if($device==""){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong='selected="selected"';}
										else if($device=="SD"){$sd='selected="selected"';$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMP"){$sd="";$smp='selected="selected"';$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMA"){ $sd="";$smp="";$sma='selected="selected"';$diploma="";$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="DIPLOMA"){ $sd="";$smp="";$sma="";$diploma='selected="selected"';$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="SARJANA"){$sd="";$smp="";$sma="";$diploma="";$sarjana='selected="selected"';$tidak_sekolah="";$kosong=""; }
										else if($device=="Tidak Sekolah"){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah='selected="selected"';$kosong=""; }
										
										?>
										<option value="<?php echo $rpas['pendidikan']; ?>" selected><?php echo $rpas['pendidikan'];?></option> 
                                        
										<option value="SD" <?php echo $sd; ?>>SD</option>
										<option value="SMP" <?php echo $smp; ?>>SMP</option>
										<option value="SMA" <?php echo $sma; ?>>SMA</option>
										<option value="DIPLOMA" <?php echo $diploma; ?>>DIPLOMA</option>
										<option value="SARJANA" <?php echo $sarjana; ?>>SARJANA</option>
										<option value="Tidak Sekolah" <?php echo $tidak_sekolah; ?>>Tidak Sekolah</option>
										
										
									</select>
								</div>
							
                            <div class="control-group">
								<label class="control-label" for="inputText">Umur Saat Menikah</label>
								<div class="controls">
								<input type="text" class="" name="xusia_menikah_ibu"  id="inputText" value="<?php echo $ranc['usia_menikah_ibu']; ?>" disabled>
								</div>
							</div>
								<div class="control-group">
								<label class="control-label" for="inputText">No Telepon</label>
								<div class="controls">
								<input type="text" class="" name="xno_telepon" id="inputText"  value="<?php echo $rpas['no_telepon']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Alamat</label>
								<div class="controls">
								<textarea type="text" class="" name="xalamat"  id="inputText"   disabled><?php echo $rpas['alamat']; ?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">RT</label>
								<div class="controls">
								<input type="text" class="" name="xrt" id="inputText"  width="10%" value="<?php echo $rpas['rt']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">RW</label>
								<div class="controls">
								<input type="text" size="15" name="xrw"  id="inputText" value="<?php echo $rpas['rw']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Dusun</label>
								<div class="controls">
								<input type="text" class="" name="xdusun" id="inputText"  width="10%" value="<?php echo $rpas['dusun']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Desa</label>
								<div class="controls">
								<input type="text" size="15" name="xdesa" id="inputText" value="<?php echo $rpas['desa']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Puskesmas</label>
								<div class="controls">
								<input type="text" size="15" name="xpuskesmas"  id="inputText" value="<?php echo $rpas['puskesmas']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Tinggi Badan (Cm)</label>
								<div class="controls">
								<input type="text" size="15" name="xtinggi_badan"  id="inputText" value="<?php echo $rpas['tinggi_badan']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">LILA (Cm)</label>
								<div class="controls">
								<input type="text" size="15" name="xlila"  id="inputText" value="<?php echo $rpas['lila']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Golongan Darah</label>
								<div class="controls">
								<input type="text" size="15" name="xgolongan_darah"  id="inputText" value="<?php echo $rpas['golongan_darah']; ?>"  disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Penggunaan kontrasepsi sebelum kehamilan </label>
								<div class="controls">
								<textarea type="text" class="" name="xkontrasepsi" id="inputText" disabled><?php echo $ranc['kontrasepsi']; ?> </textarea>
								</div>
							</div>
							
							
			<?php
				}
			?>	
								<h4>IDENTITAS ANAK</h4>
								
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
								
 <!-- <td> <button class="btn btn-success" onclick="window.location='mod_rm/aksi_rm.php?module=hapus_rm&&id_rm=<?php echo $rrm['id_rm']; ?>&&kode=<?php echo $kode; ?>&&status=pasien'"><i class="icon-pencil icon-white"></i></button></td> -->
<!--  <td><button class="btn btn-danger" onclick="window.location='mod_anc/aksi_anc.php?module=hapus_anak&&id_apeg=<?php echo $ranak['id_apeg']; ?>&&kode=<?php echo $kode; ?>&&status=pasien'"><i class="icon-trash icon-white"></i></button></td> -->
								
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
								
								<h4>IDENTITAS SUAMI</h4>
								<?php 
									$nip=$rpas['nip'];
									$querysuami=mysqli_query($conn,"SELECT * FROM pegawai_kel, pegawai WHERE pegawai_kel.nip_pegawai=pegawai.nip  and pegawai_kel.nip_pegawai='$nip' ");
									$rsuami=mysqli_fetch_array($querysuami);
									?>	
								
								<div class="control-group">
									<label class="control-label" for="inputText">Nama Lengkap</label>
									<div class="controls">
									<input type="text" class="" name="xnama_suami"  id="inputText" value="<?php echo $rsuami['nama_kpeg']; ?>" disabled>
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">Tgl. Lahir</label>
									<div class="controls">
									<input type="date" class="" name="xtgl_lhr_suami"  id="inputText" value="<?php echo $rsuami['tgllahir_kpeg']; ?>" disabled>
									</div>
								</div>
								
								<div class="control-group">
								<label class="control-label" for="inputText">Agama</label>
								<div class="controls">
								<select name="xagama_suami" class="form-control" style="width:150px;" tabindex="2" disabled>
                                           
										<?php
										$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";
										if($device==""){$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong='selected="selected"';}
										else if($device=="Islam"){ $islam='selected="selected"';$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Kristen"){$islam="";$kristen='selected="selected"';$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Katolik"){ $islam="";$kristen="";$katolik='selected="selected"';$hindu="";$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Hindu"){ $islam="";$kristen="";$katolik="";$hindu='selected="selected"';$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Buddha"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha='selected="selected"';$kong_hu_cu="";$kosong=""; }
										else if($device=="Kong Hu Cu"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu='selected="selected"';$kosong=""; }
										?>
										 
                                        
										<option value="<?php echo $rsuami['agama_kpeg']; ?>" selected><?php echo $rsuami['agama_kpeg']; ?></option>
										<option value="Islam" <?php echo $islam; ?>>Islam</option>
										<option value="Kristen" <?php echo $kristen; ?>>Kristen</option>
										<option value="Katolik" <?php echo $katolik; ?>>Katolik</option>
										<option value="Hindu" <?php echo $hindu; ?>>Hindu</option>
										<option value="Buddha" <?php echo $buddha; ?>>Buddha</option>
										<option value="Kong Hu Cu" <?php echo $kong_hu_cu; ?>>Kong Hu Cu</option>
										
										
									</select>
								</div>
							</div>
								<div class="control-group">
									<label class="control-label" for="inputText">Pekerjaan</label>
									<div class="controls">
									<input type="text" class="" name="xpekerjaan_suami" id="inputText"  value="<?php echo $rsuami['pekerjaan_kpeg']; ?>" disabled>
									</div>
								</div>
								<label class="control-label" for="inputText">Pendidikan</label>
								<div class="controls">
								<select name="xpendidikan_suami" class="form-control" style="width:150px;" tabindex="2" disabled>
                                           
										<?php
										$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";
										if($device==""){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong='selected="selected"';}
										else if($device=="SD"){$sd='selected="selected"';$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMP"){$sd="";$smp='selected="selected"';$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMA"){ $sd="";$smp="";$sma='selected="selected"';$diploma="";$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="DIPLOMA"){ $sd="";$smp="";$sma="";$diploma='selected="selected"';$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="SARJANA"){$sd="";$smp="";$sma="";$diploma="";$sarjana='selected="selected"';$tidak_sekolah="";$kosong=""; }
										else if($device=="Tidak Sekolah"){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah='selected="selected"';$kosong=""; }
										
										?>
										<option value="<?php echo $rsuami['pendidikan_kpeg']; ?>" selected><?php echo $rsuami['pendidikan_kpeg'];?></option> 
                                        
										<option value="SD" <?php echo $sd; ?>>SD</option>
										<option value="SMP" <?php echo $smp; ?>>SMP</option>
										<option value="SMA" <?php echo $sma; ?>>SMA</option>
										<option value="DIPLOMA" <?php echo $diploma; ?>>DIPLOMA</option>
										<option value="SARJANA" <?php echo $sarjana; ?>>SARJANA</option>
										<option value="Tidak Sekolah" <?php echo $tidak_sekolah; ?>>Tidak Sekolah</option>
										
										
									</select>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputText">Umur Saat Menikah</label>
									<div class="controls">
									<input type="text" class="" name="xusia_menikah_suami" id="inputText" value="<?php echo $ranc['usia_menikah_suami']; ?>" disabled>
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">No Telepon</label>
									<div class="controls">
									<input type="text" class="" name="xno_telepon_suami" id="inputText"  value="<?php echo $rsuami['no_telepon_kpeg']; ?>" disabled>
									</div>
								</div>
									<?php
									$kode=$_GET['kodepasien'];
									$nip=$_GET['nip'];
									$status=$_GET['status'];
									if($kode!='' AND $status=='pasien'){
									$qupas=mysqli_query($conn,"SELECT * FROM anc WHERE kodePasien='$kode' order by id_anc desc");
									$ranc=mysqli_fetch_array($qupas);
									?>	
								<h4>PENGAMATAN KEHAMILAN</h4>
									

								<div class="control-group">
									<label class="control-label" for="inputText">HPHT(Hari Pertama Haid Terakhir)</label>
									<div class="controls">
									<input type="date" class="" name="xhpht"  id="inputText"   value="<?php echo $ranc['hpht']; ?>" disabled>
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputPassword">HTP (Hari Taksiran Persalinan)</label>
									<div class="controls">
									<input type="date" class="span12" name="xhtp"   id="tanggal "value="<?php echo $ranc['htp']; ?>" disabled>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">Rekomendasi Cuti</label>
									<div class="controls">
									<input type="date" class="span12" name="xrekomendasi_cuti"  id="inputText" value="<?php echo $ranc['rekomendasi_cuti']; ?>" disabled>
									</div>
								</div>
			
								<div class="control-group">
								<label class="control-label" for="inputText">Keluhan</label>
								<div class="controls">
								<textarea type="text" class="" name="xkeluhan" id="inputText"  disabled><?php echo $ranc['keluhan']; ?></textarea>
								</div>
							</div>
							
								<h4>RIWAYAT OBSTERTRI</h4>
									

								<div class="control-group">
									<label class="control-label" for="inputText">G</label>
									<div class="controls">
									<input type="text" class="" name="xg"  id="inputText"  value="<?php echo $ranc['g']; ?>" disabled>
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">P</label>
									<div class="controls">
									<input type="text" class="" name="xp"  id="inputText"   value="<?php echo $ranc['p']; ?>" disabled>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputText">A</label>
									<div class="controls">
									<input type="text" class="" name="xa"  id="inputText"  value="<?php echo $ranc['a']; ?>" disabled>
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">AH</label>
									<div class="controls">
									<input type="text" class=""name="xah"  id="inputText"   value="<?php echo $ranc['ah']; ?>" disabled>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputText">Jumlah Lahir Mati</label>
									<div class="controls">
									<input type="text" class="" name="xlahir_mati"  id="inputText"   value="<?php echo $ranc['jumlah_lahir_mati']; ?>" disabled>
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
										<?php
								$jantung=$ranc['jantung'];
								if($jantung=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xjantung" id="optionsRadios1" value="YA" checked disabled>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xjantung" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xjantung" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xjantung" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>	
								
									<label class="control-label" for="inputText">Tahun </label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_jantung_tahun" id="inputText"   value="<?php echo $ranc['kelainan_jantung_tahun']; ?>" disabled>
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_jantung_keterangan" id="inputText"   value="<?php echo $ranc['kelainan_jantung_ket']; ?>" disabled>
									</div>
									
								</div>
								<h5>Tuberkulosis</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$tuberkulosis=$ranc['tuberkulosis'];
								if($tuberkulosis=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xtuberkulosis" id="optionsRadios1" value="YA" checked disabled>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xtuberkulosis" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xtuberkulosis" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xtuberkulosis" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xtuberkulosis_tahun" id="inputText"   value="<?php echo $ranc['tuberkulosis_tahun']; ?>" disabled>
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class=""name="xtuberkulosis_keterangan" id="inputText"   value="<?php echo $ranc['tuberkulosis_ket']; ?>" disabled>
									</div>
									
								</div>
								<h5>Ginjal</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$ginjal=$ranc['ginjal'];
								if($ginjal=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xginjal" id="optionsRadios1" value="YA" checked disabled>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xginjal" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xginjal" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xginjal" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
								
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_ginjal_tahun" id="inputText"   value="<?php echo $ranc['kelainan_ginjal_tahun']; ?>" disabled>
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_ginjal_keterangan" id="inputText"   value="<?php echo $ranc['kelainan_ginjal_ket']; ?>" disabled>
									</div>
									
								</div>	
								<h5>Kencing Manis</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$kencing_manis=$ranc['kencing_manis'];
								if($kencing_manis=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xkencing_manis" id="optionsRadios1" value="YA" checked disabled>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkencing_manis" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xkencing_manis" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkencing_manis" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
							
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xkencing_manis_tahun" id="inputText"   value="<?php echo $ranc['kencing_manis_tahun']; ?>" disabled>
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkencing_manis_keterangan" id="inputText"  value="<?php echo $ranc['kencing_manis_ket']; ?>" disabled>
									</div>
									
								</div>	
								<h5>Kelainan Darah</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$kelainan_darah=$ranc['kelainan_darah'];
								if($kelainan_darah=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xkelainan_darah" id="optionsRadios1" value="YA" checked disabled>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_darah" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xkelainan_darah" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_darah" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
								
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_darah_tahun"  id="inputText"   value="<?php echo $ranc['kelainan_darah_tahun']; ?>" disabled>
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_darah_keterangan"  id="inputText"  value="<?php echo $ranc['kelainan_darah_ket']; ?>" disabled>
									</div>
									
								</div>
								
								
									<h5>Operasi</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$operasi=$ranc['operasi'];
								if($operasi=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xoperasi" id="optionsRadios1" value="YA" checked disabled>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xoperasi" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xoperasi" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xoperasi" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xoperasi_tahun" id="inputText"   value="<?php echo $ranc['operasi_tahun']; ?>" disabled>
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xoperasi_keterangan" id="inputText"  value="<?php echo $ranc['operasi_ket']; ?>" disabled>
									</div>
									
								</div>
								<h5>Haemorroid</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$haemorroid=$ranc['haemorroid'];
								if($haemorroid=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xhaemorroid" id="optionsRadios1" value="YA" checked disabled>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xhaemorroid" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xhaemorroid" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xhaemorroid" id="optionsRadios1" value="TIDAK" checked disabled>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xhaemorroid_tahun" id="inputText"   value="<?php echo $ranc['haemorroid_tahun']; ?>" disabled>
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xhaemorroid_keterangan" id="inputText"  value="<?php echo $ranc['haemorroid_ket']; ?>" disabled>
									</div>
									
								</div>
								<h5>Alergi</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$alergi=$ranc['alergi'];
								if($alergi=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xalergi" id="optionsRadios1" value="YA" checked disabled>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xalergi" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xalergi" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xalergi" id="optionsRadios1" value="TIDAK" checked disabled>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xalergi_tahun" id="inputText"   value="<?php echo $ranc['alergi_tahun']; ?>" disabled>
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xalergi_keterangan" id="inputText"  value="<?php echo $ranc['alergi_ket']; ?>" disabled>
									</div>
									
								</div>
								<h5>Asthma</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$asthma=$ranc['asthma'];
								if($asthma=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xasthma" id="optionsRadios1" value="YA" checked disabled>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xasthma" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xasthma" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xasthma" id="optionsRadios1" value="TIDAK" checked disabled>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xasthma_tahun" id="inputText"   value="<?php echo $ranc['asthma_tahun']; ?>" disabled>
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xasthma_keterangan" id="inputText"  value="<?php echo $ranc['asthma_ket']; ?>" disabled>
									</div>
									
								</div>
							
								<h5>Lain-lain</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$other=$ranc['other'];
								if($other=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xother" id="optionsRadios1" value="YA" checked disabled>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xother" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xother" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xother" id="optionsRadios1" value="TIDAK" checked disabled>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xother_tahun" id="inputText"  value="<?php echo $ranc['other_tahun']; ?>" disabled>
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class=""name="xother_keterangan" id="inputText"  value="<?php echo $ranc['other_ket']; ?>" disabled>
									</div>
									
								</div>
									
								
							
																
							<div class="span4">
								
								<div id="tampil"></div>
							</div>	
							
							
						</div>	
						</form>								
				
					</div> <!-- /tabbable -->
					<?php
						
						}
						?>
						
						<!-- /.end view data anc -->	
									
					<div class="tab-pane" id="editAnak">
                    <h3>Tambah Anak</h3>
                    <form method="post" action="<?php echo $aksi."?module=tambahanak" ?>">
                     
						<input type="hidden" id="inputText" name="xnip" class="" value="<?php echo $rpas['nip']; ?>" >
                        
					 <div class="control-group">
						<label class="control-label" for="inputPassword">Anak Ke</label>
						<div class="controls">
						  <input type="text" id="inputText" name="xanak_ke_apeg" class="span4" placeholder="Ex. 1 / 2" >
					   </div>
				 
					
						<label class="control-label" for="inputPassword">Kehamilan</label>
						<div class="controls">
						  <textarea class="span4" name="xkehamilan_apeg" disabled></textarea>
					   </div>
				    
					 
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<label class="radio">
								<input type="radio" name="xjk_apeg" id="optionsRadios1" value="L" >
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="xjk_apeg" id="optionsRadios1" value="P" >
								Perempuan
								</label>
							
							
							 
								<label class="control-label" for="inputPassword">Lahir</label>
								<label class="radio">
								<input type="radio" name="xlahir_apeg" id="optionsRadios1" value="HIDUP" >
								Hidup
								</label>
								<label class="radio">
								<input type="radio" name="xlahir_apeg" id="optionsRadios1" value="MATI" >
								Mati
								</label>
							
							
						<label class="control-label" for="inputPassword">Berat Badan</label>
						<div class="controls">
						  <input type="text" id="inputText" name="xbb_lahir_apeg" class="span4" placeholder="Ex. 3.10 gr" >
					   </div>
				   
					
								<label class="control-label" for="inputPassword">Penolong</label>
								<label class="radio">
								<input type="radio" name="xpenolong_apeg" id="optionsRadios1" value="BIDAN" >
								Bidan
								</label>
								<label class="radio">
								<input type="radio" name="xpenolong_apeg" id="optionsRadios1" value="DOKTER" >
								Dokter
								</label>
							
							
							
								<label class="control-label" for="inputPassword">Tempat di lahirkan</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="xtempat_melahirkan_apeg" >
                                    <option selected disabled>-- Pilih Status --</option>    
                                    <option value="RS">Rumah Sakit</option>    
                                    <option value="KLINIK">Klinik</option>    
                                    <option value="RUMAH">Rumah</option>       
                                    <option value="OTHER">Lainnya</option> 
                                </select>
							</div>

						<label class="control-label" for="inputPassword">Usia</label>
						<div class="controls">
						  
						  <input type="text" id="inputText" name="xusia_apeg" class="span4" >
					   </div>
					   <label class="control-label" for="inputPassword">Keterangan</label>
						<div class="controls">
						  <textarea class="span4" name="xketerangan_apeg" ></textarea>
					   </div>
				    </div>
					
						
					
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
				
				<!-- /Tab Data Keluarga -->
				<div class="tab-pane" id="dataKeluarga">
				    <div class="control-group">
						<h4>INFORMASI DATA SUAMI</h4>
						
                        <button class="btn btn-info" data-toggle="tab" href="#addSuami"><i class="icon-chevron-right icon-white"></i> Add Suami</button> <br/><br/>
                        <table class="table table-bordered table-striped">
						<caption></caption>
						<thead>
						<tr>
							<th>Nama</th>
							<th align="center">Tgl Lahir</th>
							<th align="center">Alamat</th>
							<th align="center">Agama</th>
							<th align="center">Pendidikan</th>
							<th align="center">Pekerjaan</th>
							<th align="center">No Tlp</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$nip=$rpas['nip'];
						$qsuami=mysqli_query($conn,"SELECT * FROM pegawai_kel WHERE nip_pegawai='$nip' ");
						$no=1;
						while($rsuami=mysqli_fetch_array($qsuami)){
						?>
						<tr bgcolor="#fff">
							<td><?php echo $rsuami['nama_kpeg']; ?></td>
							<td><?php echo $rsuami['tgllahir_kpeg']; ?></td>
							<td><?php echo $rsuami['alamat_kpeg']; ?></td>
							<td><?php echo $rsuami['agama_kpeg']; ?></td>
							<td><?php echo $rsuami['pendidikan_kpeg']; ?></td>
							<td><?php echo $rsuami['pekerjaan_kpeg']; ?></td>
							<td><?php echo $rsuami['no_telepon_kpeg']; ?></td>	
								 
<!-- <td> <button class="btn btn-success" onclick="window.location='mod_rm/aksi_rm.php?module=hapus_rm&&id_rm=<?php echo $rrm['id_rm']; ?>&&kode=<?php echo $kode; ?>&&status=pasien'"><i class="icon-pencil icon-white"></i></button></td> -->
<td><button class="btn btn-danger" onclick="window.location='mod_anc/aksi_anc.php?module=hapus_suami&&id_kpeg=<?php echo $rsuami['id_kpeg']; ?>&&kode=<?php echo $kode; ?>&&status=pasien'"><i class="icon-trash icon-white"></i></button></td>
								
						</tr>
						<?php
						$no++;
						}
						?>
						
						</tbody>
                        </table>
                        <h4>INFORMASI DATA ANAK</h4>
						
                        <button class="btn btn-info" data-toggle="tab" href="#addAnak"><i class="icon-chevron-right icon-white"></i> Add Anak</button> <br/><br/>
                        <table class="table table-bordered table-striped">
						<caption></caption>
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
<!-- <td><button class="btn btn-success" data-toggle="tab" href="#editAnak"><i class="icon-pencil icon-white"></i></button>	</td> -->							

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
				<!-- Data Riwayat ANC -->
				<div class="tab-pane" id="riwayatAnc">
				    <div class="control-group">
                        <h4>Data Riwayat ANC</h4>
                        
                        <table class="table table-bordered table-striped">
						<caption></caption>
						<thead>
						<tr>
							<th>#</th>
							<th align="center">NOMOR ANC</th>
                            <th align="center">TGL REKAM</th>
							<th align="center">ID PASIEN</th>
							<th align="center">NIP</th>
							<th align="center">NAMA</th>
							<th align="center">BAGIAN</th>
							<th align="center">KEHAMILAN KE</th>
							<th align="center">HPHT</th>
							<th align="center">HTP</th>
							<th align="center">ABORTUS</th>
							<th align="center">REKOMENDASI CUTI</th>
							<th align="center">AWAL CUTI</th>
							<th align="center">END CUTI</th>
							<th align="center">PETUGAS MEDIS</th>
                            <th></th>
						</tr>
						</thead>
						<tbody>
                    <?php
						$nip = $rpas['nip'];
                        $query=mysqli_query($conn,"SELECT * FROM anc WHERE nip='$nip' ORDER BY id_anc ASC");
                        $no=1;
                        while($ancRiwayat=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
							<td><?php echo $ancRiwayat['nomorAnc']; ?></pre></td>  							
                            <td><?php echo tgl_indo($ancRiwayat['datecreated']);?></pre></td>    
                            <td><?php echo $ancRiwayat['kodepasien']; ?></pre></td>    
                            <td><?php echo $ancRiwayat['nip']; ?></pre></td>    
                             
							<?php
							$kode=$_GET['kodepasien'];
							$nip=$_GET['nip'];
							$status=$_GET['status'];
							if($kode!='' AND $status=='pasien'){
							$qupas=mysqli_query($conn,"SELECT * FROM pasien, pegawai WHERE pasien.id_pegawai=pegawai.id_pegawai AND pasien.kodePasien='$kode'");
							$rpas=mysqli_fetch_array($qupas);
							?>
							
							<td><?php echo $rpas['nama_pegawai']; ?></td>
							<td><?php echo $rpas['unit']; ?></td> 	
							<?php
								}
							?>
							<td><?php echo $ancRiwayat['g']; ?></td>
                            <td><?php echo tgl_indo($ancRiwayat['hpht']);?></pre></td>   
                            <td><?php echo tgl_indo($ancRiwayat['htp']);?></pre></td>
							<td><?php echo $ancRiwayat['abortus_jenis']; ?></td>
							<td><?php echo tgl_indo($ancRiwayat['rekomendasi_cuti']);?></pre></td>
							<td><?php echo tgl_indo($ancRiwayat['begincuti']);?></pre></td>
							<td><?php echo tgl_indo($ancRiwayat['endcuti']);?></pre></td>
                            <td><?php
                            $do=$ancRiwayat['kodedokter'];
                            $qd=mysqli_query($conn,"SELECT * FROM dokter WHERE kodeDokter='$do'");
                            $rdk=mysqli_fetch_array($qd);
                            echo $rdk['nama_dokter'];
                            ?></td>  
               
                        </tr>
                    <?php
                            $no++;
                        }
                    ?>
					
                        </tbody>
                        </table>
                    </div>
				</div>
				
				<!-- /End Data Keluarga -->
				<div class="tab-pane" id="rekamAnc">
				    <div class="control-group">
                        <h4>Data Rekam ANC</h4>
                        <button class="btn btn-info" data-toggle="tab" href="#addRekamAnc"><i class="icon-chevron-right icon-white"></i> Tambah Rekam ANC</button>
                        <table class="table table-bordered table-striped">
						<caption> Data Rekam ANC</caption>
						<thead>
						<tr>
							<th>#</th>
							<th align="center">Tanggal</th>
                            <th align="center">Subyektif</th>
							<th align="center">TD</th>
							<th align="center">BB</th>
							<th align="center">UK</th>
							<th align="center">TFU</th>
							<th align="center">Letak Janin</th>
							<th align="center">DJJ</th>
							<th align="center">Pemeriksaan</th>
							<th align="center">Analisa</th>
							<th align="center">Penatalaksaan</th>
							<th align="center">Petugas medis</th>
                            <th></th>
						</tr>
						</thead>
						<tbody>
                    <?php
						$nomorAnc = $ranc['nomorAnc'];
                        $query=mysqli_query($conn,"SELECT * FROM rekamanc WHERE nomorAnc='$nomorAnc' ORDER BY id_ranc DESC");
                        $no=1;
                        while($rranc=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>    
                            <td><?php echo tgl_indo($rranc['tgl_periksa']);?></pre></td>    
                            <td><?php echo $rranc['data_subyektif']; ?></pre></td>    
                            <td><?php echo $rranc['td']; ?></pre></td>    
                            <td><?php echo$rranc['bb']; ?></pre></td>    
                            <td><?php echo $rranc['uk']; ?></td>    
                            <td><?php echo $rranc['tfu']; ?></td>    
                            <td><?php echo $rranc['letak_janin']; ?></td>
							<td><?php echo $rranc['djj']; ?></td>
							<td><?php echo $rranc['pemeriksaan_khusus']; ?></td>
							<td><?php echo $rranc['analisa']; ?></td>
							<td><?php echo $rranc['penatalaksaan']; ?></td>
                            <td><?php
                            $do=$r['id_dokter'];
                            $qd=mysqli_query($conn,"SELECT * FROM dokter WHERE kodeDokter='$do'");
                            $rdk=mysqli_fetch_array($qd);
                            echo $rdk['nama_dokter'];
                            ?></td>  
                             
                            <td><button class="btn btn-success" onclick="window.location='mod_anc/f_racik.php?kode_pasien=<?php echo $kode; ?>&&kode_resep=<?php echo $r['kode_resep']; ?>&&status=<?php echo $status; ?>'"><i class="fa fa-print"></i></button>
                            <button class="btn btn-danger" onclick="window.location='mod_anc/aksi_anc.php?module=hapus_rekamanc&&id_ranc=<?php echo $rranc['id_ranc']; ?>&&kode=<?php echo $kode; ?>&&status=pasien'"><i class="icon-trash icon-white"></i></button></td>
                        </tr>
                    <?php
                            $no++;
                        }
                    ?>
                        </tbody>
                        </table>
                    </div>
				</div>
				
				<?php
						if(isset($kode)){
						$querm=mysqli_query($conn,"SELECT * FROM rekamanc");
						$num=mysqli_num_rows($querm);
						$jmlh=$num+1;
						$waktu=date('dmy');
						$noranc="RANC-".$waktu.$jmlh;
						?>
						
				<div class="tab-pane" id="addRekamAnc">
						<hr>
						<form method="post" action="<?php echo $aksi."?module=tambahranc" ?>">
							<div class="span6">
							
								<div class="control-group">
									<label class="control-label" for="inputEmail">Nomor Rekam ANC</label>
									<div class="controls">
									<input type="text" class="span8" value="<?php echo $noranc ?>" disabled>
									<input type="hidden" class="span8" value="<?php echo $noranc ?>" name="xnoranc">
									<input type="hidden" class="span8" value="<?php echo $kode ?>" name="xkodepasien">
									<input type="hidden" class="span8" value="<?php echo $nip ?>" name="xnip">
									<input type="hidden" class="span8" value="<?php echo $rus['kodeUser'] ?>" name="xkodeuser">
									<input type="hidden" class="span8" value="<?php echo $ranc['nomorAnc'] ?>" name="xnomorAnc">
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
								<div class="control-group">
									<label class="control-label" for="inputEmail">Data Subyektif</label>
									<div class="controls">
									<textarea class="span8" name="xsubyektif"></textarea>
									</div>
								</div>
								<h4>OBYEKTIF</h4>
									

								<div class="control-group">
									<label class="control-label" for="inputText">TD (MMHg)</label>
									<div class="controls">
									<input type="text" class="" name="xtd"  id="inputText"   placeholder "Ex. 104/65 or 101/58">
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputPassword">BB(Kg)</label>
									<div class="controls">
									<input type="text" class="span12" name="xbb"  id="inputText"  placeholder "Ex. 59 Kg">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">UK(Mg)</label>
									<div class="controls">
									<input type="text" class="span12" name="xuk"  id="inputText"  placeholder "Ex. 21+5">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">TFU(Cm)</label>
									<div class="controls">
									<input type="text" class="span12" name="xtfu"  id="inputText"  placeholder "Ex. 31 Cm">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">Letak Janin</label>
									<div class="controls">
									<textarea class="span8" name="xletak_janin"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">DJJ</label>
									<div class="controls">
									<input type="text" class="span12" name="xdjj"  id="inputText" placeholder "Ex. 31 Cm">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">Laboratorium</label>
									<div class="controls">
									<textarea class="span8" name="xlab"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">Pemeriksaan Khusus</label>
									<div class="controls">
									<textarea class="span8" name="xpemeriksaan"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">Analisa</label>
									<div class="controls">
									<textarea class="span8" name="xanalisa"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">Penatalaksaan</label>
									<div class="controls">
									<textarea class="span8" name="xpenatalaksaan"></textarea>
									</div>
								</div>
								
																				
								<div class="control-group">
									<div class="controls">								
									<button class="btn btn-danger" data-toggle="tab" href="#rekamAnc"><i class="icon-arrow-left icon-white"></i> Back</button>
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
									</div>
								</div>
							</div>							
							<div class="span4">								
								<div id="tampil"></div>
								
							</div>	
						</form>							
						</div>	
					<?php
							}
					?>
				<!-- /.addANC -->	
					<div class="tab-pane" id="addAnc">
					<h4>ADD DATA ANC</h4>
					<form method="post" action="<?php echo $aksi."?module=tambahanc" ?>">
					<div class="span3 offset1">		
							<div class="control-group">
									<label class="control-label" for="inputEmail">No. Register ANC</label>
									<div class="controls">
									<input type="text" class="span8" value="<?php echo $nounik ?>" disabled>
									<input type="hidden" class="span8" value="<?php echo $nounik ?>" name="xNoanc">
									<input type="hidden" class="span8" value="<?php echo $kode ?>" name="xKodepasien">
									<input type="hidden" class="span8" value="<?php echo $rus['kodeUser'] ?>" name="xKodeuser">
									<input type="hidden" class="span8" value="<?php echo $status ?>" name="xStatus">
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
				            <select name="xkodedokter" required>
                                <option></option>
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
								<select name="xagama" class="form-control" style="width:150px;" tabindex="2" >
                                           
										<?php
										$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";
										if($device==""){$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong='selected="selected"';}
										else if($device=="Islam"){ $islam='selected="selected"';$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Kristen"){$islam="";$kristen='selected="selected"';$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Katolik"){ $islam="";$kristen="";$katolik='selected="selected"';$hindu="";$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Hindu"){ $islam="";$kristen="";$katolik="";$hindu='selected="selected"';$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Buddha"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha='selected="selected"';$kong_hu_cu="";$kosong=""; }
										else if($device=="Kong Hu Cu"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu='selected="selected"';$kosong=""; }
										?>
										 
                                        <option value="" <?php echo $kosong; ?>></option>
										<option value="Islam" <?php echo $islam; ?>>Islam</option>
										<option value="Kristen" <?php echo $kristen; ?>>Kristen</option>
										<option value="Katolik" <?php echo $katolik; ?>>Katolik</option>
										<option value="Hindu" <?php echo $hindu; ?>>Hindu</option>
										<option value="Buddha" <?php echo $buddha; ?>>Buddha</option>
										<option value="Kong Hu Cu" <?php echo $kong_hu_cu; ?>>Kong Hu Cu</option>
										
										
									</select>
								</div>
							</div>
							
							
							
							<div class="control-group">
								<label class="control-label" for="inputText">Pekerjaan</label>
								<div class="controls">
								<input type="text" class="" name="xpekerjaan" id="inputText"  value="<?php echo $rpas['pekerjaan']; ?>">
								</div>
							</div>
							<label class="control-label" for="inputText">Pendidikan</label>
								<div class="controls">
								<select name="xpendidikan" class="form-control" style="width:150px;" tabindex="2">
                                           
										<?php
										$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";
										if($device==""){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong='selected="selected"';}
										else if($device=="SD"){$sd='selected="selected"';$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMP"){$sd="";$smp='selected="selected"';$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMA"){ $sd="";$smp="";$sma='selected="selected"';$diploma="";$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="DIPLOMA"){ $sd="";$smp="";$sma="";$diploma='selected="selected"';$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="SARJANA"){$sd="";$smp="";$sma="";$diploma="";$sarjana='selected="selected"';$tidak_sekolah="";$kosong=""; }
										else if($device=="Tidak Sekolah"){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah='selected="selected"';$kosong=""; }
										
										?>
										 
                                        <option value="" <?php echo $kosong; ?>></option>
										<option value="SD" <?php echo $sd; ?>>SD</option>
										<option value="SMP" <?php echo $smp; ?>>SMP</option>
										<option value="SMA" <?php echo $sma; ?>>SMA</option>
										<option value="DIPLOMA" <?php echo $diploma; ?>>DIPLOMA</option>
										<option value="SARJANA" <?php echo $sarjana; ?>>SARJANA</option>
										<option value="Tidak Sekolah" <?php echo $tidak_sekolah; ?>>Tidak Sekolah</option>
										
										
									</select>
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
								<textarea type="text" class="" name="xalamat"  id="inputText"  ><?php echo $rpas['alamat']; ?></textarea>
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
								<!-- <button class="btn btn-info" data-toggle="tab" href="#addAnak"><i class="icon-chevron-right icon-white"></i> Add Anak</button> -->
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
								<!--  <button class="btn btn-info" data-toggle="tab" href="#addSuami"><i class="icon-chevron-right icon-white"></i> Add Suami</button> -->
								<h4>IDENTITAS SUAMI</h4>
								<?php 
									$nip=$rpas['nip'];
									$querysuami=mysqli_query($conn,"SELECT * FROM pegawai_kel, pegawai WHERE pegawai_kel.nip_pegawai=pegawai.nip  and pegawai_kel.nip_pegawai='$nip' ");
									$rsuami=mysqli_fetch_array($querysuami);
									?>	
								
								<div class="control-group">
									<label class="control-label" for="inputText">Nama Lengkap</label>
									<div class="controls">
									<input type="text" class="" name="xnama_suami"  id="inputText" value="<?php echo $rsuami['nama_kpeg']; ?>" disabled>
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">Tgl. Lahir</label>
									<div class="controls">
									<input type="date" class="" name="xtgl_lhr_suami"  id="inputText" value="<?php echo $rsuami['tgllahir_kpeg']; ?>" disabled>
									</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="inputText">Agama</label>
								<div class="controls">
								<select name="xagama_suami" class="form-control" style="width:150px;" tabindex="2" disabled>
                                           
										<?php
										$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";
										if($device==""){$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong='selected="selected"';}
										else if($device=="Islam"){ $islam='selected="selected"';$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Kristen"){$islam="";$kristen='selected="selected"';$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Katolik"){ $islam="";$kristen="";$katolik='selected="selected"';$hindu="";$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Hindu"){ $islam="";$kristen="";$katolik="";$hindu='selected="selected"';$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Buddha"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha='selected="selected"';$kong_hu_cu="";$kosong=""; }
										else if($device=="Kong Hu Cu"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu='selected="selected"';$kosong=""; }
										?>
										 
                                        <option value="<?php echo $rsuami['agama_kpeg']; ?>" selected><?php echo $rsuami['agama_kpeg'];?></option>
										<option value="Islam" <?php echo $islam; ?>>Islam</option>
										<option value="Kristen" <?php echo $kristen; ?>>Kristen</option>
										<option value="Katolik" <?php echo $katolik; ?>>Katolik</option>
										<option value="Hindu" <?php echo $hindu; ?>>Hindu</option>
										<option value="Buddha" <?php echo $buddha; ?>>Buddha</option>
										<option value="Kong Hu Cu" <?php echo $kong_hu_cu; ?>>Kong Hu Cu</option>
										
										
									</select>
								</div>
							</div>
								<div class="control-group">
									<label class="control-label" for="inputText">Pekerjaan</label>
									<div class="controls">
									<input type="text" class="" name="xpekerjaan_suami" id="inputText"  value="<?php echo $rsuami['pekerjaan_kpeg']; ?>" disabled>
									</div>
								</div>
								<label class="control-label" for="inputText">Pendidikan</label>
								<div class="controls">
								<select name="xpendidikan_kpeg" class="form-control" style="width:150px;" tabindex="2" disabled>
                                           
										<?php
										$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";
										if($device==""){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong='selected="selected"';}
										else if($device=="SD"){$sd='selected="selected"';$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMP"){$sd="";$smp='selected="selected"';$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMA"){ $sd="";$smp="";$sma='selected="selected"';$diploma="";$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="DIPLOMA"){ $sd="";$smp="";$sma="";$diploma='selected="selected"';$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="SARJANA"){$sd="";$smp="";$sma="";$diploma="";$sarjana='selected="selected"';$tidak_sekolah="";$kosong=""; }
										else if($device=="Tidak Sekolah"){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah='selected="selected"';$kosong=""; }
										
										?>
										<option value="<?php echo $rsuami['pendidikan_kpeg']; ?>" selected><?php echo $rsuami['pendidikan_kpeg'];?></option> 
                                        
										<option value="SD" <?php echo $sd; ?>>SD</option>
										<option value="SMP" <?php echo $smp; ?>>SMP</option>
										<option value="SMA" <?php echo $sma; ?>>SMA</option>
										<option value="DIPLOMA" <?php echo $diploma; ?>>DIPLOMA</option>
										<option value="SARJANA" <?php echo $sarjana; ?>>SARJANA</option>
										<option value="Tidak Sekolah" <?php echo $tidak_sekolah; ?>>Tidak Sekolah</option>
										
										
									</select>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputText">Umur Saat Menikah</label>
									<div class="controls">
									<input type="text" class="" name="xusia_menikah_suami" id="inputText">
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">No Telepon</label>
									<div class="controls">
									<input type="text" class="" name="xno_telepon_suami" id="inputText"  value="<?php echo $rsuami['no_telepon_kpeg']; ?>" disabled>
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
									<input type="date" class="span12" name="xhtp"  id="tanggal"  placeholder "Hari Taksiran Persalinan" required>
									</div>
								</div>
								
								
								
								<div    id="xrekomendasi_cuti" >
								<input type="hidden" id="xrekomendasi_cuti" class="" name="xrekomendasi_cuti"  required>
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
								<h5>Haemorroid</h5>
								<div class="control-group">
									<div class="control-group">
										
										<label class="radio">
										<input type="radio" name="xhaemorroid" id="optionsRadios1" value="YA">
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xhaemorroid" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xhaemorroid_tahun" id="inputText"   placeholder "Tahun Ex. 2018">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class=""name="xhaemorroid_keterangan" id="inputText"   placeholder "Keterangan Ex. Haemorroid ">
									</div>
									
								</div>
								<h5>Alergi</h5>
								<div class="control-group">
									<div class="control-group">
										
										<label class="radio">
										<input type="radio" name="xalergi" id="optionsRadios1" value="YA">
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xalergi" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xalergi_tahun" id="inputText"   placeholder "Tahun Ex. 2018">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class=""name="xalergi_keterangan" id="inputText"   placeholder "Keterangan Ex. Alergi ">
									</div>
									
								</div>
								<h5>Asthma</h5>
								<div class="control-group">
									<div class="control-group">
										
										<label class="radio">
										<input type="radio" name="xasthma" id="optionsRadios1" value="YA">
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xasthma" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xasthma_tahun" id="inputText"   placeholder "Tahun Ex. 2018">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class=""name="xasthma_keterangan" id="inputText"   placeholder "Keterangan Ex. Asthma ">
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
						
					<!-- /.end addANC -->		
					
					<!-- /.editANC -->
					<?php
				$kode=$_GET['kodepasien'];
				$nip=$_GET['nip'];
                $status=$_GET['status'];
				if($kode!='' AND $status=='pasien'){
				$qupas=mysqli_query($conn,"SELECT * FROM anc WHERE kodePasien='$kode' ORDER BY id_anc desc");
				$ranc=mysqli_fetch_array($qupas);
				?>
					<div class="tab-pane" id="editAnc">
					<form method="post" action="<?php echo $aksi."?module=updateanc" ?>">
					<div class="span3 offset1">
							<h4>EDIT DATA ANC</h4>
							<div class="control-group">
									<label class="control-label" for="inputEmail">No. Register ANC</label>
									<div class="controls">
									
									<input type="text" class="span8" value="<?php echo $ranc['nomorAnc']?>" disabled>
									<input type="hidden" class="span8" value="<?php echo $ranc['nomorAnc'] ?>" name="xAncNo">
									<input type="hidden" class="span8" value="<?php echo $kode ?>" name="xKodepasien">
									<input type="hidden" class="span8" value="<?php echo $rus['kodeUser'] ?>" name="xKodeuser">
									<input type="hidden" class="span8" value="<?php echo $status ?>" name="xStatus">
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
				            <select name="xkodedokter" required>
                                <option></option>
                                <?php
                                    $qdok=mysqli_query($conn,"SELECT * FROM dokter");
                                    while($rd=mysqli_fetch_array($qdok)){
                                ?>
								<?php if($rd['kodeDokter'] ==$ranc['kodedokter'] ):?>
								
								<option value="<?php echo $rd['kodeDokter'] ?>" selected><?php echo $rd['nama_dokter'] ?></option>
								<?php else:?>
								
                                <option value="<?php echo $rd['kodeDokter'] ?>"><?php echo $rd['nama_dokter'] ?></option>
								<?php endif;?>
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
								<select name="xagama" class="form-control" style="width:150px;" tabindex="2" >
                                           
										<?php
										$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";
										if($device==""){$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong='selected="selected"';}
										else if($device=="Islam"){ $islam='selected="selected"';$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Kristen"){$islam="";$kristen='selected="selected"';$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Katolik"){ $islam="";$kristen="";$katolik='selected="selected"';$hindu="";$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Hindu"){ $islam="";$kristen="";$katolik="";$hindu='selected="selected"';$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Buddha"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha='selected="selected"';$kong_hu_cu="";$kosong=""; }
										else if($device=="Kong Hu Cu"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu='selected="selected"';$kosong=""; }
										?>
										 
                                        
										<option value="<?php echo $rpas['agama']; ?>" selected><?php echo $rpas['agama']; ?></option>
										<option value="Islam" <?php echo $islam; ?>>Islam</option>
										<option value="Kristen" <?php echo $kristen; ?>>Kristen</option>
										<option value="Katolik" <?php echo $katolik; ?>>Katolik</option>
										<option value="Hindu" <?php echo $hindu; ?>>Hindu</option>
										<option value="Buddha" <?php echo $buddha; ?>>Buddha</option>
										<option value="Kong Hu Cu" <?php echo $kong_hu_cu; ?>>Kong Hu Cu</option>
										
										
									</select>
								</div>
							</div>
											
							
							
							<div class="control-group">
								<label class="control-label" for="inputText">Pekerjaan</label>
								<div class="controls">
								<input type="text" class="" name="xpekerjaan" id="inputText"  value="<?php echo $rpas['pekerjaan']; ?>">
								</div>
							</div>
							<label class="control-label" for="inputText">Pendidikan</label>
								<div class="controls">
								<select name="xpendidikan" class="form-control" style="width:150px;" tabindex="2" >
                                           
										<?php
										$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";
										if($device==""){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong='selected="selected"';}
										else if($device=="SD"){$sd='selected="selected"';$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMP"){$sd="";$smp='selected="selected"';$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMA"){ $sd="";$smp="";$sma='selected="selected"';$diploma="";$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="DIPLOMA"){ $sd="";$smp="";$sma="";$diploma='selected="selected"';$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="SARJANA"){$sd="";$smp="";$sma="";$diploma="";$sarjana='selected="selected"';$tidak_sekolah="";$kosong=""; }
										else if($device=="Tidak Sekolah"){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah='selected="selected"';$kosong=""; }
										
										?>
										<option value="<?php echo $rpas['pendidikan']; ?>" selected><?php echo $rpas['pendidikan'];?></option> 
                                        
										<option value="SD" <?php echo $sd; ?>>SD</option>
										<option value="SMP" <?php echo $smp; ?>>SMP</option>
										<option value="SMA" <?php echo $sma; ?>>SMA</option>
										<option value="DIPLOMA" <?php echo $diploma; ?>>DIPLOMA</option>
										<option value="SARJANA" <?php echo $sarjana; ?>>SARJANA</option>
										<option value="Tidak Sekolah" <?php echo $tidak_sekolah; ?>>Tidak Sekolah</option>
										
										
									</select>
								</div>
                            <div class="control-group">
								<label class="control-label" for="inputText">Umur Saat Menikah</label>
								<div class="controls">
								<input type="text" class="" name="xusia_menikah_ibu"  id="inputText" value="<?php echo $ranc['usia_menikah_ibu']; ?>">
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
								<textarea type="text" class="" name="xalamat"  id="inputText"><?php echo $rpas['alamat']; ?></textarea>
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
								<textarea type="text" class="" name="xkontrasepsi" id="inputText" ><?php echo $ranc['kontrasepsi']; ?></textarea>
								</div>
							</div>
								<h4>IDENTITAS ANAK</h4>
								<!-- <button class="btn btn-info" data-toggle="tab" href="#addAnak"><i class="icon-chevron-right icon-white"></i> Add Anak</button> -->
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
								<!--  <button class="btn btn-info" data-toggle="tab" href="#addSuami"><i class="icon-chevron-right icon-white"></i> Add Suami</button> -->
								<h4>IDENTITAS SUAMI</h4>
								<?php 
									$nip=$rpas['nip'];
									$querysuami=mysqli_query($conn,"SELECT * FROM pegawai_kel, pegawai WHERE pegawai_kel.nip_pegawai=pegawai.nip  and pegawai_kel.nip_pegawai='$nip' ");
									$rsuami=mysqli_fetch_array($querysuami);
									?>	
								
								<div class="control-group">
									<label class="control-label" for="inputText">Nama Lengkap</label>
									<div class="controls">
									<input type="text" class="" name="xnama_suami"  id="inputText" value="<?php echo $rsuami['nama_kpeg']; ?>" disabled>
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">Tgl. Lahir</label>
									<div class="controls">
									<input type="date" class="" name="xtgl_lhr_suami"  id="inputText" value="<?php echo $rsuami['tgllahir_kpeg']; ?>" disabled>
									</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="inputText">Agama</label>
								<div class="controls">
								<select name="xagama_suami" class="form-control" style="width:150px;" tabindex="2" disabled>
                                           
										<?php
										$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";
										if($device==""){$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong='selected="selected"';}
										else if($device=="Islam"){ $islam='selected="selected"';$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Kristen"){$islam="";$kristen='selected="selected"';$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Katolik"){ $islam="";$kristen="";$katolik='selected="selected"';$hindu="";$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Hindu"){ $islam="";$kristen="";$katolik="";$hindu='selected="selected"';$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Buddha"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha='selected="selected"';$kong_hu_cu="";$kosong=""; }
										else if($device=="Kong Hu Cu"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu='selected="selected"';$kosong=""; }
										?>
										 
                                       <option value="<?php echo $rsuami['agama_kpeg']; ?>" selected><?php echo $rsuami['agama_kpeg']; ?></option>
										<option value="Islam" <?php echo $islam; ?>>Islam</option>
										<option value="Kristen" <?php echo $kristen; ?>>Kristen</option>
										<option value="Katolik" <?php echo $katolik; ?>>Katolik</option>
										<option value="Hindu" <?php echo $hindu; ?>>Hindu</option>
										<option value="Buddha" <?php echo $buddha; ?>>Buddha</option>
										<option value="Kong Hu Cu" <?php echo $kong_hu_cu; ?>>Kong Hu Cu</option>
										
										
									</select>
								</div>
							</div>
								<div class="control-group">
									<label class="control-label" for="inputText">Pekerjaan</label>
									<div class="controls">
									<input type="text" class="" name="xpekerjaan_suami" id="inputText"  value="<?php echo $rsuami['pekerjaan_kpeg']; ?>" disabled>
									</div>
								</div>
								<label class="control-label" for="inputText">Pendidikan</label>
								<div class="controls">
								<select name="xpendidikan_kpeg" class="form-control" style="width:150px;" tabindex="2" disabled>
                                           
										<?php
										$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";
										if($device==""){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong='selected="selected"';}
										else if($device=="SD"){$sd='selected="selected"';$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMP"){$sd="";$smp='selected="selected"';$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMA"){ $sd="";$smp="";$sma='selected="selected"';$diploma="";$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="DIPLOMA"){ $sd="";$smp="";$sma="";$diploma='selected="selected"';$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="SARJANA"){$sd="";$smp="";$sma="";$diploma="";$sarjana='selected="selected"';$tidak_sekolah="";$kosong=""; }
										else if($device=="Tidak Sekolah"){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah='selected="selected"';$kosong=""; }
										
										?>
										<option value="<?php echo $rsuami['pendidikan_kpeg']; ?>" selected><?php echo $rsuami['pendidikan_kpeg'];?></option> 
                                        
										<option value="SD" <?php echo $sd; ?>>SD</option>
										<option value="SMP" <?php echo $smp; ?>>SMP</option>
										<option value="SMA" <?php echo $sma; ?>>SMA</option>
										<option value="DIPLOMA" <?php echo $diploma; ?>>DIPLOMA</option>
										<option value="SARJANA" <?php echo $sarjana; ?>>SARJANA</option>
										<option value="Tidak Sekolah" <?php echo $tidak_sekolah; ?>>Tidak Sekolah</option>
										
										
									</select>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputText">Umur Saat Menikah</label>
									<div class="controls">
									<input type="text" class="" name="xusia_menikah_suami" id="inputText" value="<?php echo $ranc['usia_menikah_suami']; ?>" >
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">No Telepon</label>
									<div class="controls">
									<input type="text" class="" name="xno_telepon_suami" id="inputText"  value="<?php echo $rsuami['no_telepon_kpeg']; ?>" disabled>
									</div>
								</div>
						
								<h4>PENGAMATAN KEHAMILAN</h4>
									

								<div class="control-group">
									<label class="control-label" for="inputText">HPHT(Hari Pertama Haid Terakhir)</label>
									<div class="controls">
									<input type="date" class="" name="xhpht"  id="inputText"   value="<?php echo $ranc['hpht']; ?>">
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputPassword">HTP (Hari Taksiran Persalinan)</label>
									<div class="controls">
									<input type="date" class="span12" name="xhtp"  id="htp" value="<?php echo $ranc['htp']; ?>" required>
									</div>
								</div>
								<div class="control-group">
									
									<div class="controls" id="xcuti" >
									<label class="control-label" for="inputPassword">Rekomendasi Cuti</label>
									<input type="date" class="span12" name="xcuti" id="xcuti" value="<?php echo $ranc['rekomendasi_cuti']; ?>" required>
									</div>
								</div>
								
								<div class="control-group">
								<label class="control-label" for="inputText">Keluhan</label>
								<div class="controls">
								<textarea type="text" class="" name="xkeluhan" id="inputText"   ><?php echo $ranc['keluhan']; ?> </textarea>
								</div>
							</div>
							
							<div class="control-group">
									<label class="control-label" for="inputText">Awal (Cuti)</label>
									<div class="controls">
									<input type="date" class="" name="xAwalcuti"  id="inputText"   value="<?php echo $ranc['begincuti']; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputText">Akhir(Cuti)</label>
									<div class="controls">
									<input type="date" class="" name="xAkhircuti"  id="inputText"   value="<?php echo $ranc['endcuti']; ?>">
									</div>
								</div>
								<h4>RIWAYAT OBSTERTRI</h4>
									

								<div class="control-group">
									<label class="control-label" for="inputText">G</label>
									<div class="controls">
									<input type="text" class="" name="xg"  id="inputText"  value="<?php echo $ranc['g']; ?>">
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">P</label>
									<div class="controls">
									<input type="text" class="" name="xp"  id="inputText"   value="<?php echo $ranc['p']; ?>">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputText">A</label>
									<div class="controls">
									<input type="text" class="" name="xa"  id="inputText"  value="<?php echo $ranc['a']; ?>">
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="inputText">AH</label>
									<div class="controls">
									<input type="text" class=""name="xah"  id="inputText"   value="<?php echo $ranc['ah']; ?>">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputText">Jumlah Lahir Mati</label>
									<div class="controls">
									<input type="text" class="" name="xlahir_mati"  id="inputText"   value="<?php echo $ranc['jumlah_lahir_mati']; ?>">
									</div>
								</div>
								
								<h4>ABORTUS</h4>
									

								<label class="control-label" for="inputText">Jenis Abortus</label>
								<div class="controls">
								<select name="xabortus_jenis" class="form-control" style="width:150px;" tabindex="2" >
                                           
										<?php
										$abortus_komplit="";$abortus_inkomplit="";$abortus_insipiens="";$abortus_imminens="";$missed_abortion="";$abortus_habitualis="";$tidak_jadi_hamil="";$kosong="";
										if($device==""){$abortus_komplit="";$abortus_inkomplit="";$abortus_insipiens="";$abortus_imminens="";$missed_abortion="";$abortus_habitualis="";$tidak_jadi_hamil="";$kosong='selected="selected"';}
										else if($device=="Abortus Komplit"){$abortus_komplit='selected="selected"';$abortus_inkomplit="";$abortus_insipiens="";$abortus_imminens="";$missed_abortion="";$abortus_habitualis="";$tidak_jadi_hamil="";$kosong="";}
										else if($device=="Abortus Inkomplit"){$abortus_komplit="";$abortus_inkomplit='selected="selected"';$abortus_insipiens="";$abortus_imminens="";$missed_abortion="";$abortus_habitualis="";$tidak_jadi_hamil="";$kosong="";}
										else if($device=="Abortus Insipiens"){ $abortus_komplit="";$abortus_inkomplit="";$abortus_insipiens='selected="selected"';$abortus_imminens="";$missed_abortion="";$abortus_habitualis="";$tidak_jadi_hamil="";$kosong=""; }
										else if($device=="Abortus Imminens"){ $abortus_komplit="";$abortus_inkomplit="";$abortus_insipiens="";$abortus_imminens='selected="selected"';$missed_abortion="";$abortus_habitualis="";$tidak_jadi_hamil="";$kosong=""; }
										else if($device=="Missed Abortion"){$abortus_komplit="";$abortus_inkomplit="";$abortus_insipiens="";$abortus_imminens="";$missed_abortion='selected="selected"';$abortus_habitualis="";$tidak_jadi_hamil="";$kosong=""; }
										else if($device=="Abortus Habitualis"){$abortus_komplit="";$abortus_inkomplit="";$abortus_insipiens="";$abortus_imminens="";$missed_abortion="";$abortus_habitualis='selected="selected"';$tidak_jadi_hamil="";$kosong=""; }
										else if($device=="Tidak Jadi Hamil"){$abortus_komplit="";$abortus_inkomplit="";$abortus_insipiens="";$abortus_imminens="";$missed_abortion="";$abortus_habitualis="";$tidak_jadi_hamil='selected="selected"';$kosong=""; }
										?>
										
										<option value="<?php echo $ranc['abortus_jenis']; ?>" selected><?php echo $ranc['abortus_jenis'];?></option> 
                                        <option value="Tidak Jadi Hamil" <?php echo $tidak_jadi_hamil; ?>>Tidak Jadi Hamil</option>
										<option value="Abortus Komplit" <?php echo $abortus_komplit; ?>>Abortus Komplit</option>
										<option value="Abortus Inkomplit" <?php echo $abortus_inkomplit; ?>>Abortus Inkomplit</option>
										<option value="Abortus Insipiens" <?php echo $abortus_insipiens; ?>>Abortus Insipiens</option>
										<option value="Abortus Imminens" <?php echo $abortus_imminens; ?>>Abortus Imminens</option>
										<option value="Missed Abortion" <?php echo $missed_abortion; ?>>Missed Abortion</option>
										<option value="Abortus Habitualis" <?php echo $abortus_habitualis; ?>>Abortus Habitualis</option>
										
										
									</select>
								</div>
								
								
								<div class="control-group">
									<label class="control-label" for="inputText">Penyebab Abortus</label>
									<div class="controls">
									<input type="text" class="" name="xabortus_reason"  id="inputText"  value="<?php echo $ranc['abortus_reason']; ?>">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">Tgl dinyatakan abortus</label>
									<div class="controls">
									<input type="date" class="span12" name="xabortus_date"  id="htp" value="<?php echo $ranc['abortus_date']; ?>" >
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputText">Nama (RS / Klinik / Puskesmas) </label>
									<div class="controls">
									<input type="text" class=""name="xabortus_oleh"  id="inputText"   value="<?php echo $ranc['abortus_oleh']; ?>">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputText">Dokter / Petugas Medis (RS / Klinik / Puskesmas)</label>
									<div class="controls">
									<input type="text" class="" name="xabortus_from"  id="inputText"   value="<?php echo $ranc['abortus_from']; ?>">
									</div>
								</div>
								
								<label class="control-label" for="inputPassword">Pemeriksa Tambahan (Dokter / Petugas Medis)</label>
						<div class="controls">
				            <select name="xabortus_petugas" >
                                <option></option>
                                <?php
                                    $qdok=mysqli_query($conn,"SELECT * FROM dokter");
                                    while($rd=mysqli_fetch_array($qdok)){
                                ?>
								<?php if($rd['kodeDokter'] ==$ranc['abortus_petugas'] ):?>
								
								<option value="<?php echo $rd['kodeDokter'] ?>" selected><?php echo $rd['nama_dokter'] ?></option>
								<?php else:?>
								
                                <option value="<?php echo $rd['kodeDokter'] ?>"><?php echo $rd['nama_dokter'] ?></option>
								<?php endif;?>
                                <?php
                                    }
                                ?>
                            </select>
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
										<?php
								$jantung=$ranc['jantung'];
								if($jantung=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xkelainan_jantung" id="optionsRadios1" value="YA" checked >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_jantung" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xkelainan_jantung" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_jantung" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>	
								
									<label class="control-label" for="inputText">Tahun </label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_jantung_tahun" id="inputText"   value="<?php echo $ranc['kelainan_jantung_tahun']; ?>" >
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_jantung_keterangan" id="inputText"   value="<?php echo $ranc['kelainan_jantung_ket']; ?>" >
									</div>
									
								</div>
								<h5>Tuberkulosis</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$tuberkulosis=$ranc['tuberkulosis'];
								if($tuberkulosis=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xtuberkulosis" id="optionsRadios1" value="YA" checked >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xtuberkulosis" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xtuberkulosis" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xtuberkulosis" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xtuberkulosis_tahun" id="inputText"   value="<?php echo $ranc['tuberkulosis_tahun']; ?>" >
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class=""name="xtuberkulosis_keterangan" id="inputText"   value="<?php echo $ranc['tuberkulosis_ket']; ?>" >
									</div>
									
								</div>
								<h5>Ginjal</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$ginjal=$ranc['ginjal'];
								if($ginjal=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xkelainan_ginjal" id="optionsRadios1" value="YA" checked>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_ginjal" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xkelainan_ginjal" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_ginjal" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
								
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_ginjal_tahun" id="inputText"   value="<?php echo $ranc['kelainan_ginjal_tahun']; ?>" >
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_ginjal_keterangan" id="inputText"   value="<?php echo $ranc['kelainan_ginjal_ket']; ?>" >
									</div>
									
								</div>	
								<h5>Kencing Manis</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$kencing_manis=$ranc['kencing_manis'];
								if($kencing_manis=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xkencing_manis" id="optionsRadios1" value="YA" checked >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkencing_manis" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xkencing_manis" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkencing_manis" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
							
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xkencing_manis_tahun" id="inputText"   value="<?php echo $ranc['kencing_manis_tahun']; ?>" >
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkencing_manis_keterangan" id="inputText"  value="<?php echo $ranc['kencing_manis_ket']; ?>">
									</div>
									
								</div>	
								<h5>Kelainan Darah</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$kelainan_darah=$ranc['kelainan_darah'];
								if($kelainan_darah=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xkelainan_darah" id="optionsRadios1" value="YA" checked>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_darah" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xkelainan_darah" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xkelainan_darah" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
								
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_darah_tahun"  id="inputText"   value="<?php echo $ranc['kelainan_darah_tahun']; ?>" >
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xkelainan_darah_keterangan"  id="inputText"  value="<?php echo $ranc['kelainan_darah_ket']; ?>" >
									</div>
									
								</div>
								
								
									<h5>Operasi</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$operasi=$ranc['operasi'];
								if($operasi=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xoperasi" id="optionsRadios1" value="YA" checked>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xoperasi" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xoperasi" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xoperasi" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xoperasi_tahun" id="inputText"   value="<?php echo $ranc['operasi_tahun']; ?>">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xoperasi_keterangan" id="inputText"  value="<?php echo $ranc['operasi_ket']; ?>">
									</div>
									
								</div>
								
								<h5>Haemorroid</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$haemorroid=$ranc['haemorroid'];
								if($haemorroid=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xhaemorroid" id="optionsRadios1" value="YA" checked>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xhaemorroid" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xhaemorroid" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xhaemorroid" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xhaemorroid_tahun" id="inputText"   value="<?php echo $ranc['haemorroid_tahun']; ?>">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xhaemorroid_keterangan" id="inputText"  value="<?php echo $ranc['haemorroid_ket']; ?>">
									</div>
									
								</div>
								<h5>Alergi</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$alergi=$ranc['alergi'];
								if($alergi=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xalergi" id="optionsRadios1" value="YA" checked>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xalergi" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xalergi" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xalergi" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xalergi_tahun" id="inputText"   value="<?php echo $ranc['alergi_tahun']; ?>">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xalergi_keterangan" id="inputText"  value="<?php echo $ranc['alergi_ket']; ?>">
									</div>
									
								</div>
								<h5>Asthma</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$asthma=$ranc['asthma'];
								if($asthma=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xasthma" id="optionsRadios1" value="YA" checked>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xasthma" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xasthma" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xasthma" id="optionsRadios1" value="TIDAK" checked>
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xasthma_tahun" id="inputText"   value="<?php echo $ranc['asthma_tahun']; ?>">
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class="" name="xasthma_keterangan" id="inputText"  value="<?php echo $ranc['asthma_ket']; ?>">
									</div>
									
								</div>
								<h5>Lain-lain</h5>
								<div class="control-group">
									<div class="control-group">
										<?php
								$other=$ranc['other'];
								if($other=='YA'){
								?>
										<label class="radio">
										<input type="radio" name="xother" id="optionsRadios1" value="YA" checked>
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xother" id="optionsRadios1" value="TIDAK">
										TIDAK
										</label>
									<?php
										}
										else{
										?>
										<label class="radio">
										<input type="radio" name="xother" id="optionsRadios1" value="YA" >
										YA
										</label>
										<label class="radio">
										<input type="radio" name="xother" id="optionsRadios1" value="TIDAK" checked >
										TIDAK
										</label>
										
									 <?php
											}
										?>	
									</div>
									<label class="control-label" for="inputText">Tahun</label>
									<div class="controls">
									<input type="text" class="" name="xother_tahun" id="inputText"  value="<?php echo $ranc['other_tahun']; ?>" >
									</div>
									<label class="control-label" for="inputText">Keterangan</label>
									<div class="controls">
									<input type="text" class=""name="xother_keterangan" id="inputText"  value="<?php echo $ranc['other_ket']; ?>">
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
					<?php
					}
					?>	
					<!-- /.end editANC -->
					
						
					
					<!-- /.addAanak -->	
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
						<button class="btn btn-danger" data-toggle="tab"   href="#dataKeluarga"><i class="icon-arrow-left icon-white"></i> Back</button>s
                        <button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
                    </form>
                </div>
					<!-- /.end addAanak -->	
					
					<!-- /.start addSuami -->	
					<div class="tab-pane" id="addSuami">
                    <h3>Data Suami</h3>
                    <form method="post" action="<?php echo $aksi."?module=tambahsuami" ?>">
                     
						<input type="hidden" id="inputText" name="xnip" class="" value="<?php echo $rpas['nip']; ?>">
                        
					 <div class="control-group">
						<label class="control-label" for="inputPassword">Nama</label>
						<div class="controls">
						  <input type="text" id="inputText" name="xnama_kpeg" class="span4" placeholder="Ex. Genta Alby Yatmiko">
					   </div>
				 
					 
								<label class="control-label" for="inputPassword" Value="L">Jenis Kelamin</label>
								<label class="radio">
								<input type="radio" name="xjk_kpeg" id="optionsRadios1" value="L" checked>
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="xjk_kpeg" id="optionsRadios1" value="P">
								Perempuan
								</label>
								
								<label class="control-label" for="inputPassword">Tgl Lahir</label>
								<div class="controls">
								  <input type="date" id="inputText" name="xtgllahir_kpeg" class="span4" placeholder="Ex. 14/11/1987">
							   </div>
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								  <textarea type="text" id="inputText" name="xalamat_kpeg" class="span4" placeholder="Ex. Bantul"></textarea>
							   </div>
							 
								<label class="control-label" for="inputPassword">Status Keluarga</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="xstatus_kpeg" value="Suami">
                                    <option   >-- Pilih Status --</option>    
                                    <option selected value="Suami">Suami</option>    
                                    <option value="Istri">Istri</option>    
                                    <option value="Anak Kandung">Anak Kandung</option>       
                                    <option value="Lajang">Lajang</option> 
                                </select>
				
								</div>
							
							
								<label class="control-label" for="inputText">Agama</label>
								<div class="controls">
								<select name="xagama_kpeg" class="form-control" style="width:150px;" tabindex="2" required>
                                           
										<?php
										$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";
										if($device==""){$islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong='selected="selected"';}
										else if($device=="Islam"){ $islam='selected="selected"';$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Kristen"){$islam="";$kristen='selected="selected"';$katolik="";$hindu="";$buddha="";$kong_hu_cu="";$kosong="";}
										else if($device=="Katolik"){ $islam="";$kristen="";$katolik='selected="selected"';$hindu="";$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Hindu"){ $islam="";$kristen="";$katolik="";$hindu='selected="selected"';$buddha="";$kong_hu_cu="";$kosong=""; }
										else if($device=="Buddha"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha='selected="selected"';$kong_hu_cu="";$kosong=""; }
										else if($device=="Kong Hu Cu"){ $islam="";$kristen="";$katolik="";$hindu="";$buddha="";$kong_hu_cu='selected="selected"';$kosong=""; }
										?>
										 
                                        <option value="" <?php echo $kosong; ?>></option>
										<option value="Islam" <?php echo $islam; ?>>Islam</option>
										<option value="Kristen" <?php echo $kristen; ?>>Kristen</option>
										<option value="Katolik" <?php echo $katolik; ?>>Katolik</option>
										<option value="Hindu" <?php echo $hindu; ?>>Hindu</option>
										<option value="Buddha" <?php echo $buddha; ?>>Buddha</option>
										<option value="Kong Hu Cu" <?php echo $kong_hu_cu; ?>>Kong Hu Cu</option>
										
										
									</select>
								</div>
						
									<label class="control-label" for="inputPassword">Pekerjaan</label>
								<div class="controls">
								  <input type="text" id="inputText" name="xpekerjaan_kpeg" class="span4" placeholder="Ex. Pegawai Swasta/ Buruh ">
								  
							   </div>
							
								<label class="control-label" for="inputText">Pendidikan</label>
								<div class="controls">
								<select name="xpendidikan_kpeg" class="form-control" style="width:150px;" tabindex="2" required>
                                           
										<?php
										$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";
										if($device==""){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong='selected="selected"';}
										else if($device=="SD"){$sd='selected="selected"';$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMP"){$sd="";$smp='selected="selected"';$sma="";$diploma="";$sarjana="";$tidak_sekolah="";$kosong="";}
										else if($device=="SMA"){ $sd="";$smp="";$sma='selected="selected"';$diploma="";$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="DIPLOMA"){ $sd="";$smp="";$sma="";$diploma='selected="selected"';$sarjana="";$tidak_sekolah="";$kosong=""; }
										else if($device=="SARJANA"){$sd="";$smp="";$sma="";$diploma="";$sarjana='selected="selected"';$tidak_sekolah="";$kosong=""; }
										else if($device=="Tidak Sekolah"){$sd="";$smp="";$sma="";$diploma="";$sarjana="";$tidak_sekolah='selected="selected"';$kosong=""; }
										
										?>
										 
                                        <option value="" <?php echo $kosong; ?>></option>
										<option value="SD" <?php echo $sd; ?>>SD</option>
										<option value="SMP" <?php echo $smp; ?>>SMP</option>
										<option value="SMA" <?php echo $sma; ?>>SMA</option>
										<option value="DIPLOMA" <?php echo $diploma; ?>>DIPLOMA</option>
										<option value="SARJANA" <?php echo $sarjana; ?>>SARJANA</option>
										<option value="Tidak Sekolah" <?php echo $tidak_sekolah; ?>>Tidak Sekolah</option>
										
										
									</select>
								</div>
							
								<label class="control-label" for="inputPassword">No telepon</label>
						<div class="controls">
						  <input type="text" id="inputText" name="xno_telepon_kpeg" class="span4" placeholder="Ex. 081297871114">
					   </div>
							
						
                    
                        <hr>
						<button class="btn btn-danger" data-toggle="tab"   href="#dataKeluarga"><i class="icon-arrow-left icon-white"></i> Back</button>
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