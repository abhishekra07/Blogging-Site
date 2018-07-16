    <!-- Main Content -->
  <div class="padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php if($invalid = $this->session->flashdata('Invalid_Password')):?>

          <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php echo $invalid; ?></strong>
          </div>
        
        <?php  elseif($success = $this->session->flashdata('Success')): ?>

           <div class="alert alert-dismissible alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong><?php echo $success; ?></strong>
          </div>

        <?php endif; ?>
            <?php echo form_open('User_controller/usernameProcess') ?>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Current Username</label>
                <input type="text" class="form-control" placeholder="Current Username" name="cuname" required>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>New Username</label>
                <input type="text" class="form-control" placeholder="New Username" name="nuname" required >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Change Username</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    <hr>