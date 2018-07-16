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
            <?php echo form_open('User_controller/passwordProcess') ?>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Current Password</label>
                <input type="password" class="form-control" placeholder="Current Password" name="cpwd" required>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>New Password</label>
                <input type="password" class="form-control" placeholder="New Password" name="npwd" required >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" id="re-confirm" required>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Change Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    <hr>