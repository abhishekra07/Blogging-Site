<div class="container">
	<div>
		<?php foreach($posts as $post): ?>
	<h2><?php echo $post['title'] ;?></h2>
	<small class="post-time">
		<?php echo $post['posted_at']; ?>
	</small>
	<h5></h5>
	<p><?php echo $post['body'] ;?></p>
	<a href="<?php echo base_url('Login/post/'.$post['id']); ?>" class="btn btn-secondary">Read More</a>
		<?php endforeach; ?>
	</div>
</div>