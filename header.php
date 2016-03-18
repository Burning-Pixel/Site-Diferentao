<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon_diferentao.png" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/mosaico/css/mosaic.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.2.3.min.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/script.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/menu.js"></script> 

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/mosaico/js/mosaic.1.0.1.js"></script>


<!--CODIGO JS DO FACEBOOK -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=546699588753493";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- codigo do TWITTER -->
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>


<!--CODIGO DO 1+ GOOGLE-->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  


<script type="text/javascript">  
			
			jQuery(function($){
				
				$('.circle').mosaic({
					opacity		:	0.8			//Opacity for overlay (0-1)
				});
				
				$('.fade').mosaic();
				
				$('.bar').mosaic({
					animation	:	'slide'		//fade or slide
				});
				
				$('.bar2').mosaic({
					animation	:	'slide'		//fade or slide
				});
				
				$('.bar3').mosaic({
					animation	:	'slide',	//fade or slide
					anchor_y	:	'top'		//Vertical anchor position
				});
				
				$('.cover').mosaic({
					animation	:	'slide',	//fade or slide
					hover_x		:	'400px'		//Horizontal position on hover
				});
				
				$('.cover2').mosaic({
					animation	:	'slide',	//fade or slide
					anchor_y	:	'top',		//Vertical anchor position
					hover_y		:	'80px'		//Vertical position on hover
				});
				
				$('.cover3').mosaic({
					animation	:	'slide',	//fade or slide
					hover_x		:	'400px',	//Horizontal position on hover
					hover_y		:	'300px'		//Vertical position on hover
				});
		    
		    });
		    
		</script>

  <!--Meta description-->
  
  <?php
function get_page_meta_description(){
    $custom_field_meta_description = get_post_meta(get_the_ID(), 'meta_description_field', true);
    if($custom_field_meta_description != ''){
        return $custom_field_meta_description;
    } elseif ( is_single() ) {
        return get_the_title();
    } elseif ( is_category() ) {
        return get_single_cat_title();
    /*
    } elseif ( is_tag() ) {
        return get_single_tag_title(); get single tag não está funcionando
    */
    } elseif ( is_page() ){
        return get_the_title();
    } else {
        return get_bloginfo('description');
    }
}
?>
<meta name="description" content="<?php echo get_page_meta_description(); ?>" />
  
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

<?php wp_head(); ?>
</head>
    
<body>
