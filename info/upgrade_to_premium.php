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
              <div class="inner"  id="box">
                <h3>Free Trial</h3>
                <p id="detail">
                  Experience the effectiveness of INFOYEES in a limited time
                </p>
                <p>
                  3 months free trial
                </p>
                <p>
                  Can accomodate 100 intern/employee
                </p>
                <button id="buy-now">Buy now</button>
              </div>
            </div>
          </div>

           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box">
              <div class="inner"  id="box">
                <h3>Basic</h3>
                <p id="detail">
                  Enjoy more features of INFOYEES
                </p>
                <p>
                  Upto 1000 intern/employee
                </p>
                <p>
                  $79 a 1 year
                </p>
                <p>
                  Backup database
                </p>
                <button id="buy-now">Buy now</button>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box">
              <div class="inner"  id="box">
                <h3>Advance</h3>
                <p id="detail">
                  Enjoy the advanced features of INFOYEES
                </p>
                <p>
                  Unlimited Users
                </p>
                <p>
                  Unlimited Task
                </p>
                <p>
                  Backup database
                </p>
                <p>
                  2 years for $198
                </p>
                <button id="buy-now">Buy now</button>
               

              </div>
            </div>
          </div>
     

      

<?php else: ?>
   <div class="col-12">
              <div class="card">
            <div class="card-body">
              <h1>Welcome <h2><?php echo $_SESSION['login_name'] ?>!</h2></h1>
               <img src="./assets/images/sup.png" width="470" height="430" style="margin-top: -250px;">
            </div>
          </div>
      </div>

      
          
<?php endif; ?>

<style>
  #box-table {
    padding: 70px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 30px;
  }

   #icon {
    color: white;
  }

  #icon1 {
    color: white;
  }

  #icon2 {
    color: white;
  }

  #icon3 {
    color: white;
  }

  #icon4 {
    color: white;
  }

  #icon5{
    color: white;
  }

  #box {
    background-color: rgba(0, 0, 0, 0.5);
    border: solid 1px;
    border-color: black;
    border-radius: 30px;
    padding: 25px 42px 70px 42px;
    font-family: Kanit;

  }


   p {
    color: white;
    text-align: center;
   }

   h3 {
    color: white;
    text-align: center;
    font-size: 30px;
  background: -webkit-linear-gradient(#1a4ebe, #b84294);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  }
  

h1 {
  display: block;
  font-size: 7em;
  color:  #1F75FE;
  font-weight: bold;
  margin-left: 500px;
  margin-top: 90px;
}
  h2 {
  display: block;
  font-size: 3em;
  background: -webkit-linear-gradient(#15315b, #c6004d);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: bold;
  text-align: center;
  margin-top: -30px;
  margin-left: 500px;
}

 #floater {
  position: absolute;
  right: 0;
  bottom: 1px;
 }

#floater:hover{
  padding: 3px;
}

#detail {
  font-size: 19px;
  color: greenyellow;
}

#buy-now {
  background: linear-gradient(#15315b, #c6004d);
  padding: 5px;
  border: 1px;
  border-radius: 30px;
  position: relative;
  top: 25px;
  left: 99px;
}

#buy-now:hover {
  background: linear-gradient(#c6004d, #15315b);
}



</style>