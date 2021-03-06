<div class="wrap about-wrap vif_welcome vif_product_registration">
	<?php include 'header.php'; ?>
</div>
<div class="wrap about-wrap">
	<div class="vif-registration vif-content">
		<div class="postbox">
			<?php
				$key = Theme_Config::$vif_product_key;
				$expired = Theme_Config::$vif_product_key_expired;
				$vif_envato_hosted = Theme_Config::$vif_envato_hosted;
				
			if ($key != '' && $expired != 1 && !$vif_envato_hosted) {
			?>
			<div class="steps2">
				<div class="vif-box vif-left">
					<figure><img src="<?php echo Theme_Config::$vif_theme_directory_uri.'assets/img/admin/step3.png'; ?>" width="282" alt="Product Key Active" /></figure>
				</div>
				<div class="vif-box vif-right">
					<h2>Product Key Active!</h2>
					<strong><?php echo esc_attr($key); ?></strong>
					<div>
						<button class="button vif-delete-key button-update" type="submit">Remove Key</button>
						<a class="button vif-change-domain button-primary" href="<?php echo Theme_Config()->dashboardUrl(); ?>" target="_blank">Change Domain Name</a>
					</div>
				</div>
			</div>
			<?php } else if ( $vif_envato_hosted ) { ?>
			<div class="steps2">
				<div class="vif-box vif-left">
					<figure><img src="<?php echo Theme_Config::$vif_theme_directory_uri.'assets/img/admin/step3.png'; ?>" width="282" alt="Product Key Active" /></figure>
				</div>
				<div class="vif-box vif-right">
					<h2>Welcome to Envato Hosted!</h2> 
					<?php if ( defined('SUBSCRIPTION_CODE') ) { ?>
					<strong><?php echo esc_attr(SUBSCRIPTION_CODE); ?></strong>
					<?php } ?>
					<p>Your theme is automatically registered with the Envato Hosted system. You can update your theme &amp; plugins without manual registration.</p>
				</div>
			</div>
			<?php } else { ?>
			
			<p>Connect this domain name to your license to receive updates for both the theme and related plugins.</p>
			<ul class="steps">
				<li>
					<div class="step">
						<span class="count">Step 01</span>
						<figure><img src="<?php echo Theme_Config::$vif_theme_directory_uri.'assets/img/admin/step1.png'; ?>" width="189" alt="Generate a Product Key" /></figure>
						<a class="button vif-generate" href="<?php echo Theme_Config()->dashboardUrl(); ?>" target="_blank">Generate a Product Key</a>
					</div>
				</li>
				<li>
					<div class="step">
						<span class="count">Step 02</span>
						<figure><img src="<?php echo Theme_Config::$vif_theme_directory_uri.'assets/img/admin/step2.png'; ?>" width="185" alt="Paste your Product Key Here" /></figure>
						<div class="vif-form">
							<input type="text" id="vif_product_key" name="vif_product_key" value="<?php echo esc_attr($key); ?>" placeholder="Paste your Product Key Here" />
							<button class="button button-primary vif-register" type="submit" data-verify="<?php echo Theme_Config()->dashboardUrl('verify'); ?>" data-domain="<?php echo get_site_url(); ?>">Activate</button>
						</div>
						<div id="vif_error_messages"></div>
					</div>
				</li>
			</ul>
			<?php } ?>
		</div>
	</div>
</div>