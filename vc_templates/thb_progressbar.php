<?php function thb_progressbar( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_progressbar', $atts );
	extract( $atts );
	$element_id = 'vif-progressbar-' . mt_rand(10, 999);
	$out ='';
	ob_start();

	?>
	<div class="vif-progressbar" id="<?php echo esc_attr($element_id); ?>">
		<div class="vif-progress-title">
			<span><?php echo esc_html($title); ?></span>
			<span><?php echo esc_html($progress); ?>%</span>
		</div>
    <span class="vif-progress" data-progress="<?php echo esc_attr($progress); ?>"><span></span></span>
    <?php if($thb_bar_color) { ?>
    <style>
    	#<?php echo esc_attr($element_id); ?> .vif-progress span {
    		background: <?php echo esc_attr($thb_bar_color); ?>;
    	}
    </style>
    <?php } ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_progressbar', 'thb_progressbar');