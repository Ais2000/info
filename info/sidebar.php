<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Titan One">
  <aside class="main-sidebar" id="sidenav">
    <div class="dropdown">
   	<a href="./" class="brand-link">
        <?php if($_SESSION['login_type'] == 3): ?>
        <h3 class="text-center p-0 m-0"><b>School Admin</b></h3>
        <?php elseif($_SESSION['login_type'] == 2): ?>
        <h3 class="text-center p-0 m-0"><b>Administrator</b></h3>
        <?php elseif($_SESSION['login_type'] == 1): ?>
        <h3 class="text-center p-0 m-0"><b>Supervisor</b></h3>
         <?php else: ?>
        <h3 class="text-center p-0 m-0"><b>Employee</b></h3>
        <?php endif; ?>

    </a>
      
    </div>
    <div class="sidebar pb-4 mb-4">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt" id="icon_color"></i>
              <p id="fc">
                Dashboard
              </p>
            </a>
          </li>
          <?php if($_SESSION['login_type'] == 0): ?>
          <li class="nav-item dropdown">
            <a href="./index.php?page=task_list" class="nav-link nav-task_list">
              <i class="nav-icon fas fa-tasks" id="icon_color"></i>
              <p id="fc">
                Tasks
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=my_evaluation" class="nav-link nav-my_evaluation">
              <i class="nav-icon far fa-edit" id="icon_color"></i>
              <p id="fc">
                Evaluation
              </p>
            </a>
          </li>
        <?php endif; ?>
          <?php if($_SESSION['login_type'] == 1): ?>
          <li class="nav-item dropdown">
            <a href="./index.php?page=task_list" class="nav-link nav-task_list">
              <i class="nav-icon fas fa-tasks" id="icon_color"></i>
              <p id="fc">
                Tasks
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=evaluation" class="nav-link nav-evaluation">
              <i class="nav-icon far fa-edit" id="icon_color"></i>
              <p id="fc">
                Evaluation
              </p>
            </a>
          </li>
          <!-- ID GENERATOR FEATURE FOR SUPERVISOR-->
          <li class="nav-item dropdown">
            <a href="./index.php?page=id_card_index" class="nav-link nav-id_card_index">
              <i class="nav-icon far fa-id-card" id="icon_color"></i>
              <p id="fc">
                ID Generator
              </p>
            </a>
          </li>
        <?php endif; ?>
          <?php if($_SESSION['login_type'] == 2): ?>
          <li class="nav-item dropdown">
            <a href="./index.php?page=department" class="nav-link nav-department">
              <i class="nav-icon fas fa-th-list" id="icon_color"></i>
              <p id="fc">
                Departments
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=designation" class="nav-link nav-designation">
              <i class="nav-icon fas fa-list-alt" id="icon_color"></i>
              <p id="fc">
                Designations
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=list_of_schools" class="nav-link nav-list_of_schools">
              <i class="nav-icon fas fa-school" id="icon_color"></i>
              <p id="fc">
                List of Schools
              </p>
            </a>
          </li> 
          <li class="nav-item">
                <a href="./index.php?page=employee_list" class="nav-link nav-employee_list tree-item">
                <i class="nav-icon fas fa-user-friends" id="icon_color"></i>
                <p id="fc">Employees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=evaluator_list" class="nav-link nav-evaluator_list tree-item">
                <i class="nav-icon fas fa-user-secret" id="icon_color"></i>
                <p id="fc">Supervisor</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./index.php?page=school_list" class="nav-link nav-school_list tree-item">
                <i class="nav-icon fas fa-user-tie" id="icon_color"></i>
                <p id="fc">School Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                <i class="nav-icon fas fa-users" id="icon_color"></i>
                <p id="fc">Admins</p>
                </a>
              </li>
        <?php endif; ?>
        <?php if($_SESSION['login_type'] == 3): ?>
          <li class="nav-item dropdown">
            <a href="./index.php?page=task_list" class="nav-link nav-task_list">
              <i class="nav-icon fas fa-tasks" id="icon_color"></i>
              <p id="fc">
                Tasks
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=intern_task_evaluation" class="nav-link nav-intern_task_evaluation">
              <i class="nav-icon far fa-edit" id="icon_color"></i>
              <p id="fc">
                Evaluation
              </p>
            </a>
          </li>
            <li class="nav-item dropdown">
            <a href="./index.php?page=id_card_index" class="nav-link nav-id_card_index">
              <i class="nav-icon far fa-id-card" id="icon_color"></i>
              <p id="fc">
                ID Generator
              </p>
            </a>
          </li>
        <?php endif; ?>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script>

<style>

  li {
    font-family: Kanit;
  }

  li:hover {
    background: rgba(255,255,255,0.2);
  border: black solid 1px;
  border-radius: 30px;
  }

#sidenav {
   background-color: #1f1f1f;
   border-radius: 12px;
}

#fc {
  color: white;
}
#icon_color {
  color: white;
}

#fc {
  font-size: 14px;
}


#fc:hover {
  font-family: Titan One;
}

</style>