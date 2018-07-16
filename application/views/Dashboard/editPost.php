<div class="padding">
<div class="container">

<h1>Edit Post</h1>
<?php echo form_open('User_controller/Updating_post/'.$post['id']); ?>
	<div class="form-group">
      <label for="exampleInputPassword1">Title</label>
      <input type="text" name="title" class="form-control" id="exampleInputPassword1" value="<?php echo $post['title']; ?>">
    </div>
      <div class="form-group">
      <label for="exampleTextarea" >Body</label>
      <textarea class="form-control" id="editor1" name="body" id="exampleTextarea" rows="3" value="<?php echo $post['body']; ?>"><?php echo $post['body']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="exampleSelect1">Category</label>
      <select name="category" class="form-control" id="exampleSelect1">
      	<?php foreach($categories as $category): ?>
        <option value=" <?php echo $category['id'];?> "><?php echo $category['name']; ?></option>
    <?php endforeach; ?>
      </select>
    </div>

 <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</div>