
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/CSS/login.css">
</head>
<body background="<?php echo base_url();?>assets/img/home-bg.jpg">
	<div class="back">
		<?php echo anchor('Login','Back'); ?>
	</div>
	<section>
		<div class="container">
			<h1>Register</h1>
			<?php echo form_open('Login/check');?>
				<input type="text" name="username" placeholder="
				Enter Username">
				<input type="password" name="pwd" placeholder="Enter Password">
				<input type="Email" name="email" placeholder="Enter Email">
				<input type="submit" value="Submit">
			<?php form_close();?>
			<?php echo form_error('uname');?>
			<?php echo form_error('pwd');?>
		</div>
	</section>
</body>
</html>
