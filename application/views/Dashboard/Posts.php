<div class="padding">
  <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
        <?php if($posted = $this->session->flashdata('post_added')): ?>
          <div class="alert alert-dismissible alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong><?php echo $posted;?></strong>
          </div>
        <?php elseif($delete = $this->session->flashdata('delete')): ?>
          <div class="alert alert-dismissible alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong><?php echo $delete;?></strong>
          </div>
        <?php endif; ?>
          <div class="post-preview">
            <?php foreach($posts as $post): ?>
              <h1><a href="<?php echo base_url('User_controller/Post/'.$post['id']); ?>" class="post-title"><?php echo $post['title'] ;?>
              </a></h1>
              <p class="post-meta">Posted on <?php echo $post['posted_at'] ;?></p>
              <h3 class="post-subtitle">
                <?php echo word_limiter($post['body'], 50 ); ?>
              </h3><br>
              <a class="btn btn-outline-info" href="<?php echo base_url('User_controller/Post/'.$post['id']); ?>">Read More</a>
            <hr>
            <?php endforeach; ?>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>