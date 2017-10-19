<?php
require_once '../Manager/DbManager.php';
?>

<div class = "alert alert-info">Attendance Listing</div>
<div class = "modal fade" id = "add_jemaat" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
	<div class = "modal-dialog" role = "document">
		<div class = "modal-content panel-primary">
			<div class = "modal-header panel-heading">
				<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
				<h4 class = "modal-title" id = "myModallabel">Add Title</h4>
			</div>
			<form method = "POST" action = "../Utils/CreateTitle.php" enctype = "multipart/form-data">
				<div class  = "modal-body">
					<div class = "form-group">
						<label>Title:</label>
						<input type = "text" name = "title" required = "required" class = "form-control" />
					</div>
				</div>
				<div class = "modal-footer">
					<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
				</div>
			</form>
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
				<th>Title</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result = Select("attendance_listing");
				if (count($result) > 0) {
					foreach($result as &$res){
				?>
				<tr>
					<td><?php echo $res['title']?></td>
					<td>
						<a class = "btn btn-warning  eattendance_id" name = "<?php echo $res['id']?>" href = "#" data-toggle = "modal" data-target = "#edit_attendance">
							<span class = "glyphicon glyphicon-edit"></span>
						</a>
						<a class = "btn btn-warning  vattendance_id" name = "<?php echo $res['id']?>" href = "#" data-toggle = "modal" data-target = "#vdit_attendance">
							<span class = "glyphicon glyphicon-th"></span>
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
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		
		$('.eattendance_id').click(function(){
			$id = $(this).attr('name');
			window.location = '../Pages/Checker.php?id=' + $id
		});

		$('.vattendance_id').click(function(){
			$id = $(this).attr('name');
			window.location = '../Pages/Attendance.php?id=' + $id
		});

	});
</script>