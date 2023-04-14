<?php
$table_name = 'user';
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
                <label>User Name</label>
                <input type="name" class="form-control" id="master_admin_name" name="master_admin_name"  value="<?php echo !empty($record->master_admin_name) ? $record->master_admin_name : '' ?>">
                <?php echo form_error('master_admin_name'); ?>
              </div>

              <div class="form-group">
                <label>User Email</label>
                <input type="name" class="form-control" id="master_admin_email" name="master_admin_email"  value="<?php echo !empty($record->master_admin_email) ? $record->master_admin_email : '' ?>">
                <?php echo form_error('master_admin_email'); ?>
              </div>

              <div class="form-group">
                <label>User Phone</label>
                <input type="name" class="form-control" id="master_admin_phone" name="master_admin_phone"  value="<?php echo !empty($record->master_admin_phone) ? $record->master_admin_phone : '' ?>">
                <?php echo form_error('master_admin_phone'); ?>
              </div>

              
               <div class="form-group">
                <label>User Password</label>
                <input type="text"  class="form-control" id="master_admin_password" name="master_admin_password" value="<?php echo !empty($record->master_admin_password) ? $this->encryption->decrypt($record->master_admin_password) : '' ?>">
                <?php echo form_error('master_admin_password'); ?>
              </div>


              <div class="form-group">
                <label>User Address</label>
                <input type="name"  class="form-control" id="master_admin_address" name="master_admin_address" value="<?php echo !empty($record->master_admin_address) ? $record->master_admin_address : '' ?>">
                <?php echo form_error('master_admin_address'); ?>
              </div>


              <div class="form-group">
                <label>User Role</label>
                <select rows="6" class="form-control"  id="master_admin_role" name="master_admin_role">
                  <option selected>Select User Role</option>
                  <option <?php echo (!empty($record->master_admin_role) && $record->master_admin_role == 'master admin')?'selected="selected"':'';?> value="master admin">Master Admin</option>

                    <option <?php echo (!empty($record->master_admin_role) && $record->master_admin_role == 'admin')?'selected="selected"':'';?> value="admin">Admin</option>

                    <option <?php echo (!empty($record->master_admin_role) && $record->master_admin_role == 'seo')?'selected="selected"':'';?> value="trainer">Trainer</option>
                    <option <?php echo (!empty($record->master_admin_role) && $record->master_admin_role == 'seo')?'selected="selected"':'';?> value="vendor">Vendor</option>
                    <option <?php echo (!empty($record->master_admin_role) && $record->master_admin_role == 'seo')?'selected="selected"':'';?> value="member">Member</option>
                </select>
                <?php echo form_error('master_admin_role'); ?>
              </div>

              <div class="form-group">
                <label>User Created By:</label>
                <input placeholder="Enter User Name Who Is Creating This Role" type="name"  class="form-control" id="master_admin_created_by" name="master_admin_created_by" value="<?php echo !empty($record->master_admin_created_by) ? $record->master_admin_created_by : '' ?>">
                <?php echo form_error('master_admin_created_by'); ?>
              </div>


                <div class="form-group">
                  <label>User Image</label>
                  <div class="input-group-btn">
                    <div class="image-upload">                      
                      <img src="<?php echo !empty($record->master_admin_image)?base_url('uploads/users/').$record->master_admin_image:base_url('assets/admin/img/placeholder.png')?>">
                      <div class="file-btn">
                        <input type="file" id="master_admin_image" name="master_admin_image">
                        <input type="text" id="master_admin_image" name="master_admin_image" value="<?php echo !empty($record->master_admin_image)?$record->master_admin_image:''?>" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                   <?php echo form_error('master_admin_image'); ?>
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


           