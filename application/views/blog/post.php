<div class="container">
	<div>
	<h2><?php echo $post['title'] ;?></h2>
	<small class="post-time">
		<?php echo $post['posted_at']; ?>
	</small>
	<h5></h5>
	<p><?php echo $post['body'] ;?></p>
	</div>
	<?php echo form_open("Login/comment/".$post['id']); ?>
	<hr>
	<h5><button type="button" class="btn btn-info"><a herf="#<!-- <?php echo base_url('Login/Like/'.$post['id']); ?> -->">Like</a></button></h5>
	<hr>
	<h3>Comments</h3>
	<?php if($comments): ?>
		<?php foreach($comments as $comment): ?>
			<p class="comments"><?php echo $comment['comment_body']; ?>  [by: <strong><?php echo $comment['name']; ?></strong>]</p>
		<?php endforeach; ?>
	<?php else : ?>
		<p>No Comments</p>
	<?php endif; ?>
	<hr>
	<h2>Add Comments</h2>
	<div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Name">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email Address">
    </div>
    <div class="form-group">
      <textarea name="comment_body" id="" cols="30" rows="10"></textarea>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>

</form>