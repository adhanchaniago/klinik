<?php
$aksi="mod_diagnosis/aksi_diagnosis.php";
switch($_GET['act']){
	default:
	?>
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
			 url:"mod_dokter/cari_tarif.php",
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
	<?php
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Kategori Diagnoisis</li>			
		</ul>
		<div class="control-group pull-left"></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span12"  style="background:#f9f9f9;padding:10px;">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<input type="hidden" class="span10" id="inputText" value="<?php echo $rus['kodeUser']; ?>" name="t7">
				<fieldset>
				<legend class="span9">Tambah Kategori Diagnosis</legend>
				<div class="clear"></div>
				<div class="span8">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Nama Diagnoisis</label>
								<div class="controls">
									<input type="text" name="nama_diagnosis" class="span11">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Kode Diagnosis</label>
								<div class="controls">
									<input type="text" name="kode_diagnosis" class="span11">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Keterangan</label>
								<div class="controls">
									<textarea name="keterangan_diagnosis" class="span11"></textarea>
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
		</div>
		<div class="span6 pull-right">
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<fieldset>
				<legend class="span12">Kategori Diagnosis</legend>
				
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>No</td><td>Nama Diagnosis</td><td>Keterangan</td><td></td>
						</tr>
					</thead>
					<tbody>
					
					<?php
					
					$query=mysqli_query($conn,"SELECT * FROM diagnosis");
					$no=1;					
					while($r=mysqli_fetch_array($query)){
					?>					
						<tr>
							
                            <td><?php echo $no; ?></td><td><?php echo $r['nama_diagnosis']; ?></td><td><?php echo $r['ket']; ?></td>
                            <td><div class="btn-group">
								<a class="btn btn-danger" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=diagnosis&&act=edit&&id_diagnosis=<?php echo $r['id_diagnosis']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&id_diagnosis=$r[id_diagnosis]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus tarif dokter <?php echo $r['nama_dokter']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
						</tr>
					
					<?php
					$no++;
					}
					?>					
					</tbody>
				</table>
				</fieldset>
				</div>
			</div>
		</div>
		</div>		
	</section>
<?php
break;

case "edit":
$id_diagnosis=$_GET['id_diagnosis'];
$query=mysqli_query($conn,"SELECT * FROM diagnosis WHERE id_diagnosis='$id_diagnosis'");
$r=mysqli_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=diagnosis">Kategori Diagnosis</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Ubah Diagnosis</li>	
		</ul>
		<div class="control-group pull-left"></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span12" style="background:#f9f9f9;padding:10px;">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
				<legend class="span12">Ubah Kategori Diagnosis</legend>
				<div class="clear"></div>
				<div class="span8">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Nama DIagnosis</label>
								<div class="controls">
									<input type="text" name="nama_diagnosis" class="span11" value="<?php echo $r['nama_diagnosis']; ?>">
									<input type="hidden" name="id_diagnosis" class="span11" value="<?php echo $r['id_diagnosis']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Kode Diagnosis</label>
								<div class="controls">
									<textarea name="kode_diagnosis" class="span11"><?php echo $r['kode_diagnosis']; ?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Keterangan</label>
								<div class="controls">
									<textarea name="keterangan_diagnosis" class="span11"><?php echo $r['ket']; ?></textarea>
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
				
							
						</form>	
			</div>
		</div>
		</div>
		<div class="span7 pull-right">
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<fieldset>
				<legend class="span12">Kategori Diagnosis</legend>
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>No</td><td>Nama Diagnosis</td><td>Keterangan</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$query=mysqli_query($conn,"SELECT * FROM diagnosis");
					$no=1;					
					while($r=mysqli_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $no; ?></td><td><?php echo $r['nama_diagnosis']; ?></td><td><?php echo $r['ket']; ?></td><td><div class="btn-group">
								<a class="btn btn-danger" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=diagnosis&&act=edit&&id_diagnosis=<?php echo $r['id_diagnosis']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&id_diagnosis=$r[id_diagnosis]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus tarif dokter <?php echo $r['nama_dokter']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
						</tr>
					
					<?php
					$no++;
					}
					?>					
					</tbody>
				</table>
				</fieldset>
				</div>
			</div>
		</div>
		</div>		
	</section>
	
<?php
break;
}
?>