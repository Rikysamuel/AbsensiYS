<?php
require_once '../Manager/DbManager.php';
?>

<div class = "alert alert-info"> Jemaat Listing</div>
<div class = "modal fade" id = "add_jemaat" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
	<div class = "modal-dialog" role = "document">
		<div class = "modal-content panel-primary">
			<div class = "modal-header panel-heading">
				<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
				<h4 class = "modal-title" id = "myModallabel">Add new Jemaat</h4>
			</div>
			<form method = "POST" action = "../Utils/CreateJemaat.php" enctype = "multipart/form-data">
				<div class  = "modal-body">
					<div class = "form-group">
						<label>Full Name:</label>
						<input type = "text" name = "fullname" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Nick Name:</label>
						<input type = "text" name = "nick_name" placeholder="(Optional)" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Blood Type:</label>
						<select class="form-control" name="blodType">
							<option value="A" selected="selected">A</option>
							<option value="B">B</option>
							<option value="O">O</option>
							<option value="AB">AB</option>
						</select>
					</div>
					<div class = "form-group">
						<label>Hobby:</label>
						<input type = "text" name = "hobby" placeholder = "(Optional)" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Address:</label>
						<input type = "text" name = "address" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Birth Place:</label>
						<input type = "text" name = "birth_place" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Birth Date:</label>
						<input type = "text" id = "birth_date" name = "birth_date" placeholder = "(e.g: 1994-07-26)" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Status:</label>
						<input type = "text" name = "status" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Phone No:</label>
						<input type = "text" name = "phone" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Line ID:</label>
						<input type = "text" name = "line" placeholder="(Optional)" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Instagram Username:</label>
						<input type = "text" name = "insta" placeholder="(Optional)" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Family Contact:</label>
						<input type = "text" name = "fam_phone" placeholder="(Optional)" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Baptism:</label>
						<select class="form-control" name="baptism">
							<option value="1">Yes</option>
							<option value="0" selected="selected">No</option>
						</select>
					</div>
					<div class = "form-group">
						<label>Service:</label>
						<input type = "text" name = "service" placeholder="(Optional)" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>PA:</label>
						<select class="form-control" name="PA">
							<option value="1">Yes</option>
							<option value="0" selected="selected">No</option>
						</select>
					</div>
					<div class = "form-group">
						<label>PMKP:</label>
						<select class="form-control" name="PMKP">
							<option value="1">Yes</option>
							<option value="0" selected="selected">No</option>
						</select>
					</div>
					<div class = "form-group">
						<label>Komsel:</label>
						<input type = "text" name = "komsel" placeholder="(Optional)" class = "form-control" />
					</div>
				</div>
				<div class = "modal-footer">
					<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class = "modal fade" id = "delete" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
	<div class = "modal-dialog" role = "document">
		<div class = "modal-content ">
			<div class = "modal-body">
				<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
				<br />
				<center><a class = "btn btn-danger remove_id" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
			</div>
		</div>
	</div>
</div>
<div class = "modal fade" id = "edit_jemaat" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
	<div class = "modal-dialog" role = "document">
		<div class = "modal-content panel-warning">
			<div class = "modal-header panel-heading">
				<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
				<h4 class = "modal-title" id = "myModallabel">Edit Jemaat</h4>
			</div>
			<div id = "edit_query"></div>
		</div>
	</div>
</div>
<div class = "well col-lg-12">
	<button class = "btn btn-success" type = "button" href = "#" data-toggle = "modal" data-target = "#add_jemaat"><span class = "glyphicon glyphicon-plus"></span> Add new </button>
	<br />
	<br />
	<table id = "table" class = "table table-bordered">
		<thead class = "alert-info">
			<tr>
				<th>Full Name</th>
				<th>Nick Name</th>
				<th>Blood Type</th>
				<th>Hobby</th>
				<th>Addresss</th>
				<th>Birth Place</th>
				<th>Birth Date</th>
				<th>Status</th>
				<th>Phone No</th>
				<th>Line ID</th>
				<th>Instagram</th>
				<th>Family Contact</th>
				<th>Baptism</th>
				<th>Service</th>
				<th>PA</th>
				<th>PMKP</th>
				<th>Komsel</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result = Select("jemaat");
				if (count($result) > 0) {
					foreach($result as &$res){
				?>
				<tr>
					<td> <?php echo $res['nama_lengkap']; ?> </td>
					<td> <?php echo $res['nama_panggilan']; ?> </td>
					<td> <?php echo $res['golongan_darah']; ?> </td>
					<td> <?php echo $res['hobi']; ?> </td>
					<td> <?php echo $res['alamat']; ?> </td>
					<td> <?php echo $res['tempat_lahir']; ?> </td>
					<td> <?php echo date("d M Y", strtotime($res['tanggal_lahir'])); ?> </td>
					<td> <?php echo $res['status']; ?> </td>
					<td> <?php echo $res['nomor_telepon']; ?> </td>
					<td> <?php echo $res['id_line']; ?> </td>
					<td> <?php echo $res['instagram']; ?> </td>
					<td> <?php echo $res['kontak_keluarga']; ?> </td>
					<td> <?php echo ($res['baptisan_air'] == "t") ? "Yes" : "No"; ?> </td>
					<td> <?php echo $res['pelayanan']; ?> </td>
					<td> <?php echo ($res['pa'] == "t") ? "Yes" : "No"; ?> </td>
					<td> <?php echo ($res['pmkp'] == "t") ? "Yes" : "No"; ?></td>
					<td> <?php echo $res['komsel']; ?> </td>
					<td>
						<a class = "btn btn-danger rjemaat_id" name = "<?php echo $res['jemaat_id']?>" href = "#" data-toggle = "modal" data-target = "#delete">
							<span class = "glyphicon glyphicon-remove" ></span>
						</a>
						<a class = "btn btn-warning  ejemaat_id" name = "<?php echo $res['jemaat_id']?>" href = "#" data-toggle = "modal" data-target = "#edit_jemaat">
							<span class = "glyphicon glyphicon-edit"></span>
						</a>
					</td>
				</tr>
				<?php
			}
		}
		?>
		</tbody>
	</table>
</div>
<br />
<br />
<br />

<script src = "../html/js/jquery.dataTables.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
		$('#birth_date').datepicker({
			dateFormat: 'yy-mm-dd'
		});
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){

		$(document).on("click", ".rjemaat_id", function () {
			$jemaat_id = $(this).attr('name');
			$(document).on("click", ".remove_id", function () {
				window.location = '../Utils/DeleteJemaat.php?jemaat_id=' + $jemaat_id;
			});
		});

		$(document).on("click", ".ejemaat_id", function () {
			$jemaat_id = $(this).attr('name');
			$('#edit_query').load('../Widgets/Jemaat/WJemaatEdit.php?jemaat_id=' + $jemaat_id);
		});

	});
</script>