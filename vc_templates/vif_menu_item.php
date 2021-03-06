<?php function vif_menu_item( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'vif_menu_item', $atts );
	extract( $atts );
	
	$element_id = 'vif-menu-item-' . mt_rand(10, 999);
	
	$el_class[] = 'vif-menu-item';
	
	$out ='';
	ob_start();
	
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
		<div class="vif-menu-item-parent">
			<div class="vif-menu-title"><h6><?php echo esc_html($title); ?></h6></div>
			<div class="vif-menu-line"></div>
			<div class="vif-menu-price"><?php echo esc_html($price); ?></div>
		</div>
		<?php if ($description) { ?>
			<div class="vif-menu-description">
				<?php echo wp_kses_post($description); ?>
			</div>
		<?php } ?>
	</div>
	<?php
	
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_menu_item', 'vif_menu_item');