<?php

	if(isset($_GET['act'])){
		$act = $_GET['act'];
	}else{
		$act="";
	}
require_once("../config/koneksi.php");
	switch($act){
		default:?>
			<div class="panel-body">
				<div class="table-responsive">
				
					<table class="table table-striped">
						<thead>
						<tr>
							<th>ID Karyawan</th>
							<th>Nama Karyawan</th>
							<th>Tanggal</th>
							<th>Nominal</th>
							<th>Kepentingan</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
			<?php
							
							$query = "SELECT * FROM pinjaman WHERE level ='1'";
							$hasil = mysqli_query($k, $query);
							while ($b = mysqli_fetch_assoc($hasil)){
								$query2 = mysqli_query($k,"SELECT * FROM user where Id_User = '".$b['id_karyawan']."'");
								$data_karyawan =  mysqli_fetch_assoc($query2);
							?>	
							
								<tr>
									<td> 
										<?php echo $b['id_karyawan']; ?>
									</td>
									<td>
										<?php echo $data_karyawan['Nama'];?>
									</td>
									<td>
										<?php echo $b['tanggal'];?>
									</td>
									<td>
										<?php echo $b['jml_pinjam'] ?>
									</td>
									<td>
										<?php echo $b['kepentingan'] ?>
									</td>
									<td>
										<?php echo $b['status_request'] ?>
									</td>
									<td><a href="?modul=pinjaman&act=detailPinjaman&id=<?php echo $b['id']; ?>">Detail</a></td>
								</tr>
						<?php
								
							}
						?>
							</tbody>
					</table>
				</div>
			</div> 
			
	<?php
	break;
		case "inputPinjaman" :
			include 'inputPinjaman.php';
		break;
		
		case "detailPinjaman" :
			include 'detailPinjaman.php';
		break;
		
		
	}
?>

