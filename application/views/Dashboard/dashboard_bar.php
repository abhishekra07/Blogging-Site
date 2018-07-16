   <!-- Dashboard nav start here-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link " href="<?php echo base_url(); ?>User_controller">Dashboard</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Category</a>
    <div class="dropdown-menu">
      <?php foreach($categories as $category): ?>
      <a class="dropdown-item" href="<?php echo base_url('User_controller/category_search/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
    <?php endforeach; ?>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>User_controller/create_post">Create Post</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('User_controller/viewPosts/'. $user_id);?>">View Post</a>
  </li>

  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="label label-pill label-danger count"> Notification</span></a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url();?>User_controller/changePassword">Change Password</a>
                <a class="dropdown-item" href="<?php echo base_url();?>User_controller/changeUsername">Change Username</a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>User_controller/Logout">Logout</a>
              </div>
            </li> 

  </ul>
</div>
</nav>
  <!-- dashboard end here -->