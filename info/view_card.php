<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM employee_list where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
    $$k = $v;
}
$designation= $conn->query("SELECT * FROM designation_list where id = $designation_id ");
$designation = $designation->num_rows > 0 ? $designation->fetch_array()['designation'] : 'Unknown Designation';
$department= $conn->query("SELECT * FROM department_list where id = $department_id ");
$department = $department->num_rows > 0 ? $department->fetch_array()['department'] : 'Unknown Department';
$evaluator= $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM evaluator_list where id = $evaluator_id ");
$evaluator = $evaluator->num_rows > 0 ? $evaluator->fetch_array()['name'] : 'Unknown Evaluator';
}
?>

<div class="clearfix" id="mycard" style="background-image: url(./assets/images/background.jpg);width: 460px;height:253px;background-size: cover;">
        <div class="box1">
        <img class="img-circle elevation-2" src="assets/uploads/<?php echo $avatar ?>" alt="User Avatar"  style="width: 115px;height:115px;object-fit: cover">
        </div>
        <div class="box2">
                <p class="name"><?php echo ucwords($name) ?><br></p>
                <p class="department"><?php echo $department ?><br></p>
                <p class="text">
                    <?php echo $address ?><br>
                    <?php echo $email ?><br>
                    <?php echo $phone ?><br>
                </p>

        </div>
</div>


<div class="modal-footer display p-0 m-0">
    <button id="demo" class="btn btn-secondary" onclick="downloadtable()"> Download Id Card</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
    #uni_modal .modal-footer{
        display: none
    }
    #uni_modal .modal-footer.display{
        display: flex
    }
    * {
  box-sizing: border-box;
    }

    .box1 {
      float: left;
      width: 30%;
      padding-left: 24px;
      padding-top: 99px;
    }
    .box2 {
      float: left;
      width: 70%;
      padding-top: 80px;
      padding-left: 40px;
    }

    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }

    .name{
        font-weight: bold;
        margin: 0px;
        padding: 0px;
        font-size: 24px;
    }
    .department{
        margin: 0px;
        padding: 0px;
        font-size: 15px;
    }
    .text{
        margin: 0px;
        padding: 0px;
        font-size: 16px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
<script>
    
function downloadtable() {
    var node = document.getElementById('mycard');

    domtoimage.toPng(node)
        .then(function(dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            downloadURI(dataUrl, "inter-id.png")
        }).catch(function(error) {
            console.error('oops, something went wrong', error);
        });
    }

function downloadURI(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    delete link;
}
    



</script>