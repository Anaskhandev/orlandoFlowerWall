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
  <?php
  foreach ($record as $r) ?>
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
                  <label>Image</label>
                  <div class="input-group-btn">
                    <div class="image-upload">
                      <img src="<?php echo !empty($r->picture) ? base_url('assets/front/img/upload/') . $r->picture : "" ?>">
                      <div class="file-btn">
                        <input type="file" id="picture" name="picture">
                        <input type="text" id="picture" name="picture" value="<?php echo !empty($r->picture) ? $r->picture : '' ?>" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                  <?php echo form_error('image'); ?>
                </div>



                <div class="form-group">
                  <label>Place</label>
                  <input type="name" class="form-control" id="page" value="<?php echo !empty($r->page) ? $r->page : '' ?>" name="page" required readonly>
                  <?php echo form_error('Page'); ?>
                </div>
                <!-- <input type="text" hidden value="enable" name="_status"> -->

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