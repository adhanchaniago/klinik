<?php
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$q=$_POST['q'];
$query=mysqli_query($conn,"SELECT * FROM pegawai WHERE nama_pegawai LIKE '%".$q."%' or nip LIKE '%".$q."%'");
$nu=mysqli_num_rows($query);
$r=mysqli_fetch_array($query);
$aksi="mod_pegawai/aksi_pegawai.php";
if($nu>=1){
?>
<div class="control-group">
								<label class="control-label" for="inputPassword">NIP</label>
								<div class="controls">
								<input type="hidden" id="inputText" name="id_pegawai" class="span11" value="<?php echo $r['id_pegawai'] ?>">
								<input type="hidden" id="inputText" name="xnip" class="span11" value="<?php echo $r['nip'] ?>" >
								<input type="text" id="inputText" class="span11" value="<?php echo $r['nip'] ?>" disabled>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Kelas Jabatan (KJ)</label>
								<div class="controls">
								<input type="text" id="inputText" class="span11" value="<?php echo $r['kj'] ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Pegawai</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $r['nama_pegawai'] ?>" disabled>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Unit</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $r['unit'] ?>" disabled>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<?php
								$jk=$r['jk'];
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
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								<input type="date" class="span12" id="tanggal" value="<?php echo $r['tgl_lhr'] ?>" disabled>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea class="span11" disabled><?php echo $r['alamat'] ?></textarea>
								</div>
							</div>
<?php
}
else{
    echo "Data tidka ditemukan!";
}
?>