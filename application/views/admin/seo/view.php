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
            <h3 class="box-title">View Data</h3>
          </div>     
          <div class="col-md-12">
              <div class="box-body box-body-view">

                <small class="text-success"><i class="fa fa-calendar"></i>User Created on: <?php  
                $db = $record->seo_created_at;
                $timestamp = strtotime($db);
                echo date("F j, Y, g:i a",$timestamp);?></small> <br>

                <small class="text-info"><i class="fa fa-calendar"></i> Updated on: <?php  
                $db2 = $record->seo_updated_at;
                $timestamp2 = strtotime($db2);
                echo date("F j, Y, g:i a",$timestamp2);?></small> 
                <?php if(!empty($record->seo_page_name)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Page Name</span>
                      <span class="col-md-10 view_details"><?php echo $record->seo_page_name;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->seo_page_link)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Page Link</span>
                      <span class="col-md-10 view_details"><?php echo $record->seo_page_link;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->seo_page_title)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Page Title</span>
                      <span class="col-md-10 view_details"><?php echo $record->seo_page_title;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->seo_meta_title)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Meta Title</span>
                      <span class="col-md-10 view_details"><?php echo $record->seo_meta_title;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->seo_meta_description)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Meta Description</span>
                      <span class="col-md-10 view_details"><?php echo $record->seo_meta_description;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->seo_meta_keyword)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Meta Keyword</span>
                      <span class="col-md-10 view_details"><?php echo $record->seo_meta_keyword;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->seo_meta_canonical)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Meta Canonical</span>
                      <span class="col-md-10 view_details"><?php echo $record->seo_meta_canonical;?></span>
                  </div>  
                <?php endif;?>

                <?php if(!empty($record->seo_meta_index)):?>
                  <div class="form-group clearfix">
                      <span class="col-md-2 view_label">Meta Index</span>
                      <span class="col-md-10 view_details"><?php echo $record->seo_meta_index;?></span>
                  </div>  
                <?php endif;?>
                
              </div>      
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>