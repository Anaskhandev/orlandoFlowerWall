 <aside class="main-sidebar">
   <section class="sidebar">
     <div class="user-panel">
       <div class="pull-left image">
         <img src="<?php echo !empty($this->session->userdata('master_admin_image')) ? base_url('uploads/admin/') . $this->session->userdata('master_admin_image') : base_url('admin/assets/admin/img/placeholder.png'); ?>" class="img-circle" alt="User Image">
       </div>
       <div class="pull-left info">
         <p><?php echo !empty($this->session->userdata('master_admin_name')) ? $this->session->userdata('master_admin_name') : 'Name'; ?></p>
       </div>
     </div>
     <ul class="sidebar-menu" data-widget="tree">
       <li class="header">MAIN NAVIGATION</li>
       <li>
         <a href="<?php echo base_url('admin'); ?>">
           <i class="fa fa-dashboard"></i> <span>Dashboard</span>
         </a>
       </li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-gear"></i>
           <span>Settings</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url('admin/settings/general'); ?>"><i class="fa fa-circle-o"></i>General</a></li>
         </ul>
       </li>


       <li class="treeview">
         <a href="#">
           <i class="fa fa-envelope"></i>
           <span>Orders/Payments</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <!-- <li><a href="<?php echo base_url('admin/custom_neon_payments'); ?>"><i class="fa fa-circle-o"></i>Neon Details</a></li>
           <li><a href="<?php echo base_url('admin/non_lit_custom_neon_payments'); ?>"><i class="fa fa-circle-o"></i>Non Lit Details</a></li> -->
           <li><a href="<?php echo base_url('admin/owf_flowers'); ?>"><i class="fa fa-circle-o"></i>OFW Order Details</a></li>

         </ul>
       </li>

       <li class="treeview">
         <a href="#">
           <i class="fa fa-database"></i>
           <span>Content</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url('admin/carousel'); ?>"><i class="fa fa-circle-o"></i>Hero Creation</a></li>
           <!-- <li><a href="<?php echo base_url('admin/category_list'); ?>"><i class="fa fa-circle-o"></i>Category List</a></li> -->
           <!-- <li><a href="<?php echo base_url('admin/gift_products'); ?>"><i class="fa fa-circle-o"></i>OFW Items</a></li> -->
           <!-- <li><a href="<?php echo base_url('admin/content'); ?>"><i class="fa fa-circle-o"></i>Section Creation</a></li> -->
           <li><a href="<?php echo base_url('admin/timings'); ?>"><i class="fa fa-circle-o"></i>Timings</a></li>
           <li><a href="<?php echo base_url('admin/light_up_first_section'); ?>"><i class="fa fa-circle-o"></i>Neon Business Signs Section</a></li>
           <li><a href="<?php echo base_url('admin/light_up_content'); ?>"><i class="fa fa-circle-o"></i>light up page content</a></li>
           <li><a href="<?php echo base_url('admin/light_up_card'); ?>"><i class="fa fa-circle-o"></i>light up page cards</a></li>
           <li><a href="<?php echo base_url('admin/privacy'); ?>"><i class="fa fa-circle-o"></i>Privacy Policy Page</a></li>
         </ul>
       </li>

       <li class="treeview">
         <a href="#">
           <i class="fa fa-camera"></i>
           <span>Gallery</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url('admin/gallery'); ?>"><i class="fa fa-circle-o"></i>Neon sign Gallery</a></li>
           <li><a href="<?php echo base_url('admin/laser_gallery'); ?>"><i class="fa fa-circle-o"></i>Laser made Gallery</a></li>
           <li><a href="<?php echo base_url('admin/light_up_gallery'); ?>"><i class="fa fa-circle-o"></i>Light up logos Gallery</a></li>
         </ul>
       </li>


       <li class="treeview">
         <a href="#">
           <i class="fa fa-usd"></i>
           <span>Commission Records</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url('admin/commission_list'); ?>"><i class="fa fa-circle-o"></i>Custom Neon Commission</a></li>
           <li><a href="<?php echo base_url('admin/commission_list_non_lit'); ?>"><i class="fa fa-circle-o"></i>Non Lit Commission</a></li>
         </ul>
       </li>

       <li class="treeview">
         <a href="#">
           <i class="fa fa-usd"></i>
           <span>Manage Prices</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url('admin/manage_prices'); ?>"><i class="fa fa-circle-o"></i>Manage Prices</a></li>
           <li><a href="<?php echo base_url('admin/manage_delivery_prices'); ?>"><i class="fa fa-circle-o"></i>Manage Delivery Price</a></li>
           <li><a href="<?php echo base_url('admin/shipping_cost'); ?>"><i class="fa fa-circle-o"></i>Shipping Cost</a></li>
         </ul>
       </li>

       <li class="treeview">
         <a href="#">
           <i class="fa fa-usd"></i>
           <span>Manage Payments</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url('admin/my_card_details'); ?>"><i class="fa fa-circle-o"></i>My Card Detail</a></li>
           <li><a href="<?php echo base_url('admin/send_payment'); ?>"><i class="fa fa-circle-o"></i>Send Payment</a></li>
         </ul>
       </li>

       <li class="treeview">
         <a href="#">
           <i class="fa fa-comment"></i>
           <span>Responses</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url('admin/newsletter'); ?>"><i class="fa fa-circle-o"></i>Newsletter</a></li>
           <!-- <li><a href="<?php echo base_url('admin/send_payment'); ?>"><i class="fa fa-circle-o"></i>Send Payment</a></li> -->
         </ul>
       </li>



       <li class="treeview">
         <a href="#">
           <i class="fa fa-envelope"></i>
           <span>Sign Logos Queries</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?php echo base_url('admin/sign_logos'); ?>"><i class="fa fa-circle-o"></i>See Queries</a></li>
         </ul>
       </li>


       <!--  <li class="treeview">
        <a href="#">
          <i class="fa fa-envelope"></i>
          <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
         <li><a href="<?php echo base_url('admin/user'); ?>"><i class="fa fa-circle-o"></i>Add Users</a></li> 
       </ul>
     </li> -->
     </ul>

   </section>
 </aside>
 <?php if (isset($output)) : ?>
   <div class="content-wrapper">
     <?php echo $output; ?>
   </div>
 <?php endif; ?>