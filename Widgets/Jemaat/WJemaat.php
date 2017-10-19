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
						<label>Nama Panggilan Jemaat:</label>
						<input type = "text" name = "jemaat_panggilan" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Firstname:</label>
						<input type = "text" name = "firstname" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Middlename:</label>
						<input type = "text" name = "middlename" placeholder = "(Optional)" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Lastname:</label>
						<input type = "text" name = "lastname" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Baptis:</label>
						<input type = "text" name = "baptis" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Komsel:</label>
						<input type = "text" name = "komsel" required = "required" class = "form-control" />
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
				<th>Panggilan</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Lastname</th>
				<th>Baptis</th>
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
					<td><?php echo $res['jemaat_panggilan']?></td>
					<td><?php echo $res['firstname']?></td>
					<td><?php echo $res['middlename']?></td>
					<td><?php echo $res['lastname']?></td>
					<td><?php echo $res['baptis']?></td>
					<td><?php echo $res['komsel']?></td>
					<td><a class = "btn btn-danger rjemaat_id" name = "<?php echo $res['jemaat_id']?>" href = "#" data-toggle = "modal" data-target = "#delete"><span class = "glyphicon glyphicon-remove"></span></a> <a class = "btn btn-warning  ejemaat_id" name = "<?php echo $res['jemaat_id']?>" href = "#" data-toggle = "modal" data-target = "#edit_jemaat"><span class = "glyphicon glyphicon-edit"></span></a></td>
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
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.rjemaat_id').click(function(){
			$jemaat_id = $(this).attr('name');
			$('.remove_id').click(function(){
				window.location = '../Utils/DeleteJemaat.php?jemaat_id=' + $jemaat_id;
			});
		});
		$('.ejemaat_id').click(function(){
			$jemaat_id = $(this).attr('name');
			$('#edit_query').load('../Widgets/Jemaat/WJemaatEdit.php?jemaat_id=' + $jemaat_id);
		});
	});
</script>