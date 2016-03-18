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
<div class="primary-sidebar <?php if ($et_threecolumn_disable == "false") { ?> <?php echo $et_columnorder; ?> <?php } else { ?> content-two-column<?php echo $et_columnorder; ?> <?php } ?>">

<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar('Primary Sidebar') ) : ?>
    
    <div>
        
        <div id="breadcrumb">Postado por</div>
        
        <p><a href="<?php bloginfo ( 'url');?>/?author=<?php the_author_ID ();?>"> <?php echo get_avatar (get_the_author_id() , 80 ); ?></a>

        <h1 class="autor">
            <a class="autor" style="color: #f26234;" href = "<?php the_author_url ();?>">
            <?php the_author_firstname(); ?></a>
        </h1>

        <h4><?php the_author_description ();?></h4>
        
        <div style="width: 230px; height: 600px; float: left; overflow: hidden; margin: 30px 0 0 0;"> 
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                 <!--Sidebar_single--> 
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-1746143701175258"
                     data-ad-slot="8325599324"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
        </div>

    </div>

<?php endif; ?>

</ul>

</div>

