<div class="content-wrapper">
  <section class="content-header">
    <h1>
        <?php echo !empty($title)?$title:'Title';?>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data</h3>
          </div>     
          <div class="col-md-6">
            <form role="form" action="<?php echo base_url('admin/settings/social');?>" method="post" enctype="multipart/form-data">       
              <div class="box-body">
                <div class="form-group">
                  <label>Facebook</label>
                  <input type="name" class="form-control" id="social_facebook" name="social_facebook" value="<?php echo !empty($record->social_facebook)?$record->social_facebook:''?>">
                  <?php echo form_error('social_facebook'); ?>
                </div>

                <div class="form-group">
                  <label>Twitter</label>
                  <input type="name" class="form-control" id="social_twitter" name="social_twitter" value="<?php echo !empty($record->social_twitter)?$record->social_twitter:''?>">
                  <?php echo form_error('social_twitter'); ?>
                </div>

                <div class="form-group hidden">
                  <label>Tumblr</label>
                  <input type="name" class="form-control" id="social_tumblr" name="social_tumblr" value="<?php echo !empty($record->social_tumblr)?$record->social_tumblr:''?>">
                  <?php echo form_error('social_tumblr'); ?>
                </div>

                <div class="form-group">
                  <label>Linkedin</label>
                  <input type="name" class="form-control" id="social_linkedin" name="social_linkedin" value="<?php echo !empty($record->social_linkedin)?$record->social_linkedin:''?>">
                  <?php echo form_error('social_linkedin'); ?>
                </div>

                <div class="form-group">
                  <label>Youtube</label>
                  <input type="name" class="form-control" id="social_youtube" name="social_youtube" value="<?php echo !empty($record->social_youtube)?$record->social_youtube:''?>">
                  <?php echo form_error('social_youtube'); ?>
                </div>

                <div class="form-group">
                  <label>Google Plus</label>
                  <input type="name" class="form-control" id="social_googleplus" name="social_googleplus" value="<?php echo !empty($record->social_googleplus)?$record->social_googleplus:''?>">
                  <?php echo form_error('social_googleplus'); ?>
                </div>

                <div class="form-group">
                  <label>Instagram</label>
                  <input type="name" class="form-control" id="social_instagram" name="social_instagram" value="<?php echo !empty($record->social_instagram)?$record->social_instagram:''?>">
                  <?php echo form_error('social_instagram'); ?>
                </div>                                                                                            
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>    
            </form>        
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>
