<?php include'db_connect.php' ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Kanit">
<div class="col-lg-12" id="fonts">
	<div class="card card-outline card-primary" id="table">
		<div class="card-header">
		<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary"  id="button" href="./index.php?page=new_employee"><i class="fa fa-plus"></i>Add New Employee</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Name</th>
						<th>Intern ID</th>
						<th>Gender</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Department</th>
						<th>Designation</th>
						<th>School</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$designations = $conn->query("SELECT * FROM designation_list ");
					$design_arr[0]= "Unset";
					while($row=$designations->fetch_assoc()){
						$design_arr[$row['id']] =$row['designation'];
					}
					$departments = $conn->query("SELECT * FROM department_list ");
					$dept_arr[0]= "Unset";
					while($row=$departments->fetch_assoc()){
						$dept_arr[$row['id']] =$row['department'];
					}
					$schools = $conn->query("SELECT * FROM school_list ");
					$school_arr[0]= "Unset";
					while($row=$schools->fetch_assoc()){
						$school_arr[$row['id']] =$row['firstname'];
					}
					$qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM employee_list WHERE id order by concat(lastname,', ',firstname,' ',middlename) asc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b id="fontsize"><?php echo ucwords($row['name']) ?></b></td>
						<td><b id="fontsize"><?php echo $row['id'] ?></b></td>
						<!-- ADDED MORE INFO TO THE TABLE -->
						<!-- Gender -->
						<td><b id="fontsize"><?php echo ucwords($row['gender']) ?></b></td>
						<!-- Phone -->
						<td><b id="fontsize"><?php echo ucwords($row['phone']) ?></b></td>
						<!-- Address -->
						<td><b id="fontsize"><?php echo ucwords($row['address']) ?></b></td>
						<!-- END -->
						<td><b id="fontsize"><?php echo isset($dept_arr[$row['department_id']]) ? $dept_arr[$row['department_id']] : 'Unknown Department' ?></b></td>
						<td><b id="fontsize"><?php echo isset($design_arr[$row['designation_id']]) ? $design_arr[$row['designation_id']] : 'Unknown Designation' ?></b></td>
						<td><b id="fontsize"><?php echo isset($school_arr[$row['school_id']]) ? $school_arr[$row['school_id']] : 'Unknown School' ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true" id="action-button">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                     
                            <a class="dropdown-item card_generate" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">ID Card</a>
							<div class="dropdown-divider"></div>
		                      <a class="dropdown-item print_document" href="./index.php?page=print_profile&id=<?php echo $row['id'] ?>">Print Profile</a>
							  <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_employee&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_employee" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
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
	$('.card_generate').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Card Details","view_card.php?id="+$(this).attr('data-id'))
	})
	$('.delete_employee').click(function(){
	_conf("Are you sure to delete this Employee?","delete_employee",[$(this).attr('data-id')])
	})
	})
	function delete_employee($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_employee',
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