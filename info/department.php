<?php include'db_connect.php' ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Kanit">
<div class="col-lg-12" id="fonts">
	<div class="card card-outline card-primary"  id="table">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_department" id="button" href="javascript:void(0)"><i class="fa fa-plus"></i>Add New Department</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="30%">
					<col width="45%">
					<col width="20%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Department</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM department_list order by department asc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b id="fontsize"><?php echo $row['department'] ?></b></td>
						<td><b id="fontsize"><?php echo $row['description'] ?></b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat manage_department" id="action-button">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" id="action-button" class="btn btn-danger btn-flat delete_department" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!--
	<a href="#"><img src="./assets/images/image.png" width="200px" height="150px" id="image"></a>
					-->
</div>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.new_department').click(function(){
			uni_modal("New Department","manage_department.php")
		})
		$('.manage_department').click(function(){
			uni_modal("Manage Department","manage_department.php?id="+$(this).attr('data-id'))
		})
	$('.delete_department').click(function(){
	_conf("Are you sure to delete this Department?","delete_department",[$(this).attr('data-id')])
	})
	})
	function delete_department($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_department',
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
   
   #image {
    margin-left: 250px;
    margin-bottom: 100px;
    position: fixed;
	top: 400px;
	left: 800px;

   }

   #image:hover {
    width: 190px;
    height: 140px;
	box-shadow: 2px;
   }

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
		border-radius: 10px;
	}

	#action-button:hover {
		border-radius: 30px;

	}

</style>