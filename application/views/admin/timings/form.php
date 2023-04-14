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
// echo $action;
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
            <form role="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label>Start Day</label><br />
                  <select class="form-control" name="day_start" id="day_start">
                    <option <?php echo !empty($record->day_start == 'monday') ? 'selected' : '' ?> value="monday">monday</option>
                    <option <?php echo !empty($record->day_start == 'tuesday') ? 'selected' : '' ?> value="tuesday">tuesday</option>
                    <option <?php echo !empty($record->day_start == 'wednesday') ? 'selected' : '' ?> value="wednesday">wednesday</option>
                    <option <?php echo !empty($record->day_start == 'thursday') ? 'selected' : '' ?> value="thursday">thursday</option>
                    <option <?php echo !empty($record->day_start == 'friday') ? 'selected' : '' ?> value="friday">friday</option>
                    <option <?php echo !empty($record->day_start == 'saturday') ? 'selected' : '' ?> value="saturday">saturday</option>
                    <option <?php echo !empty($record->day_start == 'sunday') ? 'selected' : '' ?> value="sunday">sunday</option>
                  </select>
                  <?php echo form_error('day_start'); ?>
                </div>
                <div class="form-group">
                  <label>End Day</label><br />
                  <select class="form-control" name="day_end" id="day_end">
                    <option <?php echo !empty($record->day_end == 'monday') ? 'selected' : '' ?> value="monday">monday</option>
                    <option <?php echo !empty($record->day_end == 'tuesday') ? 'selected' : '' ?> value="tuesday">tuesday</option>
                    <option <?php echo !empty($record->day_end == 'wednesday') ? 'selected' : '' ?> value="wednesday">wednesday</option>
                    <option <?php echo !empty($record->day_end == 'thursday') ? 'selected' : '' ?> value="thursday">thursday</option>
                    <option <?php echo !empty($record->day_end == 'friday') ? 'selected' : '' ?> value="friday">friday</option>
                    <option <?php echo !empty($record->day_end == 'saturday') ? 'selected' : '' ?> value="saturday">saturday</option>
                    <option <?php echo !empty($record->day_end == 'sunday') ? 'selected' : '' ?> value="sunday">sunday</option>
                  </select>
                  <?php echo form_error('day_end'); ?>
                </div>

                <div class="form-group">
                  <label>Working Days Day (time)</label><br />
                  <input class="form-control my-2 timer" required name="full_day">

                  <input class="form-control my-2 timer" required name="full_day2">

                  <?php echo form_error('full_day2'); ?>
                </div>

                <div class="form-group weekend_time">
                  <label>Weekends (time)</label><br />
                  <button class="btn btn-primary on_off_button" id="open">Open</button>
                  <button class="btn btn-primary on_off_button" id="close">Close</button>
                  <input class="my-2" id="open_close" type="text" name="open_close" value="open" readonly>

                  <input class="form-control my-2 timer" type="text" name="first_half">
                  <input class="form-control my-2 timer" type="text" name="first_half2">

                  <?php echo form_error('first_half2'); ?>
                </div>

                <!-- <div class="form-group">
                  <label>Sunday (time)</label><br />
                  <input class="form-control my-2 timer" type="text" name="second_half">
                  <input class="form-control my-2 timer" type="text" name="second_half2">

                  <?php echo form_error('second_half2'); ?>
                </div> -->

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

<script>
  $("#close").click(function(e) {
    e.preventDefault();
    $('#open_close').val('close')
    $('.weekend_time .timer').addClass('d-none')
    $('.weekend_time .timer').val('')

  })
  $("#open").click(function(e) {
    e.preventDefault();
    $('#open_close').val('open')
    $('.weekend_time .timer').removeClass('d-none')

    console.log($('#open_close').val())
  })
</script>