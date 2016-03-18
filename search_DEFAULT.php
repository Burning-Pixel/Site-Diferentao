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

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<h2><?php the_time('F jS, Y') ?> | <?php the_category(', ') ?> | <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></h2>

				<div class="entry">
					<?php the_content('Read More'); ?>
					
					<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
				</div>

				<?php if (function_exists('the_tags')) { the_tags('<p class="postmetadata">Tags: ', ', ', '</p>'); } ?>
			</div>

		<?php endwhile; ?>

			<div class="navigation">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
		
		        <div class="alignleft"><?php next_posts_link('&larr; Previous Entries') ?></div>
		        <div class="alignright"><?php previous_posts_link('Next Entries &rarr;') ?></div>
		        <?php } ?>
			</div>

	<?php else : ?>

		<div class="post">
			<h2 class="center">Not Found</h2>
			<p class="center">Sorry, but you are looking for something that isn't here.</p>
		</div>

	<?php endif; ?>

	</div>

<?php include(TEMPLATEPATH."/primary-sidebar.php");?>

<?php get_footer(); ?>