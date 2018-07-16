<div class="section">
<h1>Home</h1>
<p>This Is Abhi's Blog Home Page</p>
</div>
<?php echo form_open('Login/user'); ?>
	<div class="form-group">
      <label for="exampleInputPassword1">username</label>
      <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username">
    </div>

<div class="form-group">
      <label for="exampleInputPassword1">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email Address">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
 <button type="submit" class="btn btn-primary">Register</button>
</form>