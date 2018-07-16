
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Yk Admin</b></a>
            <!--logo end-->
            
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo base_url(); ?>Admin/logout">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Yk</h5>
              	  	
                  <li class="mt">
                      <a class="active" href="<?php echo base_url(); ?>Admin">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Total Users</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html"><?php  echo "Abhi"; ?></a></li>
                          <li><a  href="buttons.html"><?php  echo "Abhi"; ?></a></li>
                          <li><a  href="panels.html"><?php  echo "Abhi"; ?></a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Total Posts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html"><?php  echo "Abhi"; ?></a></li>
                          <li><a  href="gallery.html"><?php  echo "Abhi"; ?></a></li>
                          <li><a  href="todo_list.html"><?php  echo "Abhi"; ?></a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_user"></span>
					  			<h3><?php echo '7'; ?></h3>
                  			</div>
					  			<p><?php echo '7'; ?> People are using your blog site Whoohoo!</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_cloud"></span>
					  			<h3><?php echo '+78'; ?></h3>
                  			</div>
					  			<p><?php echo '+78'; ?> Comments On Your Blog Site</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_stack"></span>
					  			<h3><?php echo '+78'; ?></h3>
                  			</div>
					  			<p><?php echo '+78'; ?> Likes on your blog site</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_news"></span>
					  			<h3><?php echo '+78'; ?></h3>
                  			</div>
					  			<p>More than <?php echo '+78'; ?> Post is Posted On your blog site</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_data"></span>
					  			<h3><?php echo '+5'; ?></h3>
                  			</div>
					  			<p><?php echo '+5'; ?> Users Are Online</p>
                  		</div>
                  	
                  	</div><!-- /row mt -->	
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
          </div>
      </footer>
      <!--footer end-->
  </section>

