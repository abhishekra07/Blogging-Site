  
    <!-- Main Content -->
  <div class="double-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
          <?php foreach($posts as $post): ?>
          <div class="post-preview">
            <a href="<?php echo base_url('Login/Post/'.$post['id']); ?>">
              <h2 class="post-title">
                <?php echo $post['title'] ;?>
              </h2>
              <h3 class="post-subtitle">
                <?php echo word_limiter($post['body'],50); ?>
              </h3>
            </a>
            <p class="post-meta">Posted
              on <?php echo $post['posted_at']; ?></p>
          </div>
          <a class="btn btn-outline-info" href="<?php echo base_url('Login/Post/'.$post['id']); ?>">Read More</a>
          <hr>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
    <hr>

 