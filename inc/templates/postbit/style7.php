<?php 
	add_filter( 'excerpt_length', 'vif_short_excerpt_length' );
	
	$vars = $wp_query->query_vars;
	$vif_date = array_key_exists('vif_date', $vars) ? $vars['vif_date'] : true;
	$vif_animation = array_key_exists('vif_animation', $vars) ? $vars['vif_animation'] : false;
	$vif_excerpt = array_key_exists('vif_excerpt', $vars) ? $vars['vif_excerpt'] : false;
	$vif_cat = array_key_exists('vif_cat', $vars) ? $vars['vif_cat'] : true;
	
	$format = get_post_format();
	$permalink = get_the_permalink();
	if ($format === 'link') {
		$permalink = get_post_meta(get_the_ID(), 'post_link', true);	
	}
?>
<div class="small-12 columns">
<article itemscope itemtype="http://schema.org/Article" <?php post_class('post style7 ' . $vif_animation); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-gallery">
			<a href="<?php echo esc_url($permalink); ?>" rel="bookmark" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure>
	<?php } ?>
	<div class="style7-content">
		<?php if ($vif_cat) { ?>
		<aside class="post-category">
			<?php the_category(', '); ?>
		</aside>
		<?php } ?>
		<header class="post-title entry-header">
			<?php the_title('<h5 class="entry-title" itemprop="name headline"><a href="'.esc_url($permalink).'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
		</header>
		<?php if ($vif_date) { ?>
		<aside class="post-meta">
			<?php echo get_the_date(); ?>
		</aside>
		<?php } ?>
		<div class="vif-post-arrow"><?php get_template_part('assets/img/svg/next_arrow.svg'); ?></div>
	</div>
	<?php do_action( 'vif_PostMeta' ); ?>
</article>
</div>