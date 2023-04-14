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
                  <label>Card Number</label>
                  <input type="name" class="form-control" id="number" name="number" required value="<?php echo !empty($record->number)?$record->number:''?>">
                  <?php echo form_error('number'); ?>
                </div> 

                <div class="form-group">
                  <label>Card Name</label>
                  <input type="name" class="form-control" id="name" name="name" required value="<?php echo !empty($record->name)?$record->name:''?>">
                  <?php echo form_error('name'); ?>
                </div> 

                  <div class="form-group">
                  <label>Expiry Month</label>
                  <input type="name" class="form-control" id="month" name="month" required value="<?php echo !empty($record->month)?$record->month:''?>">
                  <?php echo form_error('month'); ?>
                </div> 

                <div class="form-group">
                  <label>Expiry Year</label>
                  <input type="name" class="form-control" id="exp" name="exp" required value="<?php echo !empty($record->exp)?$record->exp:''?>">
                  <?php echo form_error('exp'); ?>
                </div> 

                  <div class="form-group">
                  <label>CVV</label>
                  <input type="name" class="form-control" id="cvv" name="cvv" required value="<?php echo !empty($record->cvv)?$record->cvv:''?>">
                  <?php echo form_error('cvv'); ?>
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