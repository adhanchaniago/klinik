<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#pegawai").keyup(function() {
		   var strtgl = $("#pegawai").val();
		   if (strtgl != "")
		   {		  
			$("#hasil_peg").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_pegawai/kel_peg.php",
			 data:"q="+ strtgl,
			 success: function(data){
			 $("#hasil_peg").css("display", "block");
			  $("#hasil_peg").html(data);
			  
			 }
			});
		   }
		   else{
		   $("#hasil_peg").css("display", "none");
		   }
		  });
			});
	</script>
<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#txtcari").keyup(function() {
		   var strcari = $("#txtcari").val();
		   if (strcari != "")
		   {
		   $("#tabel_awal").css("display", "none");

			$("#hasil").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_pegawai/cari.php",
			 data:"q="+ strcari,
			 success: function(data){
			 $("#hasil").css("display", "block");
			  $("#hasil").html(data);
			  
			 }
			});
		   }
		   else{
		   $("#hasil").css("display", "none");
		   $("#tabel_awal").css("display", "block");
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
			 url:"mod_pegawai/umur.php",
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
<?php
$aksi="mod_pegawai/aksi_pegawai.php";
switch($_GET['act']){
	default:
	
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Data Pegawai</li>
			
		</ul>
		<form  method="post" action="<?php echo "$aksi?module=sinkronisasi"; ?>" >
		<div class="control-group pull-left">
			
			<button class="btn btn-primary" type="button" onclick="window.location='media.php?module=pegawai&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah Karyawan Staff</button>
            <button class="btn btn-success" type="button" onclick="window.location='media.php?module=pegawai&&act=tambah_operator'"><i class="icon-plus icon-white"></i> Tambah Karyawan Operator</button>
            <button class="btn btn-danger" type="button" onclick="window.location='media.php?module=pegawai&&act=tambah_keluarga'"><i class="icon-plus icon-white"></i> Tambah Keluarga</button>
			
			
			
  
			<button type="submit" class="btn btn-warning" id="myButton" ><i class="icon-refresh icon-white"></i> Sinkronisasi</button>    
			<script>
			$('#myButton').on('click', function () {
			var $btn = $(this).button('loading')
			// business logic...
			$btn.button('loading')
			})
			</script>
			
		
		</div>
		</form>
		<form class="form-search pull-right">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-search"></i></span>
								<input class="span3" id="txtcari" type="text" placeholder="Search">
							</div>
		</form>
		<hr>
		<div class="row-fluid">
			<div class="span12 pull-left">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<table class="table table-striped pegawai">
					<thead>
						<tr class="head1">
							<td>No</td><td>Unit</td><td>KJ</td><td>NIK</td><td>Nama Pegawai</td><td>Istri/Suami</td><td>Anak</td><td>Susunan Keluarga</td><td>Tanggal Lahir</td><td>Status</td><td>Alamat</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php					
					$query=mysqli_query($conn,"SELECT * FROM pegawai ORDER BY nama_pegawai ASC LIMIT $posisi,$batas");
					$no=$posisi+1;
					while($r=mysqli_fetch_array($query)){
                        $nip=$r['nip'];
					?>					
						<tr>
							<td><?php echo $no; ?></td><td><?php echo $r['unit']; ?></td><td><?php echo $r['kj']; ?></td><td><?php echo $r['nip']; ?></td><td><?php echo $r['nama_pegawai']; ?></td>
                            <td>
                                <?php
                                if($r['status_kel']=='Istri'){
                                    $query_suami=mysqli_query($conn,"SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip AND pegawai_kel.status_kpeg='Suami'");
                                    echo mysqli_num_rows($query_suami);
                                    
                                }
                                elseif($r['status_kel']=='Suami'){
                                    $query_istri=mysqli_query($conn,"SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip AND pegawai_kel.status_kpeg='Istri'");
                                    echo mysqli_num_rows($query_istri);
                   
                                }
                                ?>    
                        </td>
                            <td>
                            <?php
                                $query_anak=mysqli_query($conn,"SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip AND pegawai_kel.status_kpeg='Anak Kandung'");
                                echo mysqli_num_rows($query_anak);
                                ?>
                            </td>
                            <td>
                            <?php
                            echo "<b>".$r['nama_pegawai']."</b><br>";
                                $query_kel=mysqli_query($conn,"SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip ORDER BY pegawai_kel.id_kpeg ASC");
                                $num_kel=mysqli_num_rows($query_kel);
                                while($r_kel=mysqli_fetch_array($query_kel)){
                                    echo $r_kel['nama_kpeg']." <a href='$aksi?module=hapus_kel&&id_kpeg=$r_kel[id_kpeg]'><span class='fa fa-close alert-danger'></span></a>"."<br>";
                                }
                                
                                
                                ?>
                            </td>
                            <td><?php echo tgl_indo($r['tgl_lhr'])."<br>";
                                $query_kel=mysqli_query($conn,"SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip ORDER BY pegawai_kel.id_kpeg ASC");
                                $num_kel=mysqli_num_rows($query_kel);
                                while($r_kel=mysqli_fetch_array($query_kel)){
                                    echo tgl_indo($r_kel['tgllahir_kpeg'])."<br>";
                                }
                                ?></td><td><?php  echo $r['status_kel']." / ".$r['jk']."<br>";
                            $query_kel=mysqli_query($conn,"SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip ORDER BY pegawai_kel.id_kpeg ASC");
                                $num_kel=mysqli_num_rows($query_kel);
                                while($r_kel=mysqli_fetch_array($query_kel)){
                                    echo $r_kel['status_kpeg']." / ".$r_kel['jk_kpeg']."<br>";
                                }
                            ?></td><td><?php  echo $r['alamat'] ?></td><td><div class="btn-group">
								<a class="btn btn-primary" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=pegawai&&act=edit&&id_pegawai=<?php echo $r['id_pegawai']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&id_pegawai=$r[id_pegawai]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data pegawai <?php echo $r['nama_pegawai']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
						</tr>
					
					<?php
					$no++;
					}
					?>
					<tr>
							<td colspan="11">
							<?php
							$jmldata=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pegawai"));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman); 
							echo "$linkHalaman";
							?><td>Jumlah Record <?php echo $jmldata; ?></td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</section>
<?php
break;
case "tambah_operator":
?>
<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#ameya").keyup(function() {
		   var strcari = $("#ameya").val();
		   if (strcari != "")
		   {
			$("#hasil_ameya").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_pegawai/cari_ameya.php",
			 data:"q="+ strcari,
			 success: function(data){
			 $("#hasil_ameya").css("display", "block");
			  $("#hasil_ameya").html(data);
			  
			 }
			});
		   }
		   else{
		   $("#hasil_ameya").css("display", "none");
	
		   }
		  });
			});
	</script>
<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=pegawai">Data Karyawan</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Karyawan</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah_operator"; ?>">
				<input type="hidden" id="inputText" name="t12" value="<?php echo $rus['kodeUser']; ?>"  class="span11">
				<fieldset>
				<legend class="span7 offset1">Cari Karyawan
				
				<input type="text" class="span4" id="ameya" name="t4" placeholder="Masukkan NIK/NAMA " required>
				
				</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
							<div id="hasil_ameya"></div>
							
				</div>
				
							
						
			
				<div class="span3 offset1">							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Location</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="t9">
                                    <option disabled>-- Pilih Location --</option>    
                                    <option selected value="Ameya">Ameya</option>    
                                    <option value="Anggun">Anggun</option>    
                                    <option value="Sgtc">Sgtc</option>       
                                     
                                </select>
				
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Status</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="t2">
                                    <option  disabled>-- Pilih Status --</option>    
                                    <option value="Staff">Staff</option>    
                                    <option selected value="Operator">Operator</option>    
                                    <option value="LPK">LPK</option>       
                                    <option value="HL">Harian Lepas</option> 
                                </select>
				
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Status Keluarga</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="t7">
                                    <option disabled>-- Pilih Status --</option>    
                                    <option value="Suami">Suami</option>    
                                    <option value="Istri">Istri</option>    
                                    <option value="Anak Kandung">Anak Kandung</option>       
                                    <option selected  value="Lajang">Lajang</option> 
                                </select>
				
							</div>
								<hr>
								</div>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
							
							
							
							</div>
							</fieldset>
						</form>	
			</div>
		</div>
	</section>


	
<?php
break;
case "tambah":
?>

		<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=pegawai">Data Karyawan</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Karyawan</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<input type="hidden" id="inputText" name="t12" value="<?php echo $rus['kodeUser']; ?>"  class="span11">
				<fieldset>
				<legend class="span7 offset1">Tambah Pasien</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
							<div class="control-group">
								<label class="control-label" for="inputPassword">NIK</label>
								<div class="controls">
								<input type="text" id="inputText" name="t1" class="span11">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Location</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="t9">
                                    <option disabled>-- Pilih Location --</option>    
                                    <option selected value="Ameya">Ameya</option>    
                                    <option value="Anggun">Anggun</option>    
                                    <option value="Sgtc">Sgtc</option>       
                                     
                                </select>
				
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Status</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="t2">
                                    <option disabled>-- Pilih Status --</option>    
                                    <option value="Staff">Staff</option>    
                                    <option selected value="Operator">Operator</option>    
                                    <option value="LPK">LPK</option>       
                                    <option value="HL">Harian Lepas</option> 
                                </select>
				
								</div>
							</div>
							
                            
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Karyawan</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" name="t3">
								</div>
							</div>
							
							
							<div class="control-group">
									<label class="control-label" for="inputEmail">Department</label>
									<div class="controls">
									<select name="t4">
										<option>Pilih Department</option>
										<?php
										$con=mysqli_connect("localhost","root","managersql");
										mysqli_select_db($con,"db_balaik3ameya");
										$qdepartment=mysqli_query($con,"SELECT * FROM tbl_department");
										while($rdepartment=mysqli_fetch_array($qdepartment)){
										?>
										<option value="<?php echo $rdepartment['department_nama']; ?>"><?php echo $rdepartment['department_nama']; ?></option>
										<?php
										}
										?>
									</select>
									</div>
						</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<label class="radio">
								<input type="radio" name="t5" id="optionsRadios1" value="L">
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="t5" id="optionsRadios1" value="P">
								Perempuan
								</label>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								<input type="date"   class="span12" name="t6" id="tanggal">
								</div>
							</div>
							<div id="hasil_umur"></div>
							<hr>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
				</div>
				<div class="span3 offset1">							
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Status Keluarga</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="t7">
                                    <option  disabled>-- Pilih Status --</option>    
                                    <option value="Suami">Suami</option>    
                                    <option value="Istri">Istri</option>    
                                    <option value="Anak Kandung">Anak Kandung</option>       
                                    <option selected value="Lajang">Lajang</option> 
                                </select>
				
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea name="t8" class="span11"></textarea>
								</div>
							</div>
							
							
							
							</div>
							</fieldset>
						</form>	
			</div>
		</div>
	</section>
	
	<?php
break;
        
        case "tambah_keluarga":
?>

		<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=pegawai">Data Pegawai</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Keluarga Pegawai</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah_kel"; ?>">
			
				<fieldset>
				<legend class="span7 offset1">Tambah Keluarga Pegawai : <input type="text" name="t1" id="pegawai" class="span3" required></legend>
				<div class="clear"></div>
				<div class="span3 offset1">
				
                            <div id="hasil_peg"></div>
							
				</div>
				<div class="span3 offset1">							
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Anggota</label>
								<div class="controls">
								<input type="text" id="inputText" name="t1" class="span11" value="<?php echo $r['nip'] ?>">
								</div>
							</div>
                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<label class="radio">
								<input type="radio" name="t2" id="optionsRadios1" value="L">
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="t2" id="optionsRadios1" value="P">
								Perempuan
								</label>
							</div>
                    <div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								<input type="date"   class="span12" name="t3" id="tanggal">
								</div>
							</div>
						
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea name="t4" class="span11"></textarea>
								</div>
							</div>
                    <div class="control-group">
								<label class="control-label" for="inputPassword">Status Keluarga</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="t5">
                                    <option selected disabled>-- Pilih Status --</option>    
                                    <option value="Suami">Suami</option>    
                                    <option value="Istri">Istri</option>    
                                    <option value="Anak Kandung">Anak Kandung</option>       
                                    <option value="Lajang">Lajang</option> 
                                </select>
				
								</div>
							</div>
                    
							
							
							<hr>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
							</div>
							</fieldset>
						</form>	
			</div>
		</div>
	</section>
	
	<?php
break;

case "edit":
?>
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
			 url:"mod_pegawai/umur.php",
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
<?php
$id_pegawai=$_GET['id_pegawai'];
$query=mysqli_query($conn,"SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
$r=mysqli_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=pegawai">Data Pegawai</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Update Pegawai</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
				<input type="hidden" id="inputText" name="id_pegawai" value="<?php echo $r['id_pegawai']; ?>"  class="span11">
				<fieldset>
				<legend class="span7 offset1">Update Karyawan</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
							<div class="control-group">
								<label class="control-label" for="inputPassword">NIK</label>
								<div class="controls">
								<input type="text" id="inputText" name="t1" class="span11" value="<?php echo $r['nip'] ?>">
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Kelas Jabatan (KJ)</label>
								<div class="controls">
								<input type="text" id="inputText" name="t2" class="span11" value="<?php echo $r['kj'] ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Pegawai</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" name="t3" value="<?php echo $r['nama_pegawai'] ?>">
								</div>
							</div>
														
							<div class="control-group">
                                        <label for="inputPassword" class="control-label">Department</label>
                                        <div class="controls">
                                          <select name="t4" class="form-control" required>
                                            <option value="">-Pilih-</option>
											
                                            <?php
											
											$con=mysqli_connect("localhost","root","managersql");
											mysqli_select_db($con,"db_balaik3ameya");
											$qdepartment=mysqli_query($con,"SELECT * FROM tbl_department");
											while($rdepartment=mysqli_fetch_array($qdepartment)){
                                                
                                            ?>
                                            <?php if($r['unit']==$rdepartment['department_nama']):?>
                                              <option value="<?php echo $rdepartment['department_nama'];?>" selected><?php echo $rdepartment['department_nama'];?></option>
                                            <?php else:?>
                                              <option value="<?php echo $rdepartment['department_nama'];?>"><?php echo $rdepartment['department_nama'];?></option>
                                            <?php endif;?>
                                            <?php } ?>
                                          </select>
                                        </div>
                                    </div>
		 
								
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<?php
								$jk=$r['jk'];
								if($jk=='L'){
								?>
								<label class="radio">
								<input type="radio" name="t5" id="optionsRadios1" value="L" checked>
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="t5" id="optionsRadios1" value="P">
								Perempuan
								</label>
								<?php
								}
								else{
								?>
								<label class="radio">
								<input type="radio" name="t5" id="optionsRadios1" value="L">
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="t5" id="optionsRadios1" value="P" checked>
								Perempuan
								</label>
                                <?php
                                }
        ?>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								<input type="date"   class="span12" name="t6" id="tanggal" value="<?php echo $r['tgl_lhr'] ?>">
								</div>
							</div>
							<div id="hasil_umur"></div>
							<hr>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
				</div>
				<div class="span3 offset1">							
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Status Keluarga</label>
								<div class="controls">
                                <select class="span11" id="inputText" name="t7">
                                    <option selected disabled>-- Pilih Status --</option>    
                                    <option value="Suami">Suami</option>    
                                    <option value="Istri">Istri</option>    
                                    <option value="Anak Kandung">Anak Kandung</option>       
                                    <option value="Lajang">Lajang</option> 
                                </select>
				
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea name="t8" class="span11"><?php echo $r['alamat'] ?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Keluar</label>
								<div class="controls">
								<input type="date"   class="span12" name="t10" id="tanggal" value="<?php echo $r['tgl_out'] ?>">
								</div>
							</div>
							
							
							</div>
							</fieldset>
						</form>	
			</div>
		</div>
	</section>
	
<?php
break;
}
?>