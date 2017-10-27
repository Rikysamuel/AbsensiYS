<?php
	require_once '../Manager/DbManager.php';
	if(!ISSET($_GET['id'])) {
		header('location: ../Pages/AttendanceListing.php');
	}
?>

<div class = "alert alert-info">
	Inverse Attendance Listing: 
	<?php
		$id = $_GET['id'];
		$ret = Select("attendance_listing", "id='$id'");
		if (count($ret) > 0) {
			echo $ret[0]["title"];
		}
	?>
</div>

<div class = "well col-lg-12">
	<br />
	<br />
	<table id = "table" class = "table table-bordered">
		<thead class = "alert-info">
			<tr>
				<th>Full Name</th>
				<th>Nick Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$attends = Select("attendance", "title_id='$id'", "jemaat_id");
				$jemaat = Select("jemaat", "", "jemaat_id, nama_lengkap, nama_panggilan");
				if ($jemaat) {
					foreach((array) $jemaat as &$person){
						$flag = true;
						foreach ($attends as &$attend) {
							if ($person["jemaat_id"] == $attend["jemaat_id"]) {
								$flag = false;
								break;
							}
						}

						if ($flag) {
			?>
				
							<tr>
								<td><?php echo $person["nama_lengkap"] ?>
								</td>
								<td><?php echo $person["nama_panggilan"] ?></td>
								<td>
									<a class = "btn btn-primary cattendance_id" name = "<?php echo $person['jemaat_id']?>" href = "#" data-toggle = "modal" data-target = "#delete">
										<span class = "glyphicon glyphicon-check"></span> Check
									</a>
								</td>
							</tr>
				<?php
							}
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
			 $(".cattendance_id").attr("disabled", "disabled");

			var jemaatId = $(this).attr('name');
			var titleId = <?php echo $_GET['id'] ?>;

			var row = $('#table').DataTable().row( $(this).parents('tr'));
			Check(jemaatId, titleId, row);
		});

	});

	function Check(jemaatId, titleId, row) {
		setTimeout(function(){
			$.post('../Utils/Check.php', {id: jemaatId, title: titleId},
				function(result){
					if(result == 'success'){
						row.remove().draw();
						$(".cattendance_id").removeAttr("disabled");
					}
				}
			);
		}, 3000);
	}
</script>