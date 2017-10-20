<?php
	require_once '../../Manager/DbManager.php';
	
	$id = escape($_REQUEST["jemaat_id"]);
	$ret = Select("jemaat", "jemaat_id='$id'");
?>

<form method = "POST" action = "../Utils/EditJemaat.php?jemaat_id=<?php echo $id?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		<div class = "form-group">
			<label>Full Name:</label>
			<input type = "text" name = "fullname" required = "required" class = "form-control" value="<?php echo $ret[0]['nama_lengkap']?>"/>
		</div>
		<div class = "form-group">
			<label>Nick Name:</label>
			<input type = "text" name = "nick_name" placeholder="(Optional)" class = "form-control" value="<?php echo $ret[0]['nama_panggilan']?>"/>
		</div>
		<div class = "form-group">
			<label>Blood Type:</label>
			<select class="form-control" name="blodType">
				<option value="A" <?php if ($ret[0]['golongan_darah'] == "A") { echo "selected='selected'"; } ?>>A</option>
				<option value="B" <?php if ($ret[0]['golongan_darah'] == "B") { echo "selected='selected'"; } ?>>B</option>
				<option value="O" <?php if ($ret[0]['golongan_darah'] == "O") { echo "selected='selected'"; } ?>>O</option>
				<option value="AB" <?php if ($ret[0]['golongan_darah'] == "AB") { echo "selected='selected'"; } ?>>AB</option>
			</select>
		</div>
		<div class = "form-group">
			<label>Hobby:</label>
			<input type = "text" name = "hobby" placeholder = "(Optional)" class = "form-control" value="<?php echo $ret[0]['hobi']?>"/>
		</div>
		<div class = "form-group">
			<label>Address:</label>
			<input type = "text" name = "address" required = "required" class = "form-control" value="<?php echo $ret[0]['alamat']?>"/>
		</div>
		<div class = "form-group">
			<label>Birth Place:</label>
			<input type = "text" name = "birth_place" required = "required" class = "form-control" value="<?php echo $ret[0]['tempat_lahir']?>"/>
		</div>
		<div class = "form-group">
			<label>Birth Date:</label>
			<input type = "text" name = "birth_date" placeholder="(e.g: 1994-07-26)" required = "required" class = "form-control date" value="<?php echo $ret[0]['tanggal_lahir']?>"/>
		</div>
		<div class = "form-group">
			<label>Status:</label>
			<input type = "text" name = "status" required = "required" class = "form-control" value="<?php echo $ret[0]['status']?>"/>
		</div>
		<div class = "form-group">
			<label>Phone No:</label>
			<input type = "text" name = "phone" required = "required" class = "form-control" value="<?php echo $ret[0]['nomor_telepon']?>"/>
		</div>
		<div class = "form-group">
			<label>Line ID:</label>
			<input type = "text" name = "line" placeholder="(Optional)" class = "form-control" value="<?php echo $ret[0]['ID_line']?>"/>
		</div>
		<div class = "form-group">
			<label>Instagram Username:</label>
			<input type = "text" name = "insta" placeholder="(Optional)" class = "form-control" value="<?php echo $ret[0]['instagram']?>"/>
		</div>
		<div class = "form-group">
			<label>Family Contact:</label>
			<input type = "text" name = "fam_phone" placeholder="(Optional)" class = "form-control" value="<?php echo $ret[0]['kontak_keluarga']?>"/>
		</div>
		<div class = "form-group">
			<label>Baptism:</label>
			<select class="form-control" name="baptism">
				<option value="1" <?php if ($ret[0]['baptisan_air'] == "1") { echo "selected='selected'"; } ?> >Yes</option>
				<option value="0" <?php if ($ret[0]['baptisan_air'] == "0") { echo "selected='selected'"; } ?> >No</option>
			</select>
		</div>
		<div class = "form-group">
			<label>Service:</label>
			<input type = "text" name = "service" placeholder="(Optional)" class = "form-control" value="<?php echo $ret[0]['pelayanan']?>"/>
		</div>
		<div class = "form-group">
			<label>PA:</label>
			<select class="form-control" name="PA">
				<option value="1" <?php if ($ret[0]['PA'] == "1") { echo "selected='selected'"; } ?> >Yes</option>
				<option value="0" <?php if ($ret[0]['PA'] == "0") { echo "selected='selected'"; } ?> >No</option>
			</select>
		</div>
		<div class = "form-group">
			<label>Komsel:</label>
			<input type = "text" name = "komsel" placeholder="(Optional)" class = "form-control" value="<?php echo $ret[0]['komsel']?>"/>
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_admin"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	

<script>
	$('.date').datepicker({
		dateFormat: 'yy-mm-dd'
	});
</script>