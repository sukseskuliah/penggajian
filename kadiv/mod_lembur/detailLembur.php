<?php
	include '../config/koneksi.php';
	
	$id = $_GET['id'];
	$query = "SELECT * FROM lembur where id ='$id'";
		$hasil = mysqli_query($k, $query);
		$data = mysqli_fetch_array($hasil);
		$sql_karyawan = mysqli_query($k,"SELECT * FROM user WHERE Id_User = '$data[id_karyawan]'");
	$data_karyawan = mysqli_fetch_array($sql_karyawan);
?>
	<form method="POST" action="../controller/doInsertSalary.php" class="form-horizontal">
	<div class="form-group"><label class="col-sm-3">
	ID Karyawan</label> <div class="col-sm-3">: <?php echo $data['id_karyawan']; ?>
</div></div>
<div class="form-group"><label class="col-sm-3">
	Nama Karyawan</label> <div class="col-sm-3">: <?php echo $data_karyawan['Nama']; ?>
</div></div>
	<div class="form-group"><label class="col-sm-3">
		Tanggal Lembur</label> <div class="col-sm-3">: <?php echo $data['tanggal'] ?>
	</div></div>  
	<div class="form-group"><label class="col-sm-3">
		Tipe</label> <div class="col-sm-3">: <?php echo $data['tipe'] ?>
	</div></div>
	<div class="form-group"><label class="col-sm-3">
		Uraian</label> <div class="col-sm-3">: <?php echo $data['uraian'] ?>
		
	</div></div>
	<div class="form-group"><label class="col-sm-3">
	Status</label> <div class="col-sm-3"> 
	<?php
			echo ": ".$data['status'];
	?>
	
	</div></div>


	<?php if($data['level'] >= 3){
  echo "<div class='form-group'>
	<div class='col-sm-6'>
		<textarea name='msg' placeholder='Kirim pesan anda' class='form-control' rows='5' style='max-width:100%;'></textarea>
	</div>
 </div>
<div style='text-align:center;' class='col-sm-6'><input type='submit' value='Simpan' class='btn btn-primary'>  <a class='btn btn-danger' onclick='javascript:history.back()'>Kembali</a></div>";
}else{
	echo "<div style='text-align:center;' class='col-sm-6'><a class='btn btn-danger' onclick='javascript:history.back()'>Kembali</a>";
}
?>
	</form>