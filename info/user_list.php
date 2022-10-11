<?php include'db_connect.php' ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Kanit">
<div class="col-lg-12" id="fonts">
	<div class="card card-outline card-primary" id="table">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary"  id="button" href="./index.php?page=new_user"><i class="fa fa-plus"></i> Add New User</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users order by concat(firstname,' ',lastname) asc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b id="fontsize"><?php echo ucwords($row['name']) ?></b></td>
						<td><b id="fontsize"><?php echo $row['email'] ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true" id="action-button">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_user" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_user&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_user" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
		                    </div>
						</td>
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
	$('.view_user').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> User Details","view_user.php?id="+$(this).attr('data-id'))
	})
	$('.delete_user').click(function(){
	_conf("Are you sure to delete this user?","delete_user",[$(this).attr('data-id')])
	})
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
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