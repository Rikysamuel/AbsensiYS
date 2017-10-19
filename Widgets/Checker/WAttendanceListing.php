<?php
	require_once '../Manager/DbManager.php';
	if(!ISSET($_GET['id'])) {
		header('location: ../Pages/AttendanceListing.php');
	}
?>

<div class = "alert alert-info">
	Attendance Listing: 
	<?php
		$id = $_GET['id'];
		$ret = Select("attendance_listing", "id='$id'");
		if (count($ret) > 0) {
			echo $ret[0]["title"];
		}
	?>
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
	<button class = "btn btn-success add_jemaat" type = "button" href = "#" data-toggle = "modal">
		<span class = "glyphicon glyphicon-plus"></span> Add new </button>
	<br />
	<br />
	<table id = "table" class = "table table-bordered">
		<thead class = "alert-info">
			<tr>
				<th>Name:</th>
				<th>Time:</th>
				<th>Action:</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result = Select("attendance", "title_id='$id'");
				if (count($result) > 0) {
					foreach($result as &$res){
				?>
				<tr>
					<td><?php 
							$jemaat_id = $res["jemaat_id"];
							$jemaat = Select("jemaat", "jemaat_id='$jemaat_id'");
							echo $jemaat[0]["firstname"]." ".$jemaat[0]["middlename"]." ".$jemaat[0]["lastname"];
						?>
					</td>
					<td><?php 
							echo $res["datetime"];
						?>
					</td>
					<td>
						<a class = "btn btn-danger rattendance_id" name = "<?php echo $res['attendance_id']?>" href = "#" data-toggle = "modal" data-target = "#delete">
							<span class = "glyphicon glyphicon-remove"></span>
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
		
		$('.rattendance_id').click(function(){
			var id = $(this).attr('name');
			$('.remove_id').click(function(){
				window.location = '../Utils/DeleteAttendance.php?attendance_id=' + id;
			});
		});

		$('.add_jemaat').click(function(){
			window.location = '../Pages/Checker.php?id=' + <?php echo $id ?>
		});


	});
</script>