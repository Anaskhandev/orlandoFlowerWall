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
                  <label>First Heading</label>
                  <input type="name" class="form-control" id="homepage_first_heading" name="homepage_first_heading" required value="<?php echo !empty($record->homepage_first_heading)?$record->homepage_first_heading:''?>">
                  <?php echo form_error('homepage_first_heading'); ?>
                </div> 

                <div class="form-group">
                  <label>Second Heading</label>
                  <input type="name" class="form-control" id="homepage_second_heading" name="homepage_second_heading" required value="<?php echo !empty($record->homepage_second_heading)?$record->homepage_second_heading:''?>">
                  <?php echo form_error('homepage_second_heading'); ?>
                </div> 

                <div class="form-group">
                  <label>Second Text</label>
                  <textarea type="name" class="form-control editor" id="homepage_second_text" name="homepage_second_text" required><?php echo !empty($record->homepage_second_text)?$record->homepage_second_text:''?></textarea>
                  <?php echo form_error('homepage_second_text'); ?>
                </div> 


                <div class="form-group">
                  <label>Third Text</label>
                  <textarea type="name" class="form-control editor" id="homepage_third_text" name="homepage_third_text" required><?php echo !empty($record->homepage_third_text)?$record->homepage_third_text:''?></textarea>
                  <?php echo form_error('homepage_third_text'); ?>
                </div> 

                <div class="form-group">
                  <label>Fourth Heading</label>
                  <input type="name" class="form-control" id="homepage_fourth_heading" name="homepage_fourth_heading" required value="<?php echo !empty($record->homepage_fourth_heading)?$record->homepage_fourth_heading:''?>">
                  <?php echo form_error('homepage_fourth_heading'); ?>
                </div> 

               <div class="form-group">
                  <label>Fourth Text</label>
                  <textarea type="name" class="form-control editor" id="homepage_fourth_text" name="homepage_fourth_text" required><?php echo !empty($record->homepage_fourth_text)?$record->homepage_fourth_text:''?></textarea>
                  <?php echo form_error('homepage_fourth_text'); ?>
                </div> 

                <div class="form-group">
                  <label>Fifth Heading</label>
                  <input type="name" class="form-control" id="homepage_fifth_heading" name="homepage_fifth_heading" required value="<?php echo !empty($record->homepage_fifth_heading)?$record->homepage_fifth_heading:''?>">
                  <?php echo form_error('homepage_fifth_heading'); ?>
                </div> 

                <div class="form-group">
                  <label>Fifth Text</label>
                  <textarea type="name" class="form-control editor" id="homepage_fifth_text" name="homepage_fifth_text" required><?php echo !empty($record->homepage_fifth_text)?$record->homepage_fifth_text:''?></textarea>
                  <?php echo form_error('homepage_fifth_text'); ?>
                </div>  

                <div class="form-group">
                  <label>Sixth Heading</label>
                  <input type="name" class="form-control" id="homepage_sixth_heading" name="homepage_sixth_heading" required value="<?php echo !empty($record->homepage_sixth_heading)?$record->homepage_sixth_heading:''?>">
                  <?php echo form_error('homepage_sixth_heading'); ?>
                </div> 

                <div class="form-group">
                  <label>Sixth Text</label>
                  <textarea type="name" class="form-control editor" id="homepage_sixth_text" name="homepage_sixth_text" required><?php echo !empty($record->homepage_sixth_text)?$record->homepage_sixth_text:''?></textarea>
                  <?php echo form_error('homepage_sixth_text'); ?>
                </div> 

                <div class="form-group">
                  <label>Seventh Heading</label>
                  <input type="name" class="form-control" id="homepage_seventh_heading" name="homepage_seventh_heading" required value="<?php echo !empty($record->homepage_seventh_heading)?$record->homepage_seventh_heading:''?>">
                  <?php echo form_error('homepage_seventh_heading'); ?>
                </div> 

                <div class="form-group">
                  <label>Seventh Text</label>
                  <textarea type="name" class="form-control editor" id="homepage_seventh_text" name="homepage_seventh_text" required><?php echo !empty($record->homepage_seventh_text)?$record->homepage_seventh_text:''?></textarea>
                  <?php echo form_error('homepage_seventh_text'); ?>
                </div> 

                 <div class="form-group">
                  <label>Address</label>
                  <textarea type="name" class="form-control editor" id="homepage_address" name="homepage_address" required><?php echo !empty($record->homepage_address)?$record->homepage_address:''?></textarea>
                  <?php echo form_error('homepage_address'); ?>
                </div> 

                 <div class="form-group">
                  <label>Contact</label>
                  <textarea type="name" class="form-control editor" id="homepage_contact" name="homepage_contact" required><?php echo !empty($record->homepage_contact)?$record->homepage_contact:''?></textarea>
                  <?php echo form_error('homepage_contact'); ?>
                </div>  
                
                
           <!--      <div class="form-group">
                  <label>Gallery Layout Image</label>
                  <div class="input-group-btn">
                    <div class="image-upload">                      
                      <img src="<?php echo !empty($record->gallery_layout_image)?base_url('uploads/homepage/').$record->gallery_layout_image:base_url('assets/admin/img/placeholder.png')?>">
                      <div class="file-btn">
                        <input type="file" id="gallery_layout_image" name="gallery_layout_image">
                        <input type="text" id="gallery_layout_image" name="gallery_layout_image" value="<?php echo !empty($record->gallery_layout_image)?$record->gallery_layout_image:''?>" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                   <?php echo form_error('gallery_layout_image'); ?>                
                 </div>    -->              

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