<?php
$info = $this->session->userdata('business_info');
if(!empty($info->currency))
{
    $currency = $info->currency ;
}else
{
    $currency = 'Rp';
}
?>
        <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo"><b></b>Inventory</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->


            <div class="navbar-custom-menu pull-right">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <?php
                    if(!empty($_SESSION["notify_product"]))
                    {
                        $notify_product = $_SESSION["notify_product"];
                        $notify_product_count = count($notify_product);
                    }
                    ?>



                    <!-- Notifications: style can be found in dropdown.less -->

                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger"><?php if(!empty($notify_product_count)){
                                    echo $notify_product_count;
                                }else{
                                    echo '0';
                                }
                                ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                <?php if(!empty($notify_product_count)){
                                    echo $notify_product_count;
                                }else{
                                    echo '0';
                                }
                                ?>
                                Bekal hampir habis</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">

                                    <?php
                                    if(!empty($notify_product)){
                                    foreach($notify_product as $v_notify_product){
                                        ?>

                                        <li><!-- start message -->
                                            <a href="<?php echo base_url()?>admin/product/add_product/<?php echo $v_notify_product->product_id ?>">
                                                <div class="pull-left">
                                                    <?php if(!empty($v_notify_product->filename)){?>
                                                        <img src="<?php echo base_url() . $v_notify_product->filename; ?>" class="img-circle" alt="Product Image"/>
                                                    <?php }else{?>
                                                        <img src="<?php echo base_url(); ?>img/product.png" class="img-circle" alt="Product Image"/>
                                                    <?php } ?>
                                                </div>
                                                <h4 style="padding-bottom:6px">
                                                    <?php echo 'Barcode:'.$v_notify_product->product_code  ?>
                                                    <span class="label label-danger"><?php echo $v_notify_product->product_quantity  ?></span>
                                                </h4>
                                                <p><?php echo $v_notify_product->product_name  ?></p>
                                            </a>
                                        </li><!-- end message -->

                                    <?php }; } ?>


                                </ul>
                            </li>
                            <li class="footer"><a href="<?php echo base_url() ?>admin/product/notification_product">Lihat semua notifikasi</a></li>
                        </ul>
                    </li>



                    <li>
                        <a href="<?php echo base_url()?>login/logout" >
                            <span class="glyphicon glyphicon-off"></span> Logout
                        </a>

                    </li>


                </ul>
            </div>


        </nav>
      </header>