<ul class="faq">
    <?php   foreach ( $instance['accordion_repeater'] as $key=>$accordion ){  
        $active=$accordion['active']?'open':'';?>
        <li class="<?php echo $active;?>">
	        <h6><?php echo esc_attr( $accordion['title'] );   ?></h6>
			<p class="faq-body"><?php echo wp_kses_post($accordion['textarea']);?></p>
		</li>
    <?php }?>
</ul>