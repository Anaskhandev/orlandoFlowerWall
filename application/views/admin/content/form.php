<?php
$table_name = $this->uri->segment(2);
$form_type = $this->uri->segment(4);
$id = $this->uri->segment(5);
$action = '';
if ($form_type == 'edit') {
  if (!empty($id)) {
    $action = base_url('admin/') . $table_name . '/form2/edit/' . $id;
  } else {
    redirect('admin/' . $table_name);
  }
} else if ($form_type == 'duplicate') {
  if (!empty($id)) {
    $action = base_url('admin/') . $table_name . '/form2/duplicate/' . $id;
  } else {
    redirect('admin/' . $table_name);
  }
} else if ($form_type == 'add') {
  $action = base_url('admin/') . $table_name . '/form2/add';
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
                  <label>Heading (optional)</label>
                  <input type="Heading" class="form-control" id="heading" name="heading" value="<?php echo $r->heading; ?>">
                  <?php echo form_error('name'); ?>
                </div>
                <input type="text" hidden value="enable" name="content_status">

                <!-- <div class="form-group">
                  <label>page</label>
                  <select type="name" class="form-control" id="page" name="page" required value="<?php
                                                                                                  //  echo !empty($r->page) ? $r->page : '' 
                                                                                                  ?>">
                    <option selected value="<?php
                                            //  echo !empty($r->page) ? $r->page : '' 
                                            ?>"><?php
                                                // echo !empty($r->page) ? $r->page : '' 
                                                ?> page</option>
                    <option value="home">Home page</option>
                    <option value="flowers">Flowers page</option>
                    <option value="gifts">Gifts page</option>
                  </select>
                  <?php
                  // echo form_error('page'); 
                  ?>
                </div> -->
                <label>Pages:</label>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="home[]" value="" <?php echo !empty($r->home) && $r->home == 1 ? 'checked' : '' ?>>
                  <label class="form-check-label" for="flexCheckDefault">
                    Home
                  </label>
                  <?php echo form_error('page'); ?>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="flowers[]" <?php echo !empty($r->flowers) && $r->flowers == 1 ? 'checked' : '' ?>>
                  <label class="form-check-label" for="flexCheckDefault">
                    Flowers
                  </label>
                  <?php echo form_error('page'); ?>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="gifts[]" <?php echo !empty($r->gifts) && $r->gifts == 1 ? 'checked' : '' ?>>
                  <label class="form-check-label" for="flexCheckDefault">
                    Gifts
                  </label>
                  <?php echo form_error('page'); ?>
                </div>

                <div class="form-group">
                  <label>Sub Heading (optional)</label>
                  <input type="text" class="form-control" id="text" name="text" value="<?php echo !empty($r->text) ? $r->text : '' ?>">
                  <?php echo form_error('text'); ?>
                </div>

                <div class="form-group">
                  <label>Related Field</label>
                  <select type="text" class="form-control" id="related" name="relatedContent" required value="<?php echo !empty($r->relatedContent) ? $r->relatedContent : '' ?>">
                    <option selected value="<?php echo !empty($r->relatedContent) ? $r->relatedContent : '' ?>"><?php echo !empty($r->relatedContent) ? $r->relatedContent : '' ?></option>
                    <?php foreach ($list as $l) : ?>
                      <option value="<?php echo !empty($l->name) ? $l->name : '' ?>"><?php echo !empty($l->name) ? $l->name : '' ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('related'); ?>
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