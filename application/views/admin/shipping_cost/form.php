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
  <?php foreach ($record as $record)  ?>
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
                  <label>Height (inches)</label><br>
                  <input readonly type="name" class="form-control" id="Height" name="Height" required value="<?php echo !empty($record->Height) ? $record->Height : '' ?>">
                  <?php echo form_error('Height'); ?>
                </div>

                <div class="form-group">
                  <label>Alphabets (Width)</label><br>
                  <input readonly type="name" class="form-control" id="Width" name="Width" required value="<?php echo !empty($record->Width) ? $record->Width : '' ?>">
                  <?php echo form_error('Width'); ?>
                </div>
                <div class="form-group">
                  <label>Cost of Shipping ($)</label><br>
                  <input type="name" class="form-control" id="cost" name="cost" required value="<?php echo !empty($record->cost) ? $record->cost : '' ?>">
                  <?php echo form_error('cost'); ?>
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