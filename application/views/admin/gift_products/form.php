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
  <?php foreach ($record as $r) ?>
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
                      <img src="<?php echo !empty($r->picture) ? base_url('assets/front/img/') . $r->picture : "" ?>">
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
                  <label>name</label>
                  <input type="name" class="form-control" id="name" name="name" required value="<?php echo $r->name; ?>">
                  <?php echo form_error('name'); ?>
                </div>
                <input type="text" hidden value="enable" name="gift_products_status">

                <div class="form-group">
                  <label>price</label>
                  <input type="name" class="form-control" id="price" name="price" required value="<?php echo !empty($r->price) ? $r->price : '' ?>">
                  <?php echo form_error('price'); ?>
                </div>

                <div class="form-group">
                  <label>Related Field</label>
                  <select type="name" class="form-control" id="related" name="related" required value="<?php echo !empty($r->related) ? $r->related : '' ?>">
                    <option selected value="<?php echo !empty($r->related) ? $r->related : '' ?>"><?php echo !empty($r->related) ? $r->related : '' ?></option>
                    <?php foreach ($list as $l) : ?>
                      <option value="<?php echo !empty($l->name) ? $l->name : '' ?>"><?php echo !empty($l->name) ? $l->name : '' ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('related'); ?>
                </div>





                <!--      <div class="form-group">
                  <label>Gallery Layout Image</label>
                  <div class="input-group-btn">
                    <div class="image-upload">                      
                      <img src="<?php echo !empty($r->gallery_layout_image) ? base_url('uploads/homepage/') . $r->gallery_layout_image : base_url('assets/admin/img/placeholder.png') ?>">
                      <div class="file-btn">
                        <input type="file" id="gallery_layout_image" name="gallery_layout_image">
                        <input type="text" id="gallery_layout_image" name="gallery_layout_image" value="<?php echo !empty($r->gallery_layout_image) ? $r->gallery_layout_image : '' ?>" hidden>
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