<?php
$table_name = $this->uri->segment(2);
$form_type = $this->uri->segment(4);
$id = $this->uri->segment(5);
$action = '';
if($form_type == 'edit'){
  if(!empty($id)){
    $action = base_url('admin/').$table_name.'/form/edit/'.$id;
  }
  else{      
    redirect('admin/'.$table_name);
  }
}
else if($form_type == 'duplicate'){  
  if(!empty($id)){  
    $action = base_url('admin/').$table_name.'/form/duplicate/'.$id;
  }
  else{      
    redirect('admin/'.$table_name);
  }    
}
else if($form_type == 'add'){
  $action = base_url('admin/').$table_name.'/form/add';
}
else{
  redirect('admin/'.$table_name);
}
?>
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
            <h3 class="box-title"><?php echo ucwords($form_type);?> Data</h3>
          </div>     
          <div class="col-md-6">
            <form role="form" action="<?php echo $action;?>" method="post" enctype="multipart/form-data">       
              <div class="box-body">

                 <div class="form-group">
                  <label>Name</label>
                  <textarea type="name" class="form-control editor" id="video_name" name="video_name" required><?php echo !empty($record->video_name)?$record->video_name:''?></textarea>
                  <?php echo form_error('video_name'); ?>
                </div>  
                
                
                <div class="form-group">
                  <label>First Video</label>
                  <div class="input-group-btn">
                    <div class="video-upload">                      
                      <img src="<?php echo !empty($record->video_first)?base_url('uploads/video/').$record->video_first:base_url('assets/admin/img/placeholder.png')?>">
                      <div class="file-btn">
                        <input type="file" id="video_first" name="video_first">
                        <input type="text" id="video_first" name="video_first" value="<?php echo !empty($record->video_first)?$record->video_first:''?>" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                   <?php echo form_error('video_first'); ?>                
                 </div>  

                   <div class="form-group">
                  <label>Second Video</label>
                  <div class="input-group-btn">
                    <div class="video-upload">                      
                      <img src="<?php echo !empty($record->video_second)?base_url('uploads/video/').$record->video_second:base_url('assets/admin/img/placeholder.png')?>">
                      <div class="file-btn">
                        <input type="file" id="video_second" name="video_second">
                        <input type="text" id="video_second" name="video_second" value="<?php echo !empty($record->video_second)?$record->video_second:''?>" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                   <?php echo form_error('video_second'); ?>                
                 </div> 

                   <div class="form-group">
                  <labelh>Third Video</label>
                  <div class="input-group-btn">
                    <div class="video-upload">                      
                      <img src="<?php echo !empty($record->video_third)?base_url('uploads/video/').$record->video_third:base_url('assets/admin/img/placeholder.png')?>">
                      <div class="file-btn">
                        <input type="file" id="video_third" name="video_third">
                        <input type="text" id="video_third" name="video_third" value="<?php echo !empty($record->video_third)?$record->video_third:''?>" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                   <?php echo form_error('video_third'); ?>                
                 </div> 

                   <div class="form-group">
                  <label>Fourth Video</label>
                  <div class="input-group-btn">
                    <div class="video-upload">                      
                      <img src="<?php echo !empty($record->video_fourth)?base_url('uploads/video/').$record->video_fourth:base_url('assets/admin/img/placeholder.png')?>">
                      <div class="file-btn">
                        <input type="file" id="video_fourth" name="video_fourth">
                        <input type="text" id="video_fourth" name="video_fourth" value="<?php echo !empty($record->video_fourth)?$record->video_fourth:''?>" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                   <?php echo form_error('video_fourth'); ?>                
                 </div> 

                   <div class="form-group">
                  <label>Fifth Video</label>
                  <div class="input-group-btn">
                    <div class="video-upload">                      
                      <img src="<?php echo !empty($record->video_fifth)?base_url('uploads/video/').$record->video_fifth:base_url('assets/admin/img/placeholder.png')?>">
                      <div class="file-btn">
                        <input type="file" id="video_fifth" name="video_fifth">
                        <input type="text" id="video_fifth" name="video_fifth" value="<?php echo !empty($record->video_fifth)?$record->video_fifth:''?>" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                   <?php echo form_error('video_fifth'); ?>                
                 </div> 

                   <div class="form-group">
                  <label>Sixth Video</label>
                  <div class="input-group-btn">
                    <div class="video-upload">                      
                      <img src="<?php echo !empty($record->video_sixth)?base_url('uploads/video/').$record->video_sixth:base_url('assets/admin/img/placeholder.png')?>">
                      <div class="file-btn">
                        <input type="file" id="video_sixth" name="video_sixth">
                        <input type="text" id="video_sixth" name="video_sixth" value="<?php echo !empty($record->video_sixth)?$record->video_sixth:''?>" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                   <?php echo form_error('video_sixth'); ?>                
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