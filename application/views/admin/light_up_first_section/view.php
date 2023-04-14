<div class="content-wrapper">
  <section class="content-header">
    <h1>
        <?php echo !empty($title)?$title:'Title';?>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">s
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">View Data</h3>
          </div>     
          <div class="col-md-12">
              <div class="box-body box-body-view">


             <?php foreach($record as $record) ?>

                <?php if(!empty($record->heading)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Heading</span>
                      <span class="col-md-10 view_details"><?php echo $record->heading;?></span>
                  </div>  
                <?php endif;?>


                <?php
                 if(!empty($record->content)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Content</span>
                      <span class="col-md-10 view_details"><?php echo $record->content;?></span>
                  </div>  
                <?php
               endif;?>

              </div>      
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>