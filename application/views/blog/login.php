<h1>Login</h1>
<?php echo form_open('Login/user'); ?>
	<div class="form-group">
      <label for="exampleInputPassword1">username</label>
      <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
 <button type="submit" class="btn btn-primary">Login</button>
</form>