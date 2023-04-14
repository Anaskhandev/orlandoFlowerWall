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
                  <label>Page name</label>
                  <input type="name" class="form-control" id="seo_page_name" name="seo_page_name" required value="<?php echo !empty($record->seo_page_name)?$record->seo_page_name:''?>">
                  <?php echo form_error('seo_page_name'); ?>
                </div> 
                
                <div class="form-group">
                  <label>Page link</label>
                  <input type="name" class="form-control" id="seo_page_link" name="seo_page_link" required value="<?php echo !empty($record->seo_page_link)?$record->seo_page_link:''?>">
                  <?php echo form_error('seo_page_link'); ?>
                </div> 
                <div class="form-group">
                  <label>Page title</label>
                  <input type="name" class="form-control" id="seo_page_title" name="seo_page_title" value="<?php echo !empty($record->seo_page_title)?$record->seo_page_title:''?>">
                  <?php echo form_error('seo_page_title'); ?>
                </div> 
                <div class="form-group">
                  <label>Meta title</label>
                  <input type="name" class="form-control" id="seo_meta_title" name="seo_meta_title" value="<?php echo !empty($record->seo_meta_title)?$record->seo_meta_title:''?>">
                  <?php echo form_error('seo_meta_title'); ?>
                </div> 
                <div class="form-group">
                  <label>Meta description</label>
                  <textarea rows="6" class="form-control" id="seo_meta_description" name="seo_meta_description" ><?php echo !empty($record->seo_meta_description)?$record->seo_meta_description:''?></textarea>
                  <?php echo form_error('seo_meta_description'); ?>
                </div> 
                <div class="form-group">
                  <label>Meta keyword</label>
                  <textarea rows="6" class="form-control" id="seo_meta_keyword" name="seo_meta_keyword"><?php echo !empty($record->seo_meta_keyword)?$record->seo_meta_keyword:''?></textarea>
                  <?php echo form_error('seo_meta_keyword'); ?>
                </div> 
                <div class="form-group">
                  <label>Meta canonical</label>
                  <input type="name" class="form-control" id="seo_meta_canonical" name="seo_meta_canonical" value="<?php echo !empty($record->seo_meta_canonical)?$record->seo_meta_canonical:''?>">
                  <?php echo form_error('seo_meta_canonical'); ?>
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