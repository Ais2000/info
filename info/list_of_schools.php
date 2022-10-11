<?php include'db_connect.php' ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Kanit">
<div class="col-lg-12" id="fonts">
	<div class="card card-outline card-primary" id="table">
		<div class="card-header">
			<div class="card-tools">
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Name of School</th>
						<th>Location</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM school_list order by concat(firstname,' ',lastname) asc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b id="fontsize"><?php echo ucwords($row['name']) ?></b></td>
						<td><b id="fontsize"><?php echo $row['location'] ?></b></td>
						
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.view_school').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> User Details","view_school.php?id="+$(this).attr('data-id'))
	})
	$('.delete_school').click(function(){
	_conf("Are you sure to delete this user?","delete_school",[$(this).attr('data-id')])
	})
	})
	function delete_school($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_school',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
<style>
	#table {
		background-color: #1f1f1f;
		border-radius: 30px;
	}

	#fonts {
		color: white;
	}

	#button {
		border-radius: 30px;
		border: solid 1px;
		font-family: Kanit;

	}

	#button:hover {

		padding: 5px 15px 5px 15px;
		color: #007bff;
	}
	
	th{
		font-size: 13px;
	}

	#fontsize{
		font-size: 13px;
	}

	#action-button {
		border-radius: 30px;
		font-family: Kanit;
		background-color: #007bff;
		color: black;
	}

	#action-button:hover {
		padding: 3px;
		font-size: 14px;
		color: rgba(0,0,0, 0.7);
	}

</style>