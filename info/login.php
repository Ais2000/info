<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
<?php include 'header.php' ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Merriweather">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Anton">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fascinate">
<body class="hold-transition login-page bg-blue" id="login_bg">
  <div id="container_login">
    <img src="./assets/images/logo102.png" width="100px" height="65px" id="logo">
  <h2 class="title"><b>INFOYEES MANAGEMENT SYSTEM</b></h2>
<div class="login-box">
  <div class="login-logo">
    <a href="#" class="text-white"></a>
  </div>
  <!-- /.login-logo -->
  <div class id="login-card-form" style="left: 3px">
    <div class="login-card-body" id="login-card-form">
      <form action="" id="login-form">
        <div class="input-group mb-1">
          <input type="email" class="form-control" name="email" required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-0">
          <input type="password" class="form-control" name="password" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group mb-1">
          <label for="">Login As</label>
          <select name="login" id="" class="custom-select custom-select-sm">
            <option value="0">Employee</option>
            <option value="1">Supervisor</option>
            <option value="2">Admin</option>
            <option value="3">School Admin</option>
          </select>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          </div>
          <!-- /.col -->
        </form>
        </div>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<!-- /.login-box -->
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          end_load();
        }
      }
    })
  })
  })
</script>
<?php include 'requirements_important.php' ?>

</body>
</html>

<style>

@media (max-width: 900px) {
  #login_bg {
    max-width: 300px;
    width: 100%;
    text-align: left;
    background-repeat: repeat;
    padding: 235px;
  }
}

  #login_bg {
    background-image: url("https://cdn.dribbble.com/users/1770290/screenshots/6250526/bg_90.gif");
    background-repeat: no-repeat;
    background-size: 100%;
    background-position: center;
  }

  .title {
    font-family: Anton;
    font-size: 30px;
  background: -webkit-linear-gradient(#1a4ebe, #b84294);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  }

  #login-card-form {
    border-radius: 20px;
    border: solid;
    right: 200px;
    

  }

  button {
    background: linear-gradient(#1a4ebe, #b84294);
  }

  button:hover {
    padding-right: 10px;
    background: linear-gradient(#c6004d, #15315b);

  }

  #container_login {
    float: right;
    background-color: rgba(0,0,0,0.5);
    padding-left: 50px;
    padding-right: 50px;
    padding-top: 25px;
    padding-bottom: 25px;
    border: solid black 2px;
    border-radius: 20px;
  }

  #logo {
    position: relative;
    left: 125px;
    bottom: 13px;
  }

</style>