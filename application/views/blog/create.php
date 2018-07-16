<h1>Create New Post</h1>
<?php echo form_open('Login/create_post/'.$user_id); ?>
	<div class="form-group">
      <label for="exampleInputPassword1">Title</label>
      <input type="text" name="title" class="form-control" id="exampleInputPassword1">
    </div>
      <div class="form-group">
      <label for="exampleTextarea">Body</label>
      <textarea class="form-control" name="body" id="exampleTextarea" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleSelect1">Category</label>
      <select name="category" class="form-control" id="exampleSelect1">
      	<?php foreach($categories as $category): ?>
        <option value="<?php echo $category['id'];?>"><?php echo $category['name']; ?></option>
    <?php endforeach; ?>
      </select>
    </div>

 <button type="submit" class="btn btn-primary">Post</button>
</form>