<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] == 1)
  $twhere = "  ";
?>



<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 2): ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Kanit">
<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="small-box">
            <div class="inner" id="box">
                <h3><?php echo $conn->query("SELECT * FROM department_list ")->num_rows; ?></h3>
                <p>Total Departments</p>
            </div>
            <div class="icon">
                <i class="fa fa-th-list" id="icon"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="small-box">
            <div class="inner" id="box">
                <h3><?php echo $conn->query("SELECT * FROM designation_list")->num_rows; ?></h3>
                <p>Total Designations</p>
            </div>
            <div class="icon">
                <i class="fa fa-list-alt" id="icon1"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="small-box">
            <div class="inner" id="box">
                <h3><?php echo $conn->query("SELECT * FROM school_list ")->num_rows; ?></h3>
                <p>Total List of Schools</p>
            </div>
            <div class="icon">
                <i class="fas fa-school" id="icon"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="small-box">
            <div class="inner" id="box">
                <h3><?php echo $conn->query("SELECT * FROM users")->num_rows; ?></h3>
                <p>Total Admins</p>
            </div>
            <div class="icon">
                <i class="fa fa-users" id="icon2"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="small-box">
            <div class="inner" id="box">
                <h3><?php echo $conn->query("SELECT * FROM users")->num_rows; ?></h3>
                <p>Total School Admins</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie" id="icon2"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="small-box">
            <div class="inner" id="box">
                <h3><?php echo $conn->query("SELECT * FROM employee_list")->num_rows; ?></h3>
                <p>Total Employees</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-friends" id="icon3"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="small-box">
            <div class="inner" id="box">
                <h3><?php echo $conn->query("SELECT * FROM evaluator_list")->num_rows; ?></h3>
                <p>Total Supervisors</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-secret" id="icon4"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="small-box">
            <div class="inner" id="box">
                <h3><?php echo $conn->query("SELECT * FROM task_list")->num_rows; ?></h3>
                <p>Total Tasks</p>
            </div>
            <div class="icon">
                <i class="fa fa-tasks" id="icon5"></i>
            </div>
        </div>
    </div>
    <a href="./index.php?page=upgrade_to_premium" target="blank" alt="Upgrade"><img id="floater" src="./assets/images/cokefloat.png" width="280px" height="150px"></a>
</div>


<?php else: ?>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h1>Welcome <h2><?php echo $_SESSION['login_name'] ?>!</h2>
            </h1>
            <img src="./assets/images/sup.png" width="470" height="430" style="margin-top: -250px;">
        </div>
    </div>
</div>



<?php endif; ?>

<style>

    
    #icon,
    #icon1,
    #icon2,
    #icon3,
    #icon4,
    #icon5 {
        color: white;
    }

    #box {
        background-color: #1f1f1f;
        border: solid 1px;
        border-color: black;
        border-radius: 30px;
        padding: 25px 42px 5px 42px;
        font-family: Kanit;

    }

    #box:hover {
        padding: 20px 37px 0 30px;
        background-color: rgba(255, 255, 255, 0.2);

    }


    p,
    h3 {
        color: white;
    }

    h1 {
        display: block;
        font-size: 7em;
        color: #1F75FE;
        font-weight: bold;
        margin-left: 500px;
        margin-top: 90px;
    }

    h2 {
        display: block;
        font-size: 3em;
        background: -webkit-linear-gradient(#15315b, #c6004d);
        -webkit-background-clip: text;
        font-weight: bold;
        text-align: center;
        margin-top: -30px;
        margin-left: 500px;
    }

    #floater {
        position: absolute;
        right: 0;
        bottom: 200px;
    }

    #floater:hover {
        padding: 3px;
    }
</style>