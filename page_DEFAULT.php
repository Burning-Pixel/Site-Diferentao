<?php
	global $options;
		foreach ($options as $value) {
			if (get_settings( $value['id'] ) === FALSE) { 
				$$value['id'] = stripslashes( $value['std'] ); 
			} else { 
				$$value['id'] = stripslashes( get_settings( $value['id'] ) ); 
			} 
		}
?>
<?php get_header(); ?>

<?php /* Enables two or three columns */
if ($et_threecolumn_disable == "false") { ?> <?php include(TEMPLATEPATH."/sidebar.php");?><?php } ?>

   <div class="content <?php if ($et_threecolumn_disable == "false") { ?> <?php echo $et_columnorder; ?> <?php } else { ?> content-two-column<?php echo $et_columnorder; ?> <?php } ?>">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>
			<div class="entry">
				<?php the_content('Read More'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				<?php edit_post_link('Edit', '<p>', '.</p>'); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
	</div>

<?php include(TEMPLATEPATH."/primary-sidebar.php");?>

<?php get_footer(); ?>