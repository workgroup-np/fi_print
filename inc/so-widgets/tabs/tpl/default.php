
<div class="tabs">
    <ul class="nav nav-pills">
    <?php   foreach ( $instance['tabs_repeater'] as $key=>$tabs ){  
        $active=$tabs['active']?'active':'';?>
        <li class="nav-item">
          <a class="nav-link <?php echo $active;?>" data-toggle="pill" href="#<?php echo $key;?>"><?php echo esc_attr( $tabs['title'] );   ?></a>
        </li>
    <?php } ?>
    </ul>
</div>
<div class="tab-content">
    <?php   foreach ( $instance['tabs_repeater'] as $keys=>$tabs ){ 
         $active=$tabs['active']?'in active':'';?>
        <div class="tab-pane fade <?php echo $active;?>" id="<?php echo $keys;?>">
          <?php echo wp_kses_post($tabs['textarea']);?>
        </div>
    <?php }?>
</div>