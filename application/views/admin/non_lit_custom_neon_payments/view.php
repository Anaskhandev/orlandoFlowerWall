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

                <small class="text-success"><i class="fa fa-calendar"></i> Order Time: <?php  
                $db = $record->non_lit_custom_neon_payments_created_at;
                $timestamp = strtotime($db);
                echo date("F j, Y, g:i a",$timestamp);?></small> <br><br>

                <?php if(!empty($record->payment_id)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Payment ID</span>
                      <span class="col-md-10 view_details"><?php echo $record->payment_id;?></span>
                  </div>  
                <?php endif;?>


                <?php if(!empty($record->totalPrice)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Total Price</span>
                      <span class="col-md-10 view_details"><?php echo $record->totalPrice;?></span>
                  </div>  
                <?php endif;?>
                
                <?php if(!empty($record->commissionStatus)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Commission Paid?</span>
                      <span class="col-md-10 view_details"><?php echo $record->commissionStatus;?></span>
                  </div>  
                <?php endif;?>


                <?php if(!empty($record->fullName)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Full Name</span>
                      <span class="col-md-10 view_details"><?php echo $record->fullName;?></span>
                  </div>  
                <?php endif;?>


                <?php if(!empty($record->email)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Email</span>
                      <span class="col-md-10 view_details"><?php echo $record->email;?></span>
                  </div>  
                <?php endif;?>


                <?php if(!empty($record->address)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Address</span>
                      <span class="col-md-10 view_details"><?php echo $record->address;?></span>
                  </div>  
                <?php endif;?>


                <?php if(!empty($record->textTitle)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Text Title</span>
                      <span class="col-md-10 view_details"><?php echo $record->textTitle;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->textLength)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Text Length</span>
                      <span class="col-md-10 view_details"><?php echo $record->textLength;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->textHeight)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Text Height</span>
                      <span class="col-md-10 view_details"><?php echo $record->textHeight;?></span>
                  </div>  
                <?php endif;?>



                <?php if(!empty($record->textFontSize)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Text Font Size</span>
                      <span class="col-md-10 view_details"><?php echo $record->textFontSize;?></span>
                  </div>  
                <?php endif;?>


                <?php if(!empty($record->textColor)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Text Color</span>
                      <span class="col-md-10 view_details"><?php echo $record->textColor;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->customNeon)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Custom Neon</span>
                      <span class="col-md-10 view_details"><?php echo $record->customNeon;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->powerAdopter)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Power Adopter</span>
                      <span class="col-md-10 view_details"><?php echo $record->powerAdopter;?></span>
                  </div>  
                <?php endif;?>


                <?php if(!empty($record->backBoard)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Back Board</span>
                      <span class="col-md-10 view_details"><?php echo $record->backBoard;?></span>
                  </div>  
                <?php endif;?>
              </div>      
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>