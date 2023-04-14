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
            <h3 class="box-title"><?php echo ucwords($form_type); ?> Content</h3>
          </div>
          <div class="col-md-6">
            <form role="form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <?php

                foreach ($record as $record) 
                ?>

                <div class="form-group">
                  <label>Main heading</label><br>
                  <input type="name" class="form-control" id="main_heading" name="main_heading" required value="<?php echo !empty($record->main_heading) ? $record->main_heading : '' ?>">
                  <?php echo form_error('main_heading'); ?>
                </div>

                <div class="form-group">
                  <label>Sub heading</label><br>
                  <input type="name" class="form-control" id="sub_heading" name="sub_heading" required value="<?php echo !empty($record->sub_heading) ? $record->sub_heading : '' ?>">
                  <?php echo form_error('sub_heading'); ?>
                </div>

                <div class="form-group">
                  <label>Text</label><br>
                  <textarea type="name" class="form-control" id="text" rows=10 name="text" required><?php echo !empty($record->text) ? $record->text : '' ?></textarea>
                  <?php echo form_error('text'); ?>
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