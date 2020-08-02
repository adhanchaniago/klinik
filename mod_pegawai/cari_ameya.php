<?php
//include ("../config/koneksi.php");
//include ("../config/fungsi_indotgl.php");

/* Start Sql Server Conection*/   
			$serverName = "192.168.70.1";   
			$uid = "sa";     
			$pwd = "managersql";    
			$databaseName = "DatabaseAbsen";   
			   
			$connectionInfo = array( "UID"=>$uid,                              
									 "PWD"=>$pwd,                              
									 "Database"=>$databaseName);   
				
			/* Connect using SQL Server Authentication. */    
			$conn = sqlsrv_connect( $serverName, $connectionInfo);    
			$q=$_POST['q'];	
			$tsql = "SELECT id,nik,nama,jabatan,jabatanNew,alamat,CONVERT(VARCHAR(10), [tanggal lahir], 120) AS [tanggallahir],asuransiid  FROM new WHERE nama LIKE '%".$q."%' or nik='$q' ";    
				
			/* Execute the query. */    
				
			$stmt = sqlsrv_query( $conn, $tsql);    
				
		
				
			/* Iterate through the result set printing a row of data upon each iteration.*/    
			while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
				//echo $row['tanggallahir'].", ".$row['nama']."<br />";
				$nik=$row['nik'];
				$nama=$row['nama'];
				$jabatan=$row['jabatan'];
				$jabatanNew=$row['jabatanNew'];
				$alamat=$row['alamat'];
				$tanggallahir=$row['tanggallahir'];
				$asuransi=$row['asuransiid'];
				}
			
				
			/* Free statement and connection resources. */    
			sqlsrv_free_stmt( $stmt);    
			//sqlsrv_close( $conn);    
		
			/* End Sql Server Conection*/  
			
//$query=mysqli_query($conn,"SELECT * FROM pegawai WHERE nama_pegawai LIKE '%".$q."%' or nip LIKE '%".$q."%'");
//$nu=mysqli_num_rows($query);
//$r=mysqli_fetch_array($query);
//$aksi="mod_pegawai/aksi_pegawai.php";
//if($nu>=1){
?>

<div class="control-group">
								<label class="control-label" for="inputPassword">NIK</label>
								<div class="controls">
								<input type="hidden" id="inputText" name="id_pegawai" class="span11" value="<?php echo $id; ?>">
								<input type="hidden" id="inputText" name="xnip" class="span11" value="<?php echo $nik; ?>" >
								<input type="text" id="inputText" class="span11" value="<?php echo $nik; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" name="xnama_pegawai" value="<?php echo $nama; ?>">
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Kelas Jabatan (KJ)</label>
								<div class="controls">
								<input type="text" id="inputText" class="span11" name="xkj" value="<?php echo $jabatanNew; ?>" >
								</div>
							</div>
							
							
							
							<div class="control-group">
                                        <label for="inputPassword" class="control-label">Department</label>
                                        <div class="controls">
                                          <select name="xunit" class="form-control" required>
                                            <option value="">-Pilih-</option>
											
                                            <?php
											$serverName = "192.168.70.1";   
											$uid = "sa";     
											$pwd = "managersql";    
											$databaseName = "DatabaseAbsen";   
											   
											$connectionInfo = array( "UID"=>$uid,                              
																	 "PWD"=>$pwd,                              
																	 "Database"=>$databaseName);   
												
											/* Connect using SQL Server Authentication. */    
											$conn = sqlsrv_connect( $serverName, $connectionInfo);    
											
											$tsql = " SELECT jabatan FROM new group by jabatan ";    
												
											/* Execute the query. */    
												
											$stmt = sqlsrv_query( $conn, $tsql);    
											
											while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                                                	
                                            ?>
                                            <?php if($jabatan==$row['jabatan']):?>
                                              <option value="<?php echo $row['jabatan'];?>" selected><?php echo $row['jabatan'];?></option>
                                            <?php else:?>
                                              <option value="<?php echo $row['jabatan'];?>"><?php echo $row['jabatan'];?></option>
                                            <?php endif;?>
                                            <?php } ?>
                                          </select>
                                        </div>
                                    </div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<?php
								$jk=$row['jk'];
								if($jk=='P'){
								?>
								<input type="text" class="span12" id="inputText" name="xjk" value="L" >
								<?php
								}
								else{
								?>
								<input type="text" class="span12" id="inputText" name="xjk" value="P" >
                                <?php
                                }
								?>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								<input type="date" class="span12"  id="tanggal" name="xtanggallahir" value="<?php echo $tanggallahir; ?>" >
								</div>
							</div>
							<div id="hasil_umur" disabled></div>
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea class="span11" name="xalamat" ><?php echo $alamat; ?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nomor Asuransi</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" name="xasuransi" value="<?php echo $asuransi; ?>">
								</div>
							</div>