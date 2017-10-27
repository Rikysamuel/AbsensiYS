<?php
	require_once '../Manager/DbManager.php';

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
?>

<div class = "alert alert-info">Attendance Listing</div>

<div class = "modal fade" id = "edit_attendance" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
	<div class = "modal-dialog" role = "document">
		<div class = "modal-content panel-warning">
			<div class = "modal-header panel-heading">
				<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
				<h4 class = "modal-title" id = "myModallabel">Edit Title</h4>
			</div>
			<div id = "edit_query"></div>
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
				if ($result) {
					foreach((array) $result as &$res){
				?>
				<tr>
					<td><?php echo $res['title']?></td>
					<td>
						<a class = "btn btn-warning  cattendance_id" name = "<?php echo $res['id']?>" href = "#" data-toggle = "modal" data-target = "#check_attendance">
							<span class = "glyphicon glyphicon-check"></span>
						</a>
						<a class = "btn btn-success  vattendance_id" name = "<?php echo $res['id']?>">
							<span class = "glyphicon glyphicon-th"></span>
						</a>
						<a class = "btn btn-danger  ivattendance_id" name = "<?php echo $res['id']?>">
							<span class = "glyphicon glyphicon-th"></span>
						</a>
						<a class = "btn btn-warning  eattendance_id" name = "<?php echo $res['id']?>" href = "#" data-toggle = "modal" data-target = "#edit_attendance">
							<span class = "glyphicon glyphicon-pencil"></span>
						</a>
						<?php
							if ($_SESSION["login_role"] != 2) {
								$attendace_id = $res['id'];
								echo "<a class = 'btn btn-danger rattendance_id' name = ".$attendace_id." href = '#' data-toggle = 'modal' data-target = '#delete'>
										<span class = 'glyphicon glyphicon-remove'></span>
									</a>";
							}
						?>
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
		
		$(document).on("click", ".cattendance_id", function () {
			var id = $(this).attr('name');
			window.location = '../Pages/Checker.php?id=' + id
		});

		$(document).on("click", ".vattendance_id", function () {
			var id = $(this).attr('name');
			window.location = '../Pages/Attendance.php?id=' + id
		});

		$(document).on("click", ".ivattendance_id", function () {
			var id = $(this).attr('name');
			window.location = '../Pages/InverseAttendance.php?id=' + id
		});

		$(document).on("click", ".eattendance_id", function () {
			var id = $(this).attr('name');
			$('#edit_query').load('../Widgets/Checker/WAttendanceTitleEdit.php?title_id=' + id);
		});

		$(document).on("click", ".rattendance_id", function () {
			var id = $(this).attr('name');
			$(document).on("click", ".remove_id", function () {
				window.location = '../Utils/DeleteTitle.php?id=' + id;
			});
		});

	});
</script>