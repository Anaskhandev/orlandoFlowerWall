<?php
  $table_name = $this->uri->segment(2);
  $record_id = $this->uri->segment(2).'_id';
  $form_type = $this->uri->segment(4);
  $id = $this->uri->segment(5);
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
              <a href="<?php echo site_url('admin/'.$table_name.'/form/add');?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
            </div>  
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
            <tr>
              <th>S.No</th>
              <th>User Name</th>
              <th>User Email</th>
              <th>User Role</th>
              <th>Action</th>
            </tr>
          </thead>
                <tbody>
            <?php $i = 1;
            if (!empty($records)) : foreach ($records as $record) : ?>
                <tr>
                  <td><?php echo $i; ?></td>

                   <td><?php echo !empty($record->master_admin_name) ? $record->master_admin_name : ''; ?></td>
                  <td><?php echo !empty($record->master_admin_email) ? $record->master_admin_email : ''; ?></td>
                  <td><?php echo !empty($record->master_admin_role) ? $record->master_admin_role : ''; ?></td> 

                  
                  <td>
                    <a href="<?php echo !empty($record->$record_id) ? base_url('admin/' . $table_name . '/form/edit/') . $record->$record_id : ''; ?>" title="Edit" class="lead-edit">
                      <i class="nu-icons icon-pencil"></i>
                    </a>

                    <a href="<?php echo !empty($record->$record_id) ? base_url('admin/' . $table_name . '/view/') . $record->$record_id : ''; ?>" title="View" class="lead-view">
                      <i class="fas fa-eye"></i>
                    </a>

                    <a href="<?php echo !empty($record->$record_id) ? base_url('admin/' . $table_name . '/delete/') . $record->$record_id : ''; ?>" title="Delete" class="lead-delete">
                      <i class="nu-icons icon-trash-simple"></i>
                    </a>
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
