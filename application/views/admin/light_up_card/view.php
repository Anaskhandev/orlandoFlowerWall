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


                <small class="text-success"><i class="fa fa-calendar"></i> Created on: <?php  
                $db = $record->manage_prices_created_at;
                $timestamp = strtotime($db);
                echo date("F j, Y, g:i a",$timestamp);?></small> <br>

                <small class="text-info"><i class="fa fa-calendar"></i> Updated on: <?php  
                $db2 = $record->manage_prices_updated_at;
                $timestamp2 = strtotime($db2);
                echo date("F j, Y, g:i a",$timestamp2);?></small> 


                <?php if(!empty($record->size)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Size</span>
                      <span class="col-md-10 view_details"><?php echo $record->size;?></span>
                  </div>  
                <?php endif;?>


                <?php if(!empty($record->length)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Length</span>
                      <span class="col-md-10 view_details"><?php echo $record->length;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->height)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Height</span>
                      <span class="col-md-10 view_details"><?php echo $record->height;?></span>
                  </div>  
                <?php endif;?>

          
                <?php if(!empty($record->total_price)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Total Price</span>
                      <span class="col-md-10 view_details"><?php echo $record->total_price;?></span>
                  </div>  
                <?php endif;?>        

                <?php if(!empty($record->my_commission)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">My Commission</span>
                      <span class="col-md-10 view_details"><?php echo $record->my_commission;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->second_commission)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Rebow Commission</span>
                      <span class="col-md-10 view_details"><?php echo $record->second_commission;?></span>
                  </div>  
                <?php endif;?>
                
                <?php if(!empty($record->type)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Type</span>
                      <span class="col-md-10 view_details"><?php echo $record->type;?></span>
                  </div>  
                <?php endif;?>

              </div>      
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>