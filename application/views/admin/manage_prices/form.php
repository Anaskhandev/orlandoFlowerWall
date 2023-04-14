<?php
$table_name = $this->uri->segment(2);
$form_type = $this->uri->segment(4);
$id = $this->uri->segment(5);
$action = '';
if ($form_type == 'edit') {
  if (!empty($id)) {
    $action = base_url('admin/') . $table_name . '/form/edit/' . $id;
  } else {
    redirect('admin/' . $table_name);
  }
} else if ($form_type == 'duplicate') {
  if (!empty($id)) {
    $action = base_url('admin/') . $table_name . '/form/duplicate/' . $id;
  } else {
    redirect('admin/' . $table_name);
  }
} else if ($form_type == 'add') {
  $action = base_url('admin/') . $table_name . '/form/add';
} else {
  redirect('admin/' . $table_name);
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?php echo !empty($title) ? $title : 'Title'; ?>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo ucwords($form_type); ?> Data</h3>
          </div>
          <div class="col-md-6">
            <form role="form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label>Size</label>
                  <input type="name" class="form-control" id="size" name="size" required value="<?php echo !empty($record->size) ? $record->size : '' ?>">
                  <?php echo form_error('size'); ?>
                </div>

                <div class="form-group">
                  <label>Length</label>
                  <input type="text" class="form-control" id="length" name="length" required value="<?php echo !empty($record->length) ? $record->length : '' ?>">
                  <?php echo form_error('length'); ?>
                </div>


                <div class="form-group">
                  <label>Height</label>
                  <input type="name" class="form-control" id="height" name="height" required value="<?php echo !empty($record->height) ? $record->height : '' ?>">
                  <?php echo form_error('height'); ?>
                </div>

                <div class="form-group">
                  <label>Words Count (Letters count)</label>
                  <input type="number" class="form-control" id="alphabets" name="alphabets" required value="<?php echo !empty($record->alphabets) ? $record->alphabets : '' ?>">
                  <?php echo form_error('alphabets'); ?>
                </div>

                <div class="form-group">
                  <label>Additional letter</label>
                  <input type="name" class="form-control" id="additional_letter" name="additional_letter" required value="<?php echo !empty($record->additional_letter) ? $record->additional_letter : '' ?>">
                  <?php echo form_error('total_price'); ?>
                </div>

                <div class="form-group">
                  <label>Rebow Commission</label>
                  <input type="name" class="form-control" id="second_commission" name="second_commission" value="<?php echo !empty($record->second_commission) ? $record->second_commission : '' ?>">
                  <?php echo form_error('second_commission'); ?>
                </div>

                <div class="form-group">
                  <label>Processing Fee</label>
                  <input type="name" class="form-control" id="Processing_Fee" name="Processing_Fee" required value="4%" readonly>
                  <?php echo form_error('Processing_Fee'); ?>
                </div>

                <div class="form-group">
                  <label>Total Price</label>
                  <input type="name" class="form-control" id="total_price" name="total_price" required value="<?php echo !empty($record->total_price) ? $record->total_price : '' ?>">
                  <?php echo form_error('total_price'); ?>
                </div>

                <div class="form-group">
                  <label>My Commission</label>
                  <input type="name" class="form-control" id="my_commission" name="my_commission" required value="<?php echo !empty($record->my_commission) ? $record->my_commission : '' ?>">
                  <?php echo form_error('my_commission'); ?>
                </div>



                <!--      <div class="form-group">
                  <label>Gallery Layout Image</label>
                  <div class="input-group-btn">
                    <div class="image-upload">                      
                      <img src="<?php echo !empty($record->gallery_layout_image) ? base_url('uploads/homepage/') . $record->gallery_layout_image : base_url('assets/admin/img/placeholder.png') ?>">
                      <div class="file-btn">
                        <input type="file" id="gallery_layout_image" name="gallery_layout_image">
                        <input type="text" id="gallery_layout_image" name="gallery_layout_image" value="<?php echo !empty($record->gallery_layout_image) ? $record->gallery_layout_image : '' ?>" hidden>
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