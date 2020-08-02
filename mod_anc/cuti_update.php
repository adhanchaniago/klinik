<?php
	$tgl=$_POST['x'];
	//$ambil_thn=substr($tgl,0,4);
	//$thn_sekarang=date('Y');
	//$umur=$thn_sekarang-$ambil_thn;
	
	
$cuti    = date('Y-m-d', strtotime('-45 days', strtotime($tgl)));
?>
<div class="control-group">
								<label class="control-label" for="inputPassword">Rekomendasi Cuti</label>
								<div class="controls">
								<input type="date" class="span10" id="inputText" name="xcuti" value="<?php echo $cuti ?>" >
								
								</div>
							</div>