    <!-- Post Content -->
    <article>
    <div class="padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-10 mx-auto">
          <?php if($update=$this->session->flashdata('post_updated')): ?>
          <div class="double-padding">
            <div class="alert alert-dismissible alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong><?php echo $update; ?></strong>
            </div>
          </div>
          <?php endif; ?>
          <h2><?php echo $post['title'] ;?></h2>
          <small class="time">Posted on <?php echo $post['posted_at'] ;?></small>
           <p><?php echo $post['body']; ?></p>
           <?php if($this->session->userdata('user_id')): ?>
           <a class="btn btn-primary" href="<?php echo base_url('User_controller/editPost/'.$post['id']); ?>">Edit</a>
           <a class="btn btn-danger" href="<?php echo base_url('User_controller/deletePost/'.$post['id']); ?>">Delete</a>
          <?php endif; ?>
          <div class="double-padding">
             <button class="btn btn-info" id="likebtn" >Like</button><span class="count"></span>
          </div>
           <div class="double-padding">
             <h3>Comment</h3>
             <div class="comment">
             </div>
           </div>
           <?php if($this->session->userdata('user_id')): ?>
          <div class="double-padding">
           <form id="commentForm" method="post">
            <div class="form-group">
              <label for="exampleTextarea">Add Comment</label>
              <textarea class="form-control" name="comment_content" id="exampleTextarea" rows="3"></textarea>
            </div>
             <button type="submit" class="btn btn-primary" id="commentSubmit">Submit</button>
           </form>
         </div>
        <?php endif; ?>
          </div>
        </div>
      </div>
      </div>
    </article>
    <hr>
    <script>
      $(document).ready(function(){
        //Function To show likes
        showlike();

        //Function To show Comments
        showComment();

        var id = "<?php echo $post['id']?>";
        function showlike()
        {
          
          $.ajax({
            url : "<?php echo base_url();?>User_controller/countPost",
            method : "post",
            data : {"id" : id},
            dataType: "json",
            success: function(data)
            {
              $(".count").html(data);
            }
          });
        }


        $("#likebtn").click(function(){
          
          $.ajax({
            url : "<?php echo base_url();?>User_controller/likePost",
            data: {"id" :id },
            method : "post",
            dataType: "json",
            success: function(data)
            {
              $(".count").html(data);
             
             
            }
          });  

       });

        function showComment()
        {
          $.ajax({
            url: "<?php  echo base_url();?>User_controller/fetchComment",
            method: "post",
            dataType: "json",
            data: {"id" : id},
            success : function(data)
            {
              $(".comment").html(data);
            }
          });
        }

        $("#commentSubmit").click(function(){
          var data = $("#commentForm").serialize();
          $.ajax({
            url : "<?php echo base_url();?>User_controller/addComment",
            method: "post",
            data: data,
            dataType: "json",
            success : function(data)
            {
              if(data)
              {
                showComment();
              }
              else{
                alert("error");
              }
            }
          });
        })
      });
     
    </script>

   