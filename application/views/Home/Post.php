    <!-- Post Content -->
    <article>
    <div class="double-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-10 mx-auto">
          <h2><?php echo $post['title'] ;?></h2>
          <small class="time">Posted on <?php echo $post['posted_at'] ;?></small>
           <p><?php echo $post['body']; ?></p>
           <div class="double-padding">
             <button class="btn btn-info" disabled>Like</button><span class="count"><?php echo $count; ?></span>
          </div>
           <div class="double-padding">
             <h3>Comment</h3>
             <?php if($comments): ?>
              <?php foreach($comments as $comment): ?>
             <div class="comment">
                <span><?php echo $comment['posted_at'] ?></span>
               <p><?php echo $comment['comment_content']; ?></p>
             </div>
            <?php endforeach; ?>
            <?php else: ?>
              <div class="comment">
               <p>No Comments</p>
             </div>
           <?php endif; ?>
           </div>
           <?php if($this->session->userdata('user_id')): ?>
          <div class="double-padding">
           <?php echo form_open('User_controller/addComment/'.$post['id']) ?>
            <div class="form-group">
              <label for="exampleTextarea">Add Comment</label>
              <textarea class="form-control" name="comment_content" id="exampleTextarea" rows="3"></textarea>
            </div>
             <button type="submit" class="btn btn-primary">Submit</button>
           </form>
         </div>
        <?php endif; ?>
          </div>
        </div>
      </div>
      </div>
    </article>
    <hr>

   