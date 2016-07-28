<div class="card card-block card-border">
	<p><?php echo wp_kses_post($instance['Description']);?></p>
	<?php   foreach ( $instance['button_repeater'] as $key=>$button ){  
		$url=$button['btnurl'];
		$target=$button['target'];?>
		<a class="btn btn-lg btn-block btn-<?php echo esc_attr($button['buttontype']);?>" href="<?php echo ($url)? esc_url($url):'#';?>" <?php echo ($target)?'target="_blank"':'';?>><i class="fa fa-file-pdf-o"></i> <?php echo esc_attr($button['btntext']);?></a>
	<?php }?>
</div>