<?php
$table_name = $this->uri->segment(2);
$record_id = $this->uri->segment(2) . '_id';
$form_type = $this->uri->segment(4);
$id = $this->uri->segment(5);
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
          <!-- <div class="box-header with-border">  
            <a href="<?php echo site_url('admin/' . $table_name . '/form/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
          </div>  -->
          <div class="box-body">
            <h3>Custom Neon</h3>

            <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Type</th>
                  <th>Size</th>
                  <th>Letters</th>
                  <th>Length</th>
                  <th>Height</th>
                  <th>Additional Price / letter</th>
                  <th>Rebow Commission</th>
                  <th>Processing Fee</th>
                  <th>Total Price</th>
                  <th>My Commission</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                if (!empty($records)) : foreach ($records as $record) : ?>
                    <tr>
                      <td><?php echo $i; ?></td>

                      <td><?php echo !empty($record->type) ? $record->type : ''; ?></td>

                      <td><?php echo !empty($record->size) ? $record->size : ''; ?></td>

                      <td><?php echo !empty($record->alphabets) ? $record->alphabets : ''; ?> Letters</td>

                      <td><?php echo !empty($record->length) ? $record->length : ''; ?> </td>

                      <td><?php echo !empty($record->height) ? $record->height : ''; ?></td>

                      <td><?php echo !empty($record->additional_letter) ? '$' . $record->additional_letter : ''; ?></td>

                      <td><?php echo !empty($record->second_commission) ? '$' . $record->second_commission : ''; ?></td>

                      <td><?php echo !empty($record->Processing_Fee) ? '$' . $record->Processing_Fee : ''; ?></td>

                      <td><?php echo !empty($record->total_price) ? '$' . $record->total_price : ''; ?></td>

                      <td><?php echo !empty($record->my_commission) ? '$' . $record->my_commission : ''; ?></td>

                      <td>
                        <a href="<?php echo !empty($record->$record_id) ? base_url('admin/' . $table_name . '/form/edit/') . $record->$record_id : ''; ?>"><span class="edit_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                        <a href="<?php echo !empty($record->$record_id) ? base_url('admin/' . $table_name . '/view/') . $record->$record_id : ''; ?>"><span class="view_icon"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                      </td>
                    </tr>
                  <?php $i++;
                  endforeach; ?>
                <?php else : ?>
                  <tr>
                    <td>No Record Found</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- <div class="box-header with-border">  
            <a href="<?php echo site_url('admin/' . $table_name . '/form/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
          </div>  -->
          <div class="box-body">
            <h3>Non Lit</h3>
            <table id="datatable2" class=" table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Type</th>
                  <th>Size</th>
                  <th>Letters</th>
                  <th>Length</th>
                  <th>Height</th>
                  <th>Additional Price / letter</th>
                  <th>Rebow Commission</th>
                  <th>Processing Fee</th>
                  <th>Total Price</th>
                  <th>My Commission</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                if (!empty($records2)) : foreach ($records2 as $record2) : ?>
                    <tr>
                      <td><?php echo $i; ?></td>

                      <td><?php echo !empty($record2->type) ? $record2->type : ''; ?></td>

                      <td><?php echo !empty($record2->size) ? $record2->size : ''; ?></td>

                      <td><?php echo !empty($record2->alphabets) ? $record2->alphabets : ''; ?> letters </td>

                      <td><?php echo !empty($record2->length) ? $record2->length : ''; ?> </td>

                      <td><?php echo !empty($record2->height) ? $record2->height : ''; ?></td>

                      <td><?php echo !empty($record2->additional_letter) ? '$' . $record2->additional_letter : ''; ?></td>

                      <td><?php echo !empty($record2->second_commission) ? '$' . $record2->second_commission : ''; ?></td>

                      <td><?php echo !empty($record2->Processing_Fee) ? '$' . $record2->Processing_Fee : ''; ?></td>

                      <td><?php echo !empty($record2->total_price) ? '$' . $record2->total_price : ''; ?></td>

                      <td><?php echo !empty($record2->my_commission) ? '$' . $record2->my_commission : ''; ?></td>

                      <td>
                        <a href="<?php echo !empty($record2->$record_id) ? base_url('admin/' . $table_name . '/form/edit/') . $record2->$record_id : ''; ?>"><span class="edit_icon"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                        <a href="<?php echo !empty($record2->$record_id) ? base_url('admin/' . $table_name . '/view/') . $record2->$record_id : ''; ?>"><span class="view_icon"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                      </td>
                    </tr>
                  <?php $i++;
                  endforeach; ?>
                <?php else : ?>
                  <tr>
                    <td>No Record Found</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>