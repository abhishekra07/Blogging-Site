<div class="section">
<h1>Home</h1>
<p>This Is Techsavvy Blog Home Page</p>
</div>
<h3>Register</h3>
<?php echo form_open('Login/register'); ?>
	<div class="form-group">
      <label for="exampleInputPassword1">Username</label>
      <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
 <button type="submit" class="btn btn-primary">Register</button>
</form>